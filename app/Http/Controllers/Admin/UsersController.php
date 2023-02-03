<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use App\Models\RoomRegistration;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('admin')) {
            return back();
        }
        $profile = Profile::all();

        return view('pages.admin.index')->with([
            'profiles' => $profile
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ttsv = Profile::where('id', $id)->first();
        return view('users.profile.index', [
            'ttsv' => $ttsv
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('admin')) {
            return back();
        }
    
        $profile = Profile::where('id', $id)->first();
        return view('pages.admin.edit')->with([
            'profiles' => $profile,
            'vien' => $profile->value('vien'),
            'khoa' =>  $profile->value('khoa'),
            'gender' =>  $profile->value('gender')
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('admin')) {
            return back();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            unlink(public_path('uploads') . '/' . $image_name);
            $request->validate([
                'mssv'  =>  'required|numeric|min:8',
                'sdt' =>  'required|numeric|min:10',
                'quequan' =>  'required|string',
                'image' =>  'required|image|max:2048',
                'khoa' => 'required|string',
                'gender' => 'required|string',
                'vien' => 'required|string',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);
        }
        else
        {
            $request->validate([
                'mssv'  =>  'required|min:8',
                'sdt' =>  'required|min:10',
                'quequan' =>  'required|string',
                'khoa' => 'required|string',
                'gender' => 'required|string',
                'vien' => 'required|string',
            ]);
        }

        $form_data = [
            'mssv' => $request->mssv,
            'sdt' => $request->sdt,
            'khoa' => $request->khoa,
            'gender' => $request->gender,
            'vien' => $request->vien,
            'image' => $image_name,
            'quequan' => $request->quequan,
        ];
        Profile::whereId($id)->update($form_data) ?  
            $request->session()->flash('success', 'Cập nhật thành công') : 
            $request->session()->flash('error', 'Cập nhật thất bại');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Gate::denies('admin')) {
            return back();
        }
        $user = User::where('id', $id + 1)->first();
        $ttsv = Profile::where('id', $id)->first();
        $ttsv->delete();
        $user->roles()->detach();
        $user->delete() ?  
            $request->session()->flash('success',"Xóa thành công") : 
            $request->session()->flash('error', "Xóa thất bại");

        return redirect()->route('admin.users.index');
    }
}
