<?php

use App\Http\Controllers\AccelerometerController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BufferController;
use App\Http\Controllers\BufferExaminationController;
use App\Http\Controllers\civil\CivilDashboardController;
use App\Http\Controllers\civil\DefectCivilController;
use App\Http\Controllers\civil\DetailAreaController;
use App\Http\Controllers\civil\DetailPartCivilController;
use App\Http\Controllers\civil\PartCivilController;
use App\Http\Controllers\civil\RelasiAreaCivilController;
use App\Http\Controllers\civil\RelasiDefectCivilController;
use App\Http\Controllers\civil\RfiCivilController;
use App\Http\Controllers\civil\SubAreaController;
use App\Http\Controllers\civil\TemuanVisualCivilController;
use App\Http\Controllers\ClosingReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefectController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepoDashboardController;
use App\Http\Controllers\DepoLineController;
use App\Http\Controllers\DetailPartController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\IndividualPerformanceController;
use App\Http\Controllers\JadwalPekerjaanController;
use App\Http\Controllers\JointController;
use App\Http\Controllers\LengkungController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\MainlineController;
use App\Http\Controllers\ManPowerOnDutyController;
use App\Http\Controllers\MasterdataDashboardController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PICController;
use App\Http\Controllers\planning\PlanningDashboard;
use App\Http\Controllers\planning\PlanningDashboardController;
use App\Http\Controllers\PMController;
use App\Http\Controllers\RfiController;
use App\Http\Controllers\RfiDepoController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\SleeperExaminationController;
use App\Http\Controllers\TemuanController;
use App\Http\Controllers\TemuanDepoController;
use App\Http\Controllers\TemuanMainlineController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\ToolsMaterialsController;
use App\Http\Controllers\TrackbedExaminationController;
use App\Http\Controllers\TransDefectController;
use App\Http\Controllers\UltrasonicTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeselController;
use App\Http\Controllers\WeselExaminationController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginView')->name('login.index');
});

