<?php

namespace App\Http\Controllers;

use App\Exports\AccelerometerExport;
use App\Models\Accelerometer;
use App\Models\Area;
use App\Models\JadwalAccelerometer;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Excel;

class AccelerometerController extends Controller
{
    public function index()
    {
        $waktu = Carbon::now();
        $tahun = $waktu->format('Y');
        $bulan = $waktu->format('m');
        $jadwal_accelerometer = JadwalAccelerometer::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->orderBy('tanggal', 'ASC')
            ->get();

        return view('mainline.mainline_accelerometer_examination.index', compact(['jadwal_accelerometer', 'tahun', 'bulan']));
    }

    public function index_summary($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $jadwal = JadwalAccelerometer::findOrFail($secret);
            if ($jadwal) {
                $accelerometer = Accelerometer::where('jadwal_id', $secret)->get();

                return view('mainline.mainline_accelerometer_examination.accelerometer', compact(['jadwal', 'accelerometer']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function filter(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $jadwal_accelerometer = JadwalAccelerometer::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->orderBy('tanggal', 'ASC')
            ->get();


        return view('mainline.mainline_accelerometer_examination.index', compact(['jadwal_accelerometer', 'tahun', 'bulan']));
    }

    public function create()
    {
        $tahun_ini = Carbon::now()->format('Y');
        $bulan_ini = Carbon::now()->format('m');
        $bulan_kemarin = $bulan_ini - 1;
        $bulan_besok = $bulan_ini + 1;
        $jadwal = JadwalAccelerometer::whereYear('tanggal', $tahun_ini)
            ->whereMonth('tanggal', $bulan_ini)
            ->orWhereMonth('tanggal', $bulan_kemarin)
            ->orWhereMonth('tanggal', $bulan_besok)
            ->orderBy('tanggal', 'ASC')
            ->get();
        $area = Area::where('area', 'Mainline')->where('stasiun', 'false')->get();

        return view('mainline.mainline_accelerometer_examination.create', compact(['jadwal', 'area']));
    }

    public function store(Request $request)
    {
        $jadwal_id = $request->jadwal_id;

        $jadwal = Accelerometer::where('jadwal_id', $jadwal_id)->get();
        if ($jadwal->count() > 0)
        {
            return back()->withNotifyerror('Data Accelerometer pada tanggal yang dipilih sudah diisi, silahkan pilih tanggal yang sesuai!');
        }

        for ($i = 0; $i < count($request->area_id); $i++) {
            Accelerometer::create([
                'jadwal_id' => $jadwal_id,
                'line_id' => $request->line_id[$i],
                'area_id' => $request->area_id[$i],
                'sumbu_x' => $request->sumbu_x[$i],
                'sumbu_y' => $request->sumbu_y[$i],
                'sumbu_z' => $request->sumbu_z[$i],
            ]);
        }

        return back()->withNotify('Data accelerometer berhasil disimpan');
    }

    public function edit($id)
    {
        //
    }

    public function report(Request $request)
    {
        $secret = $request->jadwal_id;
        try {
            $jadwal_id = Crypt::decryptString($secret);
            $jadwal = JadwalAccelerometer::findOrFail($jadwal_id);

            if (!$jadwal) {
                return redirect()->back();
            }

            $area = Area::where('area', 'Mainline')->where('stasiun', 'false')->pluck('code')->toArray();
            $area_id = Area::where('area', 'Mainline')->where('stasiun', 'false')->pluck('id')->toArray();
            $acc_ut_x = [];
            $acc_ut_y = [];
            $acc_ut_z = [];

            $acc_dt_x = [];
            $acc_dt_y = [];
            $acc_dt_z = [];

            foreach ($area_id as $id) {
                $ut_x = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 1)->value('sumbu_x');
                $ut_y = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 1)->value('sumbu_y');
                $ut_z = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 1)->value('sumbu_z');

                $dt_x = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 2)->value('sumbu_x');
                $dt_y = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 2)->value('sumbu_y');
                $dt_z = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', $id)->where('line_id', 2)->value('sumbu_z');

                $acc_ut_x[] = (float)$ut_x;
                $acc_ut_y[] = (float)$ut_y;
                $acc_ut_z[] = (float)$ut_z;

                $acc_dt_x[] = (float)$dt_x;
                $acc_dt_y[] = (float)$dt_y;
                $acc_dt_z[] = (float)$dt_z;
            }

            $area_LBB_FTM_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '4')->where('line_id', '1')->get();
            $LBB_FTM_UT_X = $area_LBB_FTM_UT->value('sumbu_x');
            $LBB_FTM_UT_Y = $area_LBB_FTM_UT->value('sumbu_y');
            $LBB_FTM_UT_Z = $area_LBB_FTM_UT->value('sumbu_z');

