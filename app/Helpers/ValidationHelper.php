<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationHelper
{
    public static function validateTicketRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ticket_type' => 'required|in:VIP,preference,general',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        return true;
    }
}
