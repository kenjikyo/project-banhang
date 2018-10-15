<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class BillsController extends Controller
{
    public function getDanhSach()
    {
        $bill = Bill::orderBy('id','asc')->get();
        return view('admin.bills.list',['bill'=>$bill]);
    } 

    public function getSua($id)
    {
        $bill = Bill::find($id);
        return view('admin.bills.edit',['bill'=>$bill]);
    }

    public function postSua(Request $req,$id)
    {
        $this->validate($req,[
            'txtName'=>'required',
            'numTotal'=>'numeric'
        ],[
            'txtName.required'=>'Vui lòng nhập tên khách hàng!',
            'numTotal.numberic'=>'Tổng tiền vui lòng nhập là số!'
        ]);

        $bill = Bill::find($id);
        $bill->date_order = $req->date;
        $bill->total = $req->numTotal;
        $bill->note = $req->note;
        $bill->payment = $req->payment;
        $bill->save();

        $bill->customer()->update(['name' => $req->txtName]);
        

        return redirect('admin/bills/danhsach')->with('thongbao','Sửa hóa đơn thành công!');
    }
}
