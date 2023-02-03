<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Gt;
use App\Models\Room;    
use App\Http\Requests\ValidateRoom;
use Gate;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('pages.admin.rooms.create',[
            'areas' => $areas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRoom $request)
    {
        
        $form_data = [
            'max_numbers' => $request->max_numbers,
            'gender' => $request->gender,
            'room_number' => $request->room_number,
            'area_id' => $request->area,
            'current_numbers' => 0
            
        ];
        Room::create($form_data);
        return redirect()->route('manager_qlphong')->with('success', 'Thêm dữ liệu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('admin')) {
            return back();
        }
        $areas = Area::all();
        $room = Room::where('id', $id)->first();
        return view('pages.admin.rooms.edit')->with([
            'room' => $room,
            'areas' => $areas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateRoom $request, $id)
    {
        $form_data = [
            'max_numbers' => $request->max_numbers,
            'gender' => $request->gender,
            'room_number' => $request->room_number,
            'area_id' => $request->area
        ];
        Room::whereId($id)->update($form_data) ?  
        $request->session()->flash('success', 'Cập nhật thành công') : 
        $request->session()->flash('error', 'Cập nhật thất bại');
    return redirect()->route('manager_qlphong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
