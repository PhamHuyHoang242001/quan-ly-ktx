<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidatePassword;

class ChangePasswordController extends Controller
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
    public function index() {
        return view('auth.passwords.changepassword');
    }
    public function store(ValidatePassword $request)
        {
          //Check if the Current Password matches with what is in the database.
          if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng');
          }
          // Compare the Current Password and New Password using[strcmp function]
          if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'Mật khẩu phải trùng nhau');
          }
          // Save the New Password.
          $user = Auth::user();
          $user->password = bcrypt($request->get('new_password'));
          $user->save();
          return back()->with('message', 'Đổi mật khẩu thành công');
        }

}
?>
