<?php

namespace App\Http\Controllers;

use App\Models\TopoTroubleTicket;
use App\Models\TopotroubleticketDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopotroubleticketDetailController extends Controller
{
    public function create($ticket_id)
    {
        $ticket = TopoTroubleTicket::findOrFail($ticket_id);
        return view('scenes.troubleTicket.TOPO.troubleTopo.createTrouble', compact('ticket'));
    }

    public function store(Request $request, $ticket_id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Success,Failed',
        ]);

        try {

        $detail = new TopoTroubleTicketDetail();
        $detail->topotroubleticket_id = $ticket_id;
        $detail->tanggal = $request->tanggal;
        $detail->tindakan = $request->tindakan;
        $detail->deskripsi = $request->deskripsi;
        $detail->status = $request->status;
        $detail->save();

        Log::info('Data saved successfully: ', $detail->toArray());
    } catch (\Exception $e) {
        Log::error('Error saving data: ' . $e->getMessage());
        return back()->withErrors(['msg' => 'Error saving data.']);
    }

        return redirect()->route('topotroubleticket.show', $ticket_id)
                         ->with('success', 'Ticket detail created successfully.');
    }

    public function edit($ticketId, $id)
    {
        $detail = TopotroubleticketDetail::findOrFail($id);
        $ticket = TopoTroubleTicket::findOrFail($ticketId);
        return view('topotroubleticketdetail.edit', compact('detail', 'ticket'));
    }

    public function update(Request $request, $ticketId, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tindakan' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string|in:gagal,sukses',
        ]);

        $detail = TopotroubleticketDetail::findOrFail($id);
        $detail->update($request->all());

        return redirect()->route('topotroubleticket.show', $ticketId)->with('success', 'Detail updated successfully.');
    }

    public function destroy($ticketId, $id)
    {
        $detail = TopotroubleticketDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('topotroubleticket.show', $ticketId)->with('success', 'Detail deleted successfully.');
    }
}
