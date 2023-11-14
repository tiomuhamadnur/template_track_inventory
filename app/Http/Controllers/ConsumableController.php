<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumableController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')){
            $consumable = Consumable::where('name', 'LIKE','%'.$request->search.'%')->get();
        }else{
            $consumable = Consumable::all();
        };

        return view('planning.masterdata.masterdata_consumable.index', compact(['consumable']));
    }

    public function create()
    {
        return view('planning.masterdata.masterdata_consumable.create');
    }

    public function store(Request $request)
    {
        Consumable::create([
            'name' => $request->name,
            'code' => $request->code,
            'stock' => $request->stock,
            'unit' => $request->unit,
        ]);

        return redirect(route('masterdata-consumable.index'))->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $consumable = Consumable::findOrFail($id);

        return view('planning.masterdata.masterdata_consumable.update', compact(['consumable']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $consumable = Consumable::findOrFail($id);
        if ($consumable){
            $consumable->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'unit' => $request->unit,
            ]);
        }

        return redirect(route('masterdata-consumable.index'))->withNotify('Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        //
    }
}
