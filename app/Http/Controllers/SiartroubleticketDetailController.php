<?php

namespace App\Http\Controllers;

use App\Models\SiarTroubleTicket;
use App\Models\SiartroubleticketDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiartroubleticketDetailController extends Controller
{
    public function create($ticket_id)
    {
        $ticket = SiarTroubleTicket::findOrFail($ticket_id);
        return view('scenes.troubleTicket.SIAR.troubleSiar.createTrouble', compact('ticket'));
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

            $detail = new SiartroubleticketDetail();
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

        return redirect()->route('siartroubleticket.show', $ticket_id)
            ->with('success', 'Ticket detail created successfully.');
    }

    public function edit($ticketId, $id)
    {
        $detail = SiartroubleticketDetail::findOrFail($id);
        $ticket = SiarTroubleTicket::findOrFail($ticketId);
        return view('siartroubleticketdetail.edit', compact('detail', 'ticket'));
    }

    public function update(Request $request, $ticketId, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tindakan' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string|in:gagal,sukses',
        ]);

        $detail = SiartroubleticketDetail::findOrFail($id);
        $detail->update($request->all());

        return redirect()->route('siartroubleticket.show', $ticketId)->with('success', 'Detail updated successfully.');
    }

    public function destroy($ticketId, $id)
    {
        $detail = SiartroubleticketDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('sairtroubleticket.show', $ticketId)->with('success', 'Detail deleted successfully.');
    }
}
