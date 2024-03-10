<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function handleMidtransNotification(Request $request)
    {
        // Validate the incoming request data if necessary

        // Create a new Midtrans model instance and fill it with the request data
        $midtrans = new Midtrans();
        $midtrans->fill($request->all());
        $midtrans->save();

        // You can add any additional logic here if needed

        return response()->json(['message' => 'Midtrans notification received successfully'], 200);
    }
}
