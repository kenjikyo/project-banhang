<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Session;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all(); 
        $new_product = Product::where('new',1)->paginate(8);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sale_product'));
    }

    public function getLoaiSP($type){       
        $sp_type = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(6);
        $title = ProductType::where('id',$type)->first();
        return view('page.loaisanpham',compact('sp_type','sp_khac','title'));
    }

    public function getChiTietSP(Request $req){
        $new_product = Product::where('new',1)->paginate(4);
        $sp = Product::where('id',$req->id)->first();
        $sp_same = Product::where('id_type',$sp->id_type)->paginate(3);
        return view('page.chitietsp',compact('sp','sp_same','new_product'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    public function addtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function delItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{Session::forget('cart');} 
        return redirect()->back();
    }

    public function getCheckout(Request $req){
        $sp = Product::all();
        return view('page.dathang',compact('sp'));
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->adress;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price'] / $value['qty'];
        $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công!');
    }

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getSignup(Request $req){
        return view('page.dangky');
    }

    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'fullname' => 'required',
                'password' => 'required|min:6|max:20',
                'password_confirm' => 'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập Email!',
                'email.unique'=>'Email đã có người sử dụng,vui lòng chọn email khác!',
                'password.required'=>'Vui lòng nhập Mật Khẩu!',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu có tối đa 20 ký tự',
                'password_confirm.same'=>'Mật khẩu không giống nhau'
            ]);
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->adress;
        $user->save();
        return redirect()->back()->with('dangkythanhcong','Đã tạo tài khoản thành công!');

    }

    public function postLogin(Request $req){
        $this->validate($req,
        [
            'password'=>'required|min:6|max:20',
            'email'=>'required|email'
        ],
        [   
            'password.required'=>'Vui lòng nhập Password',
            'email.required'=>'Vui lòng nhập Email'
        ]);
        
        
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password]))
        {
            return redirect()->back()->with(['flag'=>'success','thongbao'=>'Đăng Nhập Thành Công!']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Đăng Nhập Không Thành Công!']);
        }
    }

    public function postLogout(Request $req){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->search.'%')
                            ->orWhere('unit_price',$req->search)->get();
        return view('page.timkiem',compact('product'));
    }
}

