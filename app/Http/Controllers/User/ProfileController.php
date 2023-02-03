<?php

namespace App\Http\Controllers\User;
use App\Models\Profile;
use App\Models\Vien;
use App\Models\Khoa;
use App\Models\Gt;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidateProfile;



class ProfileController extends Controller
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
        $ttsv = Profile::where('email', Auth::user()->email)->first();
        return view('users.profile.index', [
            'ttsv' => $ttsv,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viens[0]="Công nghệ thông tin";
        $viens[1]="Ngoại ngữ";
        $viens[2]="Cơ khí";
        $viens[3]="Điện";
        $viens[4]="Vật lý kĩ thuật";
        $khoas[0]="60";
        $khoas[1]="61";
        $khoas[2]="62";
        $khoas[3]="63";
        $khoas[4]="64";
        $khoas[5]="65";
        $khoas[6]="66";
        $khoas[7]="67";
        $khoas[8]="68";
        $genders[0]="Nam";
        $genders[1]="Nữ";
        return view('users.profile.create')->with([
            'viens' => $viens,
            'khoas' => $khoas,
            'genders' => $genders
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProfile $request)
    {
        $image = $request->file('image');
        if($image != NULL){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $new_name);
            $form_data = [
                'name'  => Auth::user()->name,
                'mssv' => $request->mssv,
                'sdt' => $request->sdt,
                'khoa' => $request->khoa,
                'gender' => $request->gender,
                'vien' => $request->vien,
                'image' => $new_name,
                'quequan' => $request->quequan,
                'email' => Auth::user()->email,
        ];
        }else {
            $image_name = 'default.png';
            $form_data = [
                'name'  => Auth::user()->name,
                'mssv' => $request->mssv,
                'sdt' => $request->sdt,
                'khoa' => $request->khoa,
                'gender' => $request->gender,
                'vien' => $request->vien,
                'image' => $image_name,
                'quequan' => $request->quequan,
                'email' => Auth::user()->email,
                
        ];
    }
        
        Profile::create($form_data);
        return redirect()->route('user.profile.index')->with('success', 'Thêm dữ liệu thành công');
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
    public function edit(Profile $profile)
    {
        $viens[0]="Công nghệ thông tin";
        $viens[1]="Ngoại ngữ";
        $viens[2]="Cơ khí";
        $viens[3]="Điện";
        $viens[4]="Vật lý kĩ thuật";
        $khoas[0]="60";
        $khoas[1]="61";
        $khoas[2]="62";
        $khoas[3]="63";
        $khoas[4]="64";
        $khoas[5]="65";
        $khoas[6]="66";
        $khoas[7]="67";
        $khoas[8]="68";
        $genders[0]="Nam";
        $genders[1]="Nữ";
        $profile = Profile::where('email', Auth::user()->email)->first();
        return view('users.profile.edit')->with([
            'profile' => $profile,
            'viens' => $viens,
            'khoas' => $khoas,
            'genders' => $genders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != NULL)
        {
            //unlink(public_path('uploads') . '/' . $image_name);
            $request->validate([
                'mssv'  =>  'required|numeric|min:8',
                'sdt' =>  'required|numeric|min:10',
                'quequan' =>  'required|string',
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
            $image_name = 'default.png';
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
        Profile::whereId($profile->id)->update($form_data) ?  
            $request->session()->flash('success', 'Cập nhật thành công') : 
            $request->session()->flash('error', 'Cập nhật thất bại');
        return redirect()->route('user.profile.index');
    }

}