<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Assistant;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ValidationHelper;

class TicketController extends Controller
{
    public function createForm()
    {
        return view('create_ticket_form');
    }
    
    public function submitForm(Request $request)
    {
        $validated = ValidationHelper::validateTicketRequest($request);

        if ($validated !== true) return $validated; 

        $ticketType = $request->input('ticket_type');
        $ticket = Ticket::where('type', $ticketType)->first();       

        $assistantData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'ticket_id' => $ticket->id,
        ];

        $assistant = Assistant::create($assistantData);
        $ticket->decrement('remaining_slots');

        $qrCode = QrCode::size(300)->generate('https://www.ejemplo.com/tickets/' . $assistant->id);

        Mail::send('ticket_email', ['qrCode' => $qrCode], function ($message) use ($request) {
            $message->to($request->input('email'))
                    ->subject('Confirmación de boleto de acceso al evento');
        });

        return redirect()->back()->with('success', 'Boleto reservado exitosamente.');
    }
}