Route::controller(ShowPageController::class)->group(function () {
    Route::get('/whats-today', 'index')->name('show.page.index');

    Route::get('/api/man_power', 'getManPower')->name('man_power.get');
    Route::get('/api/announcement', 'getAnnouncement')->name('announcement.get');
    Route::get('/api/activity', 'getActivity')->name('activity.get');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('transisi', [AuthController::class, 'transisi'])->name('transisi')->middleware('isUser');
    Route::get('transisi-user', [AuthController::class, 'transisi_user'])->name('transisi.user');
    Route::get('/', [AuthController::class, 'index']);

    // JADWAL PEKERJAAN
    Route::controller(JadwalPekerjaanController::class)->group(function () {
        Route::get('/jadwal-pekerjaan', 'index')->name('jadwal.pekerjaan.index');
        Route::post('/jadwal-pekerjaan', 'store')->name('jadwal.pekerjaan.store');
        Route::get('/jadwal-pekerjaan/export-pdf', 'export_pdf')->name('jadwal.pekerjaan.export_pdf');
        Route::post('fullcalenderAjax', 'ajax');
        Route::get('/jadwal-pekerjaan/create', 'create')->name('jadwal.pekerjaan.create');
        Route::get('/jadwal-pekerjaan-list', 'list')->name('jadwal.pekerjaan.list');
        Route::get('/jadwal-pekerjaan/filter', 'filter')->name('jadwal.pekerjaan.filter');
        Route::put('/jadwal-pekerjaan', 'update')->name('jadwal.pekerjaan.update');
        Route::delete('/jadwal-pekerjaan', 'destroy')->name('jadwal.pekerjaan.delete');

        // GET DATA
        Route::get('/getPekerjaan', 'getPekerjaan')->name('get-data.pekerjaan');
    });

    // MAN POWER ON DUTY
    Route::controller(ManPowerOnDutyController::class)->group(function () {
        Route::get('/man-power-on-duty', 'index')->name('man.power.index');
        Route::post('/man-power-on-duty', 'store')->name('man.power.store');
        Route::get('/man-power-on-duty/export-pdf', 'export_pdf')->name('man.power.export_pdf');
        Route::post('manPowerAjax', 'ajax');
        Route::get('/man-power-on-duty/create', 'create')->name('man.power.create');
        Route::get('/man-power-on-duty-list', 'list')->name('man.power.list');
        Route::get('/man-power-on-duty/filter', 'filter')->name('man.power.filter');
        Route::put('/man-power-on-duty', 'update')->name('man.power.update');
        Route::delete('/man-power-on-duty', 'destroy')->name('man.power.delete');

        // GET DATA
        Route::get('/getPegawai', 'getPegawai')->name('get-data.pegawai');
    });

    // ANNOUNCEMENTS
    Route::controller(AnnouncementController::class)->group(function () {
        Route::get('/announcement', 'index')->name('announcement.index');
        Route::post('/announcement', 'store')->name('announcement.store');
        Route::get('/announcement/create', 'create')->name('announcement.create');
        Route::get('/announcement/filter', 'filter')->name('announcement.filter');
        Route::put('/announcement', 'update')->name('announcement.update');
        Route::delete('/announcement', 'destroy')->name('announcement.delete');
    });

    // PROFILE
    Route::controller(PICController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/profile-update', 'update')->name('profile.update');
        Route::put('/profile-update', 'update_photo')->name('profile.update.photo');
        Route::put('/profile-update-ttd', 'update_ttd')->name('profile.update.ttd');
        Route::put('/profile-update/password', 'update_password')->name('profile.update.password');
        Route::put('/profile-update/pic', 'update_progress_pic')->name('profile.update.progress.pic');
    });

    // GET DATA
    Route::controller(GetDataController::class)->group(function () {
        Route::get('/getLocation', 'getLocation')->name('getLocation');
        Route::get('/getLine', 'getLine')->name('getLine');
        Route::get('/getSpan', 'getSpan')->name('getSpan');
        Route::get('/getDetailPart', 'getDetailPart')->name('getDetailPart');
        Route::get('/getDefect', 'getDefect')->name('getDefect');
        Route::get('/getAvatar', 'getAvatar')->name('getAvatar');
    });

    /////////////////////////////   START TRACK   /////////////////////////////////////
    Route::middleware(['isTrack'])->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/home', 'home');
            Route::get('/mainline/dashboard', 'index')->name('home');
        });

        Route::controller(DepoDashboardController::class)->group(function () {
            Route::get('/depo/dashboard', 'index')->name('depo.index');
        });

        Route::controller(PICController::class)->group(function () {
            Route::get('/pic', 'index')->name('pic.index');
            Route::get('/pic-create', 'create')->name('pic.create');
            Route::post('/pic', 'store')->name('pic.store');
            Route::get('/pic/{id}/edit', 'edit')->name('pic.edit');
            Route::get('/pic-filter', 'pic_filter')->name('pic.filter');
            Route::put('/pic', 'pic_update')->name('pic.update');
        });

        Route::controller(RfiController::class)->group(function () {
            Route::get('/rfi-mainline', 'index')->name('rfi.mainline.index');
            Route::get('/rfi-mainline/{id}/rfi', 'create')->name('rfi.mainline.create');
            Route::post('/rfi-mainline', 'store')->name('rfi.mainline.store');
            Route::put('/rfi-mainline', 'approve')->name('rfi.mainline.approve');
            Route::put('/rfi-mainline-update', 'update')->name('rfi.mainline.update');
            Route::delete('/rfi-mainline', 'destroy')->name('rfi.mainline.delete');
        });

        Route::controller(RfiDepoController::class)->group(function () {
            Route::get('/rfi-depo', 'index')->name('rfi.depo.index');
            Route::get('/rfi-depo/{id}/rfi', 'create')->name('rfi.depo.create');
            Route::post('/rfi-depo', 'store')->name('rfi.depo.store');
            Route::put('/rfi-depo', 'approve')->name('rfi.depo.approve');
            Route::put('/rfi-depo-update', 'update')->name('rfi.depo.update');
            Route::delete('/rfi-depo', 'destroy')->name('rfi.depo.delete');
        });

        Route::controller(TemuanController::class)->group(function () {
            Route::get('/temuan', 'index')->name('temuan.index');
            Route::get('/temuan-create', 'create')->name('temuan.create');
            Route::post('/temuan', 'store')->name('temuan.store');
            Route::get('/temuan/{id}/edit', 'edit')->name('temuan.edit');
            Route::put('/temuan', 'update')->name('temuan.update');
            Route::delete('/temuan', 'destroy')->name('temuan.delete');
            Route::get('/temuan/export', 'export')->name('temuan.export');
        });

        Route::controller(TemuanMainlineController::class)->group(function () {
            Route::get('/temuan_mainline', 'index')->name('temuan_mainline.index');
            Route::get('/temuan_mainline-create', 'create')->name('temuan_mainline.create');
            Route::post('/temuan_mainline', 'store')->name('temuan_mainline.store');
            Route::get('/temuan_mainline/{id}/edit', 'edit')->name('temuan_mainline.edit');
            Route::put('/temuan_mainline', 'update')->name('temuan_mainline.update');
            Route::delete('/temuan_mainline', 'destroy')->name('temuan_mainline.delete');
            Route::get('/search/temuan_mainline', 'search')->name('temuan_mainline.search');
            Route::get('/temuan_mainline/{id}/close_temuan', 'close_temuan')->name('temuan_mainline.close.temuan');
            Route::put('/temuan_mainline/close_temuan', 'store_temuan')->name('temuan_mainline.store.temuan');
            Route::get('/temuan/export_mainline', 'export')->name('temuan_mainline.export');
            Route::get('/temuan/export_mainline_pdf', 'export_pdf')->name('temuan_mainline.export.pdf');
            Route::get('/temuan-mainline/filter', 'filter')->name('temuan_mainline.filter');
            Route::get('/temuan-mainline/report', 'report')->name('temuan_mainline.report');
        });

        Route::controller(TemuanDepoController::class)->group(function () {
            Route::get('/temuan_depo', 'index')->name('temuan_depo.index');
            Route::get('/temuan_depo-create', 'create')->name('temuan_depo.create');
            Route::post('/temuan_depo', 'store')->name('temuan_depo.store');
            Route::get('/temuan_depo/{id}/edit', 'edit')->name('temuan_depo.edit');
            Route::put('/temuan_depo', 'update')->name('temuan_depo.update');
            Route::delete('/temuan_depo', 'destroy')->name('temuan_depo.delete');
            Route::get('/temuan_depo/{id}/close_temuan', 'close_temuan')->name('temuan_depo.close.temuan');
            Route::put('/temuan_depo/close_temuan', 'store_temuan')->name('temuan_depo.store.temuan');
            Route::get('/depo/export_mainline', 'export')->name('temuan_depo.export');
            Route::get('/depo/export_mainline_pdf', 'export_pdf')->name('temuan_depo.export.pdf');
            Route::get('/temuan-depo/filter', 'filter')->name('temuan_depo.filter');
            Route::get('/temuan-depo/report', 'report')->name('temuan_depo.report');
        });

        // ACCELEROMETER
        Route::controller(AccelerometerController::class)->group(function () {
            Route::get('/accelerometer', 'index')->name('accelerometer.index');
            Route::get('/summary/{id}/accelerometer', 'index_summary')->name('accelerometer.summary.index');
            Route::get('/accelerometer-create', 'create')->name('accelerometer.create');
            Route::post('/accelerometer', 'store')->name('accelerometer.store');
            Route::get('/accelerometer/{id}/edit', 'edit')->name('accelerometer.edit');
            Route::put('/accelerometer', 'update')->name('accelerometer.update');
            Route::delete('/accelerometer', 'destroy')->name('accelerometer.delete');
            Route::get('/accelerometer-filter', 'filter')->name('accelerometer.filter');
            Route::get('/accelerometer/report', 'report')->name('accelerometer.report');
            Route::get('/accelerometer/export-excel', 'export_excel')->name('accelerometer.export.excel');

            Route::get('/accelerometer/jadwal', 'index_jadwal')->name('accelerometer.jadwal.index');
            Route::get('/accelerometer-create/jadwal', 'create_jadwal')->name('accelerometer.jadwal.create');
            Route::post('/accelerometer/jadwal', 'store_jadwal')->name('accelerometer.jadwal.store');
            Route::get('/accelerometer/{id}/edit/jadwal', 'edit_jadwal')->name('accelerometer.jadwal.edit');
            Route::put('/accelerometer/jadwal', 'update_jadwal')->name('accelerometer.jadwal.update');
            Route::delete('/accelerometer/jadwal', 'destroy_jadwal')->name('accelerometer.jadwal.delete');

            // GET DATA
            Route::get('/getValueAccelerometer', 'getValue')->name('accelerometer.getValue');
            Route::get('/getPICAccelerometer', 'getPIC')->name('accelerometer.getPIC');
        });

        // WESEL EXAMINATION
        Route::controller(WeselExaminationController::class)->group(function () {
            Route::get('/wesel-examination', 'index')->name('wesel.examination.index');
            Route::get('/wesel-examination-create', 'create')->name('wesel.examination.create');
            Route::get('/wesel-examination/{id}/history', 'history')->name('wesel.examination.history');
            Route::post('/wesel-examination', 'store')->name('wesel.examination.store');
            Route::get('/wesel-examination/{id}/edit', 'edit')->name('wesel.examination.edit');
            Route::get('/wesel-examination/filter', 'filter')->name('wesel.examination.filter');
            Route::get('/wesel-examination-export', 'export')->name('wesel.examination.export');
            Route::put('/wesel-examination', 'update')->name('wesel.examination.update');
            Route::delete('/wesel-examination', 'destroy')->name('wesel.examination.delete');

            // REPORT
            Route::get('/wesel-examination-report', 'report')->name('wesel.examination.report');
        });

        // BUFFER/WHEEL STOP EXAMINATION
        Route::controller(BufferExaminationController::class)->group(function () {
            Route::get('/buffer-examination', 'index')->name('buffer.examination.index');
            Route::get('/buffer-examination-create', 'create')->name('buffer.examination.create');
            Route::post('/buffer-examination', 'store')->name('buffer.examination.store');
            Route::get('/buffer-examination/{id}/edit', 'edit')->name('buffer.examination.edit');
            Route::put('/buffer-examination', 'update')->name('buffer.examination.update');
            Route::delete('/buffer-examination', 'destroy')->name('buffer.examination.delete');
            Route::get('/buffer-examination-report', 'report')->name('buffer.examination.report');
        });

        // TRACKBED EXAMINATION
        Route::controller(TrackbedExaminationController::class)->group(function () {
            Route::get('/trackbed-examination', 'index')->name('trackbed.examination.index');
            Route::get('/trackbed-examination-report', 'report')->name('trackbed.examination.report');
        });

        // SLEEPER EXAMINATION
        Route::controller(SleeperExaminationController::class)->group(function () {
            Route::get('/sleeper-examination', 'index')->name('sleeper.examination.index');
            Route::get('/sleeper-examination-report', 'report')->name('sleeper.examination.report');
        });

        // ULTRASONIC TEST EXAMINATION
        Route::controller(UltrasonicTestController::class)->group(function () {
            Route::get('/ultrasonic-test-examination/work-order', 'index_wo_ut')->name('ut.examination.index_wo_ut');
            Route::get('/ultrasonic-test-examination/work-order-filter', 'filter_wo_ut')->name('ut.examination.filter_wo_ut');
            Route::get('/ultrasonic-test-examination/{id}/detail', 'index')->name('ut.examination.index');
            Route::get('/ultrasonic-test-examination/{id}/history', 'history')->name('ut.examination.history');
            Route::get('/ultrasonic-test-examination/{id}/create', 'create')->name('ut.examination.create');
            Route::get('/ultrasonic-test-examination/filter', 'filter')->name('ut.examination.filter');
            Route::post('/ultrasonic-test-examination/import', 'import')->name('ut.examination.import');
            Route::post('/ultrasonic-test-examination', 'store')->name('ut.examination.store');
            Route::get('/ultrasonic-test-examination/{id}/edit', 'edit')->name('ut.examination.edit');
            Route::put('/ultrasonic-test-examination', 'update')->name('ut.examination.update');
            Route::delete('/ultrasonic-test-examination', 'destroy')->name('ut.examination.delete');
            Route::get('/ultrasonic-test-examination-report', 'report')->name('ut.examination.report');

            // GET DATA
            Route::get('/get-no-joint', 'getNoWeldingJoint');
            Route::get('/get-no-joint-wesel', 'getNoWeldingJointWesel');
        });

        Route::controller(ClosingReportController::class)->group(function () {
            Route::get('/closing_report', 'index')->name('closing_report.index');
            Route::get('/setdev', 'setdev');
            Route::get('/closing_report_create', 'create')->name('closing_report.create');
            Route::post('/closing_report', 'store')->name('closing_report.store');
            Route::get('/closing_report_form', 'form')->name('closing_report.form');
            Route::get('/generate_form', 'generate_form')->name('generate.form');
            Route::get('/closing_report_check', 'destroy')->name('closing_report.check');
        });
    });
    /////////////////////////////   END TRACK  /////////////////////////////////////


    /////////////////////////////   START CIVIL   /////////////////////////////////////
    Route::middleware(['isCivil'])->group(function () {
        Route::controller(CivilDashboardController::class)->group(function () {
            Route::get('/activity/civil/dashboard', 'activity')->name('dashboard-activity-civil.index');
        });

        // VISUAL EXAMINATION
        Route::controller(TemuanVisualCivilController::class)->group(function () {
            Route::get('/temuan-visual', 'index')->name('temuan-visual.index');
            Route::get('/temuan-visual-create', 'create')->name('temuan-visual.create');
            Route::post('/temuan-visual', 'store')->name('temuan-visual.store');
            Route::get('/temuan-visual/{id}/edit', 'edit')->name('temuan-visual.edit');
            Route::put('/temuan-visual', 'update')->name('temuan-visual.update');
            Route::delete('/temuan-visual', 'destroy')->name('temuan-visual.delete');
            Route::post('/temuan-visual/justifikasi', 'justifikasi')->name('temuan-visual.justifikasi');
            Route::get('/temuan-visual/filter', 'filter')->name('temuan-visual.filter');
            Route::get('/temuan-visual/export-visual-excel', 'export')->name('temuan-visual.export');
            Route::get('/temuan-visual/export-visual-pdf', 'export_pdf')->name('temuan-visual.export.pdf');
        });

        // RFI
        Route::controller(RfiCivilController::class)->group(function () {
            Route::get('/rfi-civil', 'index')->name('rfi.civil.index');
            Route::get('/rfi-civil/{id}/rfi', 'create')->name('rfi.civil.create');
            Route::post('/rfi-civil', 'store')->name('rfi.civil.store');
            Route::put('/rfi-civil', 'approve')->name('rfi.civil.approve');
            Route::put('/rfi-civil-update', 'update')->name('rfi.civil.update');
            Route::delete('/rfi-civil', 'destroy')->name('rfi.civil.delete');
        });
    });
    /////////////////////////////   END CIVIL  /////////////////////////////////////



    /////////////////////////////   START PLANNING  /////////////////////////////////////


    Route::middleware(['isPlanning'])->group(function(){
        Route::controller(PlanningDashboardController::class)->group(function() {
            Route::get('/activity/planning/dashboard', 'activity')->name('dashboard-activity-planning.index');
        });

        Route::controller(ToolsController::class)->group(function(){
            Route::get('/data-tools', 'user_activity')->name('data-tools');
        });
    });

    /////////////////////////////   END PLANNING  /////////////////////////////////////


    Route::middleware('isAdmin')->group(function () {
        /////////////////////////////   START TRACK  /////////////////////////////////////
        Route::middleware('isTrack')->group(function () {
            Route::controller(MasterdataDashboardController::class)->group(function () {
                Route::get('/master-data/dashboard', 'index')->name('masterdata.index');
            });

            Route::controller(UserController::class)->group(function () {
                Route::get('/usermanage', 'index')->name('usermanage.index');
                Route::get('/usermanage-create', 'create')->name('usermanage.create');
                Route::post('/usermanage', 'store')->name('usermanage.store');
                Route::get('/usermanage/{id}/update', 'edit')->name('usermanage.edit');
                Route::put('/usermanage', 'update')->name('usermanage.update');
                Route::put('/usermanage/reset-password', 'reset_password')->name('reset.password');
                Route::get('/usermanage/ban-user/{id}', 'ban_user')->name('ban.user');
                Route::get('/usermanage/unban-user/{id}', 'unban_user')->name('unban.user');
                Route::get('/usermanage/list-ban-user', 'list_ban_user')->name('list.ban.user');
            });

            Route::controller(AreaController::class)->group(function () {
                Route::get('/area', 'index')->name('area.index');
                Route::get('/area-create', 'create')->name('area.create');
                Route::post('/area', 'store')->name('area.store');
                Route::get('/area/{id}/edit', 'edit')->name('area.edit');
                Route::put('/area', 'update')->name('area.update');
                Route::get('/area/{id}/delete', 'destroy')->name('area.delete');
            });

            Route::controller(LineController::class)->group(function () {
                Route::get('/line', 'index')->name('line.index');
                Route::get('/line-create', 'create')->name('line.create');
                Route::post('/line', 'store')->name('line.store');
                Route::get('/line/{id}/edit', 'edit')->name('line.edit');
                Route::put('/line', 'update')->name('line.update');
                Route::get('/line/{id}/delete', 'destroy')->name('line.delete');
            });

            Route::controller(MainlineController::class)->group(function () {
                Route::get('/trackbed', 'index')->name('mainline.index');
                Route::get('/trackbed-create', 'create')->name('mainline.create');
                Route::post('/mainline', 'store')->name('mainline.store');
                Route::get('/mainline/{id}/edit', 'edit')->name('mainline.edit');
                Route::put('/mainline', 'update')->name('mainline.update');
                Route::get('/mainline/{id}/delete', 'destroy')->name('mainline.delete');

                Route::post('/mainline/import', 'import')->name('mainline.import');
                Route::get('/mainline/export', 'export')->name('mainline.export');
                Route::get('/mainline/json', 'getJson')->name('mainline.json');
            });

            Route::controller(PartController::class)->group(function () {
                Route::get('/part', 'index')->name('part.index');
                Route::get('/part-create', 'create')->name('part.create');
                Route::post('/part', 'store')->name('part.store');
                Route::get('/part/{id}/edit', 'edit')->name('part.edit');
                Route::put('/part', 'update')->name('part.update');
                Route::delete('/part', 'destroy')->name('part.delete');
            });

            Route::controller(DepartementController::class)->group(function () {
                Route::get('/departement', 'index')->name('departement.index');
                Route::get('/departement-create', 'create')->name('departement.create');
                Route::post('/departement', 'store')->name('departement.store');
                Route::get('/departement/{id}/edit', 'edit')->name('departement.edit');
                Route::put('/departement', 'update')->name('departement.update');
                Route::delete('/departement', 'destroy')->name('departement.delete');
            });

            Route::controller(SectionController::class)->group(function () {
                Route::get('/section', 'index')->name('section.index');
                Route::get('/section-create', 'create')->name('section.create');
                Route::post('/section', 'store')->name('section.store');
                Route::get('/section/{id}/edit', 'edit')->name('section.edit');
                Route::put('/section', 'update')->name('section.update');
                Route::delete('/section', 'destroy')->name('section.delete');
            });

            Route::controller(ShiftController::class)->group(function () {
                Route::get('/shift', 'index')->name('shift.index');
                Route::get('/shift-create', 'create')->name('shift.create');
                Route::post('/shift', 'store')->name('shift.store');
                Route::get('/shift/{id}/edit', 'edit')->name('shift.edit');
                Route::put('/shift', 'update')->name('shift.update');
                Route::delete('/shift', 'destroy')->name('shift.delete');
            });

            Route::controller(DetailPartController::class)->group(function () {
                Route::get('/detail-part', 'index')->name('detail-part.index');
                Route::get('/detail-part-create', 'create')->name('detail-part.create');
                Route::post('/detail-part', 'store')->name('detail-part.store');
                Route::get('/detail-part/{id}/edit', 'edit')->name('detail-part.edit');
                Route::put('/detail-part', 'update')->name('detail-part.update');
                Route::delete('/detail-part', 'destroy')->name('detail-part.delete');
            });

            Route::controller(DefectController::class)->group(function () {
                Route::get('/defect', 'index')->name('defect.index');
                Route::get('/defect-create', 'create')->name('defect.create');
                Route::post('/defect', 'store')->name('defect.store');
                Route::get('/defect/{id}/edit', 'edit')->name('defect.edit');
                Route::put('/defect', 'update')->name('defect.update');
                Route::delete('/defect', 'destroy')->name('defect.delete');
            });

            Route::controller(TransDefectController::class)->group(function () {
                Route::get('/TransDefect', 'index')->name('transDefect.index');
                Route::get('/TransDefect-create', 'create')->name('transDefect.create');
                Route::post('/TransDefect', 'store')->name('transDefect.store');
                Route::get('/TransDefect/{id}/edit', 'edit')->name('transDefect.edit');
                Route::put('/TransDefect', 'update')->name('transDefect.update');
                Route::delete('/TransDefect', 'destroy')->name('transDefect.delete');
                Route::post('/TransDefect/import', 'import')->name('transDefect.import');
            });

            Route::controller(WeselController::class)->group(function () {
                Route::get('/wesel', 'index')->name('wesel.index');
                Route::get('/wesel-create', 'create')->name('wesel.create');
                Route::post('/wesel', 'store')->name('wesel.store');
                Route::get('/wesel/{id}/edit', 'edit')->name('wesel.edit');
                Route::put('/wesel', 'update')->name('wesel.update');
                Route::delete('/wesel', 'destroy')->name('wesel.delete');
                Route::post('/wesel-import', 'import')->name('wesel.import');
            });

            Route::controller(JointController::class)->group(function () {
                Route::get('/joint', 'index')->name('joint.index');
                Route::get('/joint-depo', 'depo')->name('joint.depo.index');
                Route::get('/joint-create', 'create')->name('joint.create');
                Route::get('/joint/filter', 'filter')->name('joint.filter');
                Route::get('/joint-depo/filter', 'depo_filter')->name('joint.depo.filter');
                Route::post('/joint', 'store')->name('joint.store');
                Route::get('/joint/{id}/edit', 'edit')->name('joint.edit');
                Route::put('/joint', 'update')->name('joint.update');
                Route::delete('/joint', 'destroy')->name('joint.delete');
                Route::post('/joint-import', 'import')->name('joint.import');

                Route::get('/joint-no-span', 'joint_no_span')->name('joint.no.span');
                Route::get('/joint/export_mainline', 'export_excel')->name('joint.mainline.export.excel');
                Route::get('/joint/export_depo', 'export_excel_depo')->name('joint.depo.export.excel');
            });

            Route::controller(PMController::class)->group(function () {
                Route::get('/pm', 'index')->name('pm.index');
                Route::get('/pm-create', 'create')->name('pm.create');
                Route::post('/pm', 'store')->name('pm.store');
                Route::get('/pm/{id}/edit', 'edit')->name('pm.edit');
                Route::put('/pm', 'update')->name('pm.update');
                Route::delete('/pm', 'destroy')->name('pm.delete');
            });

            Route::controller(WorkOrderController::class)->group(function () {
                Route::get('/work-order', 'index')->name('wo.index');
                Route::get('/work-order-create', 'create')->name('wo.create');
                Route::get('/work-order-filter', 'filter')->name('wo.filter');
                Route::post('/work-order', 'store')->name('wo.store');
                Route::get('/work-order/{id}/edit', 'edit')->name('wo.edit');
                Route::put('/work-order', 'update')->name('wo.update');
                Route::delete('/work-order', 'destroy')->name('wo.delete');
            });

            Route::controller(IndividualPerformanceController::class)->group(function () {
                Route::get('/individual-performance', 'index')->name('performance.index');
            });

            Route::controller(BufferController::class)->group(function () {
                Route::get('/buffer', 'index')->name('buffer.index');
                Route::get('/buffer-create', 'create')->name('buffer.create');
                Route::post('/buffer', 'store')->name('buffer.store');
                Route::get('/buffer/{id}/edit', 'edit')->name('buffer.edit');
                Route::put('/buffer', 'update')->name('buffer.update');
                Route::delete('/buffer', 'destroy')->name('buffer.delete');
            });

            Route::controller(DepoLineController::class)->group(function () {
                Route::get('/depoline', 'index')->name('depoline.index');
                Route::get('/depoline-create', 'create')->name('depoline.create');
                Route::post('/depoline', 'store')->name('depoline.store');
                Route::get('/depoline/{id}/edit', 'edit')->name('depoline.edit');
                Route::put('/depoline', 'update')->name('depoline.update');
                Route::delete('/depoline/{id}/delete', 'destroy')->name('depoline.delete');
            });

            Route::controller(LengkungController::class)->group(function () {
                Route::get('/lengkung', 'index')->name('lengkung.index');
                Route::get('/lengkung-create', 'create')->name('lengkung.create');
                Route::post('/lengkung', 'store')->name('lengkung.store');
                Route::get('/lengkung/{id}/edit', 'edit')->name('lengkung.edit');
                Route::get('/lengkung/filter', 'filter')->name('lengkung.filter');
                Route::put('/lengkung', 'update')->name('lengkung.update');
                Route::delete('/lengkung', 'destroy')->name('lengkung.delete');
                Route::post('/lengkung-import', 'import')->name('lengkung.import');
            });

            Route::controller(ToolsMaterialsController::class)->group(function () {
                Route::get('/tools', 'index')->name('tools.index');
                Route::post('/tools', 'store')->name('tools.store');
            });
        });
        /////////////////////////////   END TRACK  /////////////////////////////////////


        /////////////////////////////   START CIVIL   /////////////////////////////////////
        Route::middleware(['isCivil'])->group(function () {
            Route::controller(CivilDashboardController::class)->group(function () {
                Route::get('/master-data/civil/dashboard', 'masterdata')->name('dashboard-masterdata-civil.index');
            });

            Route::controller(SubAreaController::class)->group(function () {
                Route::get('/sub-area', 'index')->name('sub-area.index');
                Route::post('/sub-area', 'store')->name('sub-area.store');
                Route::put('/sub-area', 'update')->name('sub-area.update');
                Route::delete('/sub-area', 'destroy')->name('sub-area.delete');
            });

            Route::controller(DetailAreaController::class)->group(function () {
                Route::get('/detail-area', 'index')->name('detail-area.index');
                Route::post('/detail-area', 'store')->name('detail-area.store');
                Route::put('/detail-area', 'update')->name('detail-area.update');
                Route::delete('/detail-area', 'destroy')->name('detail-area.delete');
            });

            Route::controller(RelasiAreaCivilController::class)->group(function () {
                Route::get('/relasi-area', 'index')->name('relasi-area.index');
                Route::post('/relasi-area', 'store')->name('relasi-area.store');
                Route::get('/relasi-area/{id}/edit', 'edit')->name('relasi-area.edit');
                Route::put('/relasi-area', 'update')->name('relasi-area.update');
                Route::delete('/relasi-area', 'destroy')->name('relasi-area.delete');
            });

            Route::controller(DefectCivilController::class)->group(function () {
                Route::get('/defect-civil', 'index')->name('defect-civil.index');
                Route::post('/defect-civil', 'store')->name('defect-civil.store');
                Route::put('/defect-civil', 'update')->name('defect-civil.update');
                Route::delete('/defect-civil', 'destroy')->name('defect-civil.delete');
            });

            Route::controller(PartCivilController::class)->group(function () {
                Route::get('/part-civil', 'index')->name('part-civil.index');
                Route::post('/part-civil', 'store')->name('part-civil.store');
                Route::put('/part-civil', 'update')->name('part-civil.update');
                Route::delete('/part-civil', 'destroy')->name('part-civil.delete');
            });

            Route::controller(DetailPartCivilController::class)->group(function () {
                Route::get('/detail-part-civil', 'index')->name('detail-part-civil.index');
                Route::post('/detail-part-civil', 'store')->name('detail-part-civil.store');
                Route::put('/detail-part-civil', 'update')->name('detail-part-civil.update');
                Route::delete('/detail-part-civil', 'destroy')->name('detail-part-civil.delete');
            });

            Route::controller(RelasiDefectCivilController::class)->group(function () {
                Route::get('/relasi-defect', 'index')->name('relasi-defect.index');
                Route::post('/relasi-defect', 'store')->name('relasi-defect.store');
                Route::get('/relasi-defect/{id}/edit', 'edit')->name('relasi-defect.edit');
                Route::put('/relasi-defect', 'update')->name('relasi-defect.update');
                Route::delete('/relasi-defect', 'destroy')->name('relasi-defect.delete');
            });
        });

        /////////////////////////////   END CIVIL  /////////////////////////////////////



        /////////////////////////////   START PLANNING  ////////////////////////////////////

        Route::middleware('isPlanning')->group(function(){
            Route::controller(PlanningDashboardController::class)->group(function(){
                Route::get('/master-data/planning', 'masterdata')->name('dashboard-masterdata-planning.index');
            });

            Route::controller(ToolsController::class)->group(function(){
                Route::get('/masterdata-tools', 'masterdata')->name('masterdata-tools');
                Route::get('/masterdata-tools-create', 'create')->name('masterdata-tools.create');
                Route::post('/masterdata-tools-store','store')->name('masterdata-tools.store');
                Route::get('/masterdata-tools-edit/{id}/edit', 'edit')->name('masterdata-tools.edit');
                Route::put('/masterdata-tools-update', 'update')->name('masterdata-tools.update');
            });
        });
        /////////////////////////////   END PLANNING  /////////////////////////////////////



    });
});

Route::controller(SendEmailController::class)->group(function () {
    Route::get('/send-email-rfi', 'rfi')->name('send-email.rfi');
});
