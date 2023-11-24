<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function index()
    {
        // only showing unread notifications
        $notifications = auth()->user()->unreadNotifications;

        return view('notification', [
            'notifications' => $notifications,
        ]);
    }

    public function markAsRead($id)
    {
        auth()->user()->notifications->where('id', $id)->markAsRead();

        return redirect(route('notification.index'));
    }

    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect(route('notification.index'));
    }
}
