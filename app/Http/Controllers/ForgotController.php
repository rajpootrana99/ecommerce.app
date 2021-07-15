<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    public function forgot(ForgotRequest $request){
        $email = $request->input('email');
        if(User::where('email', $email)->doesntExist()){
            return response([
                'status' => false,
                'message' => 'User doen\'t exists'
            ], 404);
        }
        $token = random_int(1000, 9999);

        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::send('Mails.forgot', ['token' => $token], function (Message $message) use ($email){
                $message->to($email);
                $message->subject('Reset your Password');
            });

            return response([
                'status' => true,
                'message' => 'Check your email'
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function reset(ResetRequest $request){
        /** @var User $user */
        $token = $request->input('token');
        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'status' => false,
                'message' => 'Invalid token!'
            ], 400);
        }

        if(!$user = User::where('email', $passwordResets->email)->first()){
            return response([
                'status' => false,
                'message' => 'User doesn\'t exist!'
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response([
            'status' => true,
            'message' => 'Success'
        ]);
    }

    public function checkToken(Request $request){
        $token = $request->input('token');
        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'status' => false,
                'message' => 'Invalid token!'
            ], 400);
        }

        return response([
            'status' => true,
            'message' => 'Success'
        ]);
    }
}
