<?php

namespace App\Http\Controllers;

use App\Models\ProblemSite;
use App\Models\DataSite;
use Illuminate\Http\Request;

class ProblemSiteController extends Controller
{
    public function index(DataSite $datasite)
    {
        $problems = $datasite->problemSites;
        return view('problems.index', compact('problems', 'datasite'));
    }

    public function create(DataSite $datasite)
    {
        return view('problems.create', compact('datasite'));
    }

    public function store(Request $request, $datasiteId)
{
    $request->validate([
        'riwayat_problem' => 'required|string|max:255',
        'description' => 'required|string',
        'petugas' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    $problem = new ProblemSite();
    $problem->data_site_id = $datasiteId;
    $problem->riwayat_problem = $request->riwayat_problem;
    $problem->description = $request->description;
    $problem->petugas = $request->petugas;
    $problem->status = $request->status;

    $problem->save();

    return redirect()->route('datasites.show', $datasiteId)->with('success', 'Problem added successfully.');
}

    public function show(DataSite $datasite, ProblemSite $problemSite)
    {
        return view('problems.show', compact('problemSite', 'datasite'));
    }

    public function edit(DataSite $datasite, ProblemSite $problemSite)
    {
        return view('problems.edit', compact('problemSite', 'datasite'));
    }

    public function update(Request $request, $datasiteId, $problemId)
{
    $request->validate([
        'riwayat_problem' => 'required|string|max:255',
        'description' => 'required|string',
        'petugas' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    $problem = ProblemSite::findOrFail($problemId);

    $problem->riwayat_problem = $request->riwayat_problem;
    $problem->description = $request->description;
    $problem->petugas = $request->petugas;
    $problem->status = $request->status;

    $problem->save();

    return redirect()->route('datasites.show', $datasiteId)->with('success', 'Problem updated successfully.');
}

public function destroy($datasiteId, $problemId)
{
    $problem = ProblemSite::findOrFail($problemId);
    $problem->delete();

    return redirect()->route('datasites.show', $datasiteId)->with('success', 'Problem deleted successfully.');
}
}

