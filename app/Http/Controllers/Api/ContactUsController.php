<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use GuzzleHttp\Promise\Create;

class ContactUsController extends Controller
{
    public function contactUs(Request $request)
    {
        $data = [
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'contact_mobileno' => $request->contact_mobileno,
            'contact_address' => $request->contact_address,
            'purpose' => $request->purpose
        ];
        $contact_us = ContactUs::create($data);
        return response()->json([
            'contact' => $contact_us,
        ], 200);
    }
}
