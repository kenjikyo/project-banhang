<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function getDanhSach()
    {
        $customer = Customer::orderBy('id','asc')->get();
        return view('admin.customer.list',['customer'=>$customer]);
    } 

    public function getThem()
    {
        return view('admin.customer.add');
    }
    public function postThem(Request $req)
    {
        $this->validate($req,[
        'email' => 'min:3|unique:customer,email',
        'phone_number' => 'min:3'
        ]);
        $customer = new Customer;
        $data=$req->all();
        
        $customer->name = $data['name'];
        $customer->gender = $data['gender'];
        $customer->email = $data['email'];
        $customer->phone_number = $data['phone_number'];
        $customer->address = $data['address'];
        $customer->note = $data['note'];
        $customer->save();

        return redirect('admin/customer/them')->with('thongbao','Thêm khách hàng thành công!');

    }

    public function getSua($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit',['customer'=>$customer]);
    }

    public function postSua(Request $req,$id)
    {
        $this->validate($req,[
            'email' => 'min:3|unique:customer,email',
            'phone_number' => 'min:3'
            ]);
        $data = $req->all();
        $customer = Customer::find($id);
        $customer->name = $data['name'];
        $customer->gender = $data['gender'];
        $customer->email = $data['email'];
        $customer->phone_number = $data['phone_number'];
        $customer->address = $data['address'];
        $customer->note = $data['note'];
        $customer->save();

        return redirect('admin/customer/sua/'.$id)->with('thongbao','Sửa khách hàng thành công!');
    }

    public function getXoa($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('admin/customer/danhsach')->with('thongbao','Xóa khách hàng thành công!');
    }
}
