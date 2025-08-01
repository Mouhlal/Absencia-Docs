<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    // Lister les notifications de l'utilisateur connecté
    public function index()
    {
        $notifications = Notifications::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json($notifications);
    }
}
