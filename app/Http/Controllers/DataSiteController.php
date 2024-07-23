<?php

namespace App\Http\Controllers;

use App\Models\DataSite;
use Illuminate\Http\Request;

class DataSiteController extends Controller
{
    public function index()
    {
        $datasites = DataSite::all();
        return view('scenes.DataSite.listDataSite', compact('datasites'));
    }

    public function create()
    {
        return view('scenes.DataSite.createDataSite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'siteId' => 'required|unique:datasites',
            'name' => 'required',
            // validasi lainnya
        ]);

        DataSite::create($request->all());
        return redirect()->route('datasites.index')->with('success', 'Data Site created successfully.');
    }

    public function show(DataSite $datasite)
    {
        return view('scenes.DataSite.showDataSite', compact('datasite'));
    }

    public function edit(DataSite $datasite)
    {
        return view('scenes.DataSite.editDataSite', compact('datasite'));
    }

    public function update(Request $request, DataSite $datasite)
    {
        $request->validate([
            'siteId' => 'required|unique:datasites,siteId,' . $datasite->id,
            'name' => 'required',
            // validasi lainnya
        ]);

        $datasite->update($request->all());
        return redirect()->route('datasites.index')->with('success', 'Data Site updated successfully.');
    }

    public function destroy(DataSite $datasite)
    {
        $datasite->delete();
        return redirect()->route('datasites.index')->with('success', 'Data Site deleted successfully.');
    }

    // public function getDetails($id)
    // {
    //     $site = DataSite::findOrFail($id);
    //     return response()->json($site);
    // }
}
