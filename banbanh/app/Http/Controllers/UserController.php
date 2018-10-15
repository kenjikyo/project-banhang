<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::orderBy('id','asc')->get();
        return view('admin.user.list',['user'=>$user]);
    } 

    public function getThem()
    {
        return view('admin.user.add');
    }
    public function postThem(Request $req)
    {
        $this->validate($req,[
        'email' => 'min:3|unique:users,email',
        'phone' => 'min:3',
        'password'=>'min:3|confirmed'
        ]);
        $user = new User;
        $data=$req->all();
        
        $user->full_name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->is_admin = $data['is_admin'];
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm User thành công!');

    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function postSua(Request $req,$id)
    {
        $user = user::find($id);
        $check = Hash::check($req->password_old, $user->password);
        $this->validate($req,[
            'email' => 'min:6',
            'phone_number' => 'min:3',
            'password'=>'confirmed'
            ]);
        $data = $req->all();
        $user->full_name = $data['name'];
        $user->email = $data['email'];
        if($check)
        {
            $user->password = Hash::make($data['password']);
        }
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->is_admin = $data['is_admin'];
        $user->save();
        
        return redirect()->back()->with(['flag'=>'success','thongbao'=>'Sửa Thành Công!']);
        
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa User thành công!');
    }

    public function getDangnhap()
    {
        return view('admin.login');
    }
    public function postDangnhap(Request $req)
    {
        $this->validate($req,
        [
            'password'=>'required|min:6|max:20',
            'email'=>'required|email'
        ],
        [   
            'password.required'=>'Vui lòng nhập Password',
            'email.required'=>'Vui lòng nhập Email'
        ]);
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect('admin/products/danhsach');
        }else{
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công, vui lòng thử lại!');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
