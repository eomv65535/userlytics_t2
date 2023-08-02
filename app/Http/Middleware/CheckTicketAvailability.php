<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Ticket;

class CheckTicketAvailability
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ticketType = $request->input('ticket_type');
        $ticket = Ticket::where('type', $ticketType)->first();

        if (!$ticket || $ticket->remaining_slots <= 0) {
            return redirect()->back()->with('error', 'Los boletos de este tipo están agotados.');
        }

        return $next($request);
    }
}
