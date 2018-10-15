<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $product = Product::orderBy('id','desc')->get();
        return view('admin.products.list',['product'=>$product]);
    }

    public function getThem()
    {
        return view('admin.products.add');
    }
    public function postThem(Request $req)
    {
        $product = new Product;
        $this->validate($req,[
            'txtName'=>'required|min:3|max:100',
            'txtUnit'=>'required|numeric',
            'txtPromotion'=>'required|numeric',
        ],[
            'txtName.required'=>'Vui lòng nhập tên sản phẩm',
            'txtName.min'=>'Tên sản phẩm từ 3 đến 100 ký tự',
            'txtName.max'=>'Tên sản phẩm từ 3 đến 100 ký tự',
            'txtUnit.required'=>'Vui lòng nhập giá sản phẩm',
            'txtUnit.numberic'=>'Giá sản phẩm là số',
            'txtPromotion.numeric'=>'Vui lòng nhập tên sản phẩm'
        ]);
        $product->name =$req->txtName;
        $product->unit_price =$req->txtUnit;
        $product->promotion_price =$req->txtPromotion;
        $product->description =$req->txtDescription;
        $product->image =$req->fImage;
        $product->new =$req->txtNew;
        $product->id_type =$req->type_product;
        $product->save();

        return redirect('admin/products/them')->with('thongbao','Thêm Sản Phẩm Thành Công!');
        
    }

    public function getSua($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit',['product'=>$product]);
    }
    public function postSua(Request $req,$id)
    {
        $product = Product::find($id);
        $this->validate($req,[
            'txtName'=>'required|min:3|max:100',
            'txtUnit'=>'required|numeric',
            'txtPromotion'=>'required|numeric',
        ],[
            'txtName.required'=>'Vui lòng nhập tên sản phẩm',
            'txtName.min'=>'Tên sản phẩm từ 3 đến 100 ký tự',
            'txtName.max'=>'Tên sản phẩm từ 3 đến 100 ký tự',
            'txtUnit.required'=>'Vui lòng nhập giá sản phẩm',
            'txtUnit.numberic'=>'Giá sản phẩm là số',
            'txtPromotion.numeric'=>'Vui lòng nhập tên sản phẩm'
        ]);
        $product->name =$req->txtName;
        $product->unit_price =$req->txtUnit;
        $product->promotion_price =$req->txtPromotion;
        $product->description =$req->txtDescription;
        $product->image =$req->fImage;
        $product->new =$req->txtNew;
        $product->id_type =$req->type_product;
        $product->save();

        return redirect('admin/products/sua/'.$id)->with('thongbao','Sửa Sản Phẩm Thành Công!');
    }

    public function getXoa($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products/danhsach')->with('thongbao','Đã xóa thành công!');
    }

    // public function getColumnSearch()
    // {
    //     return view('admin.products.danhsach');
    // }

    // public function getDataSearch(Request $req)
    // {
    //     $product = Product::select([
    //         DB::raw("CONCAT(products.id.'-'.products.id) as product_id"),
    //         'name',
    //         'description',
    //         'unit_price',
    //         'promotion_price',
    //         'image',
    //         'new',
    //         'id_type'
    //     ]);
    //     return Datatable::of($product)
    //         ->filterColumn('product_id', function($query,$keyword){
    //             $query = whereRaw("CONCAT(products.id.'-'.products.id) like ?" ["%{$keyword}%"]);
    //         })
    //         ->make(true);
    // }
}
