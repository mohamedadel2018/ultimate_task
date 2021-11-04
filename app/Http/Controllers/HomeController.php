<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //start Notification 
        foreach (Auth::user()->unreadNotifications as $notification) {
            $time = $notification->created_at;
            $dt = Carbon::create($time->year,  $time->month, $time->day , $time->hour, $time->minute);
            $dt->toDateTimeString();
            $dt->diffInMinutes();

            if($dt->diffInMinutes() >=  7200){
            $notification->markAsRead();
            }
        }
        $notifications =  Auth::user()->unreadNotifications;
    //End Notification 
        return view('layouts.Dashboard',compact($notifications));
    }
}
