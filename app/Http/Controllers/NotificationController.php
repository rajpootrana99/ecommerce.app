<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $notifictions = Notification::all();
        return response([
            'status' => true,
            'data' => $notifictions,
        ]);
    }
}