            $area_LBB_FTM_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '4')->where('line_id', '2')->get();
            $LBB_FTM_DT_X = $area_LBB_FTM_DT->value('sumbu_x');
            $LBB_FTM_DT_Y = $area_LBB_FTM_DT->value('sumbu_y');
            $LBB_FTM_DT_Z = $area_LBB_FTM_DT->value('sumbu_z');

            // BATAS PETAK

            $area_FTM_CPR_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '6')->where('line_id', '1')->get();
            $FTM_CPR_UT_X = $area_FTM_CPR_UT->value('sumbu_x');
            $FTM_CPR_UT_Y = $area_FTM_CPR_UT->value('sumbu_y');
            $FTM_CPR_UT_Z = $area_FTM_CPR_UT->value('sumbu_z');

            $area_FTM_CPR_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '6')->where('line_id', '2')->get();
            $FTM_CPR_DT_X = $area_FTM_CPR_DT->value('sumbu_x');
            $FTM_CPR_DT_Y = $area_FTM_CPR_DT->value('sumbu_y');
            $FTM_CPR_DT_Z = $area_FTM_CPR_DT->value('sumbu_z');

            // BATAS PETAK

            $area_CPR_HJN_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '8')->where('line_id', '1')->get();
            $CPR_HJN_UT_X = $area_CPR_HJN_UT->value('sumbu_x');
            $CPR_HJN_UT_Y = $area_CPR_HJN_UT->value('sumbu_y');
            $CPR_HJN_UT_Z = $area_CPR_HJN_UT->value('sumbu_z');

            $area_CPR_HJN_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '8')->where('line_id', '2')->get();
            $CPR_HJN_DT_X = $area_CPR_HJN_DT->value('sumbu_x');
            $CPR_HJN_DT_Y = $area_CPR_HJN_DT->value('sumbu_y');
            $CPR_HJN_DT_Z = $area_CPR_HJN_DT->value('sumbu_z');

            // BATAS PETAK

            $area_HJN_BLA_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '10')->where('line_id', '1')->get();
            $HJN_BLA_UT_X = $area_HJN_BLA_UT->value('sumbu_x');
            $HJN_BLA_UT_Y = $area_HJN_BLA_UT->value('sumbu_y');
            $HJN_BLA_UT_Z = $area_HJN_BLA_UT->value('sumbu_z');

            $area_HJN_BLA_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '10')->where('line_id', '2')->get();
            $HJN_BLA_DT_X = $area_HJN_BLA_DT->value('sumbu_x');
            $HJN_BLA_DT_Y = $area_HJN_BLA_DT->value('sumbu_y');
            $HJN_BLA_DT_Z = $area_HJN_BLA_DT->value('sumbu_z');

            // BATAS PETAK

            $area_BLA_BLM_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '12')->where('line_id', '1')->get();
            $BLA_BLM_UT_X = $area_BLA_BLM_UT->value('sumbu_x');
            $BLA_BLM_UT_Y = $area_BLA_BLM_UT->value('sumbu_y');
            $BLA_BLM_UT_Z = $area_BLA_BLM_UT->value('sumbu_z');

            $area_BLA_BLM_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '12')->where('line_id', '2')->get();
            $BLA_BLM_DT_X = $area_BLA_BLM_DT->value('sumbu_x');
            $BLA_BLM_DT_Y = $area_BLA_BLM_DT->value('sumbu_y');
            $BLA_BLM_DT_Z = $area_BLA_BLM_DT->value('sumbu_z');

            // BATAS PETAK

            $area_BLM_ASN_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '14')->where('line_id', '1')->get();
            $BLM_ASN_UT_X = $area_BLM_ASN_UT->value('sumbu_x');
            $BLM_ASN_UT_Y = $area_BLM_ASN_UT->value('sumbu_y');
            $BLM_ASN_UT_Z = $area_BLM_ASN_UT->value('sumbu_z');

            $area_BLM_ASN_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '14')->where('line_id', '2')->get();
            $BLM_ASN_DT_X = $area_BLM_ASN_DT->value('sumbu_x');
            $BLM_ASN_DT_Y = $area_BLA_BLM_DT->value('sumbu_y');
            $BLM_ASN_DT_Z = $area_BLM_ASN_DT->value('sumbu_z');

            // BATAS PETAK

            $area_ASN_SNY_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '16')->where('line_id', '1')->get();
            $ASN_SNY_UT_X = $area_ASN_SNY_UT->value('sumbu_x');
            $ASN_SNY_UT_Y = $area_ASN_SNY_UT->value('sumbu_y');
            $ASN_SNY_UT_Z = $area_ASN_SNY_UT->value('sumbu_z');

            $area_ASN_SNY_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '16')->where('line_id', '2')->get();
            $ASN_SNY_DT_X = $area_ASN_SNY_DT->value('sumbu_x');
            $ASN_SNY_DT_Y = $area_ASN_SNY_DT->value('sumbu_y');
            $ASN_SNY_DT_Z = $area_ASN_SNY_DT->value('sumbu_z');

            // BATAS PETAK

            $area_SNY_IST_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '18')->where('line_id', '1')->get();
            $SNY_IST_UT_X = $area_SNY_IST_UT->value('sumbu_x');
            $SNY_IST_UT_Y = $area_SNY_IST_UT->value('sumbu_y');
            $SNY_IST_UT_Z = $area_SNY_IST_UT->value('sumbu_z');

            $area_SNY_IST_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '18')->where('line_id', '2')->get();
            $SNY_IST_DT_X = $area_SNY_IST_DT->value('sumbu_x');
            $SNY_IST_DT_Y = $area_SNY_IST_DT->value('sumbu_y');
            $SNY_IST_DT_Z = $area_SNY_IST_DT->value('sumbu_z');

            // BATAS PETAK

            $area_IST_BNH_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '20')->where('line_id', '1')->get();
            $IST_BNH_UT_X = $area_IST_BNH_UT->value('sumbu_x');
            $IST_BNH_UT_Y = $area_IST_BNH_UT->value('sumbu_y');
            $IST_BNH_UT_Z = $area_IST_BNH_UT->value('sumbu_z');

            $area_IST_BNH_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '20')->where('line_id', '2')->get();
            $IST_BNH_DT_X = $area_IST_BNH_DT->value('sumbu_x');
            $IST_BNH_DT_Y = $area_IST_BNH_DT->value('sumbu_y');
            $IST_BNH_DT_Z = $area_IST_BNH_DT->value('sumbu_z');

            // BATAS PETAK

            $area_BNH_STB_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '22')->where('line_id', '1')->get();
            $BNH_STB_UT_X = $area_BNH_STB_UT->value('sumbu_x');
            $BNH_STB_UT_Y = $area_BNH_STB_UT->value('sumbu_y');
            $BNH_STB_UT_Z = $area_BNH_STB_UT->value('sumbu_z');

            $area_BNH_STB_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '22')->where('line_id', '2')->get();
            $BNH_STB_DT_X = $area_BNH_STB_DT->value('sumbu_x');
            $BNH_STB_DT_Y = $area_BNH_STB_DT->value('sumbu_y');
            $BNH_STB_DT_Z = $area_BNH_STB_DT->value('sumbu_z');

            // BATAS PETAK

            $area_STB_DKA_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '24')->where('line_id', '1')->get();
            $STB_DKA_UT_X = $area_STB_DKA_UT->value('sumbu_x');
            $STB_DKA_UT_Y = $area_STB_DKA_UT->value('sumbu_y');
            $STB_DKA_UT_Z = $area_STB_DKA_UT->value('sumbu_z');

            $area_STB_DKA_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '24')->where('line_id', '2')->get();
            $STB_DKA_DT_X = $area_STB_DKA_DT->value('sumbu_x');
            $STB_DKA_DT_Y = $area_STB_DKA_DT->value('sumbu_y');
            $STB_DKA_DT_Z = $area_STB_DKA_DT->value('sumbu_z');

            // BATAS PETAK

            $area_DKA_BHI_UT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '26')->where('line_id', '1')->get();
            $DKA_BHI_UT_X = $area_DKA_BHI_UT->value('sumbu_x');
            $DKA_BHI_UT_Y = $area_DKA_BHI_UT->value('sumbu_y');
            $DKA_BHI_UT_Z = $area_DKA_BHI_UT->value('sumbu_z');

            $area_DKA_BHI_DT = Accelerometer::where('jadwal_id', $jadwal_id)->where('area_id', '26')->where('line_id', '2')->get();
            $DKA_BHI_DT_X = $area_DKA_BHI_DT->value('sumbu_x');
            $DKA_BHI_DT_Y = $area_DKA_BHI_DT->value('sumbu_y');
            $DKA_BHI_DT_Z = $area_DKA_BHI_DT->value('sumbu_z');

            return view('mainline.mainline_accelerometer_examination.report.summary', compact([
                'jadwal',
                'area',
                'acc_ut_x',
                'acc_ut_y',
                'acc_ut_z',

                'acc_dt_x',
                'acc_dt_y',
                'acc_dt_z',

                'LBB_FTM_UT_X',
                'LBB_FTM_UT_Y',
                'LBB_FTM_UT_Z',
                'LBB_FTM_DT_X',
                'LBB_FTM_DT_Y',
                'LBB_FTM_DT_Z',

                'FTM_CPR_UT_X',
                'FTM_CPR_UT_Y',
                'FTM_CPR_UT_Z',
                'FTM_CPR_DT_X',
                'FTM_CPR_DT_Y',
                'FTM_CPR_DT_Z',

                'CPR_HJN_UT_X',
                'CPR_HJN_UT_Y',
                'CPR_HJN_UT_Z',
                'CPR_HJN_DT_X',
                'CPR_HJN_DT_Y',
                'CPR_HJN_DT_Z',

                'HJN_BLA_UT_X',
                'HJN_BLA_UT_Y',
                'HJN_BLA_UT_Z',
                'HJN_BLA_DT_X',
                'HJN_BLA_DT_Y',
                'HJN_BLA_DT_Z',

                'BLA_BLM_UT_X',
                'BLA_BLM_UT_Y',
                'BLA_BLM_UT_Z',
                'BLA_BLM_DT_X',
                'BLA_BLM_DT_Y',
                'BLA_BLM_DT_Z',

                'BLM_ASN_UT_X',
                'BLM_ASN_UT_Y',
                'BLM_ASN_UT_Z',
                'BLM_ASN_DT_X',
                'BLM_ASN_DT_Y',
                'BLM_ASN_DT_Z',

                'ASN_SNY_UT_X',
                'ASN_SNY_UT_Y',
                'ASN_SNY_UT_Z',
                'ASN_SNY_DT_X',
                'ASN_SNY_DT_Y',
                'ASN_SNY_DT_Z',

                'SNY_IST_UT_X',
                'SNY_IST_UT_Y',
                'SNY_IST_UT_Z',
                'SNY_IST_DT_X',
                'SNY_IST_DT_Y',
                'SNY_IST_DT_Z',

                'IST_BNH_UT_X',
                'IST_BNH_UT_Y',
                'IST_BNH_UT_Z',
                'IST_BNH_DT_X',
                'IST_BNH_DT_Y',
                'IST_BNH_DT_Z',

                'BNH_STB_UT_X',
                'BNH_STB_UT_Y',
                'BNH_STB_UT_Z',
                'BNH_STB_DT_X',
                'BNH_STB_DT_Y',
                'BNH_STB_DT_Z',

                'STB_DKA_UT_X',
                'STB_DKA_UT_Y',
                'STB_DKA_UT_Z',
                'STB_DKA_DT_X',
                'STB_DKA_DT_Y',
                'STB_DKA_DT_Z',

                'DKA_BHI_UT_X',
                'DKA_BHI_UT_Y',
                'DKA_BHI_UT_Z',
                'DKA_BHI_DT_X',
                'DKA_BHI_DT_Y',
                'DKA_BHI_DT_Z',
            ]));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $accelerometer =  Accelerometer::findOrFail($id);
        if (!$accelerometer) {
            return redirect()->back();
        }
        $accelerometer->update([
            'sumbu_x' => $request->sumbu_x,
            'sumbu_y' => $request->sumbu_y,
            'sumbu_z' => $request->sumbu_z,
        ]);
        return back()->withNotify('Data Accelerometer berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Accelerometer::findOrFail($id)->delete();

        return redirect()->route('accelerometer.index');
    }

    public function getValue(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $accelerometer = Accelerometer::where('jadwal_id', $jadwal_id)->get();
        if ($accelerometer->count() > 0) {
            return response()->json($accelerometer);
        }
    }

    public function getPIC(Request $request)
    {
        $tanggal = $request->tanggal;
        $pic = Accelerometer::where('tanggal', $tanggal)->get();
        if (count($pic) > 0) {
            return response()->json($pic);
        }
    }

    public function create_jadwal(Request $request)
    {
        return view('mainline.mainline_accelerometer_examination.create_jadwal');
    }

    public function store_jadwal(Request $request)
    {
        JadwalAccelerometer::create([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'pic' => $request->pic,
        ]);

        return redirect()->route('accelerometer.create')->withNotify('Data jadwal accelerometer berhasil dibuat!');
    }

    public function destroy_jadwal(Request $request)
    {
        $id = $request->id;
        $cek = Accelerometer::where('jadwal_id', $id)->get();
        if ($cek->count() == 0) {
            JadwalAccelerometer::findOrFail($id)->delete();

            return back()->withNotify('Data jadwal Accelerometer berhasil dihapus!');
        } else {
            return back()->withNotifyerror('Data jadwal tidak bisa dihapus karena sudah berisi nilai pengukuran accelerometer!');
        }
    }

    public function export_excel(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $jadwal = JadwalAccelerometer::findOrFail($jadwal_id);
        if (!$jadwal) {
            return back();
        }

        return Excel::download(new AccelerometerExport($jadwal_id), Carbon::parse($jadwal->tanggal)->format('Ymd') . '_data accelerometer.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
