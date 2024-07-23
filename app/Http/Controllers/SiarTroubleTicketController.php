<?php

namespace App\Http\Controllers;

use App\Models\DataSite;
use App\Models\SiarTroubleTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiarTroubleTicketController extends Controller
{
    public function index()
    {
        $tickets = SiarTroubleTicket::with('site')->get();
        return view('scenes.troubleTicket.SIAR.listSiar', compact('tickets'));
    }

    public function create()
    {
        $dataSites = DataSite::all(); // Pastikan ini mengambil data dari tabel data_sites
        $users = User::all();
        return view('scenes.troubleTicket.SIAR.createSiar', compact('dataSites', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_id' => 'required|exists:data_sites,id',
            'problem' => 'required|integer|between:1,5',
            'deskripsi' => 'required|string',
            'priority' => 'required|in:High,Medium,Low',
            'status' => 'required|in:Open,In Progress,Closed',
            'assigned_by' => 'required|exists:users,id',
        ]);

        $dataSite = DataSite::find($request->site_id);

        SiarTroubleTicket::create([
            'site_id' => $dataSite->id,
            'siteId' => $dataSite->siteId,
            'nama_site' => $dataSite->name,
            'provinsi' => $dataSite->provinsi,
            'kabupaten' => $dataSite->kabupaten,
            'kecamatan' => $dataSite->kecamatan,
            'problem' => $request->problem,
            'deskripsi' => $request->deskripsi,
            'durasi' => now()->diffForHumans(),
            'created_by' => Auth::id(),
            'priority' => $request->priority,
            'status' => $request->status,
            'assigned_by' => $request->assigned_by,
        ]);

        return redirect()->route('siartroubleticket.index')->with('success', 'Topo Trouble Ticket created successfully.');
    }

    public function show($id)
    {
        $ticket = SiarTroubleTicket::with('site', 'details')->findOrFail($id);
        return view('scenes.troubleTicket.SIAR.showSiar', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = SiarTroubleTicket::findOrFail($id);
        $sites = DataSite::all();
        $users = User::all();
        return view('siartroubleticket.edit', compact('ticket', 'sites', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'site_id' => 'required|exists:data_site,id',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'problem' => 'required|integer',
            'deskripsi' => 'required|string',
            'priority' => 'required|string',
            'status' => 'required|string',
            'assigned_by' => 'required|exists:users,id',
        ]);

        $ticket = SiarTroubleTicket::findOrFail($id);
        $ticket->update($request->all());
        $ticket->updated_by = auth()->user()->id;
        $ticket->save();

        return redirect()->route('siartroubleticket.index')->with('success', 'Trouble ticket updated successfully.');
    }

    public function destroy($id)
    {
        $ticket = SiarTroubleTicket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('siartroubleticket.index')->with('success', 'Trouble ticket deleted successfully.');
    }

    public function getSiteDetails($id)
    {
        $dataSite = DataSite::find($id);
        return response()->json([
            'provinsi' => $dataSite->provinsi,
            'kabupaten' => $dataSite->kabupaten,
            'kecamatan' => $dataSite->kecamatan,
        ]);
    }
}
