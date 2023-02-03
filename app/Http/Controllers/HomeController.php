<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomRegistration;
use App\User;
use Illuminate\Support\Facades\DB;


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
    public function index(Request $request)
    { 
        $room_register = RoomRegistration::get();
        $room_register = DB::table('room_registrations')
            ->join('rooms', 'room_registrations.room_id', '=', 'rooms.id')
            ->join('areas', 'rooms.area_id', '=', 'areas.id')
            ->select('room_registrations.*', 'rooms.room_number', 'areas.area_name')
            ->get();
        return view('dashboard', compact('room_register'));
    }
}
