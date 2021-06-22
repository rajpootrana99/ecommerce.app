<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' => $message->first()
            ]);
        }
        try {
            $contactUs = ContactUs::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('message') ?? '',
            ]);
            return response([
                'status' => true,
                'message' => 'Thanks for contacting us we will contact you soon',
                'user' => $contactUs
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
