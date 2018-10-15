<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class ProductTypeController extends Controller
{
    public function getDanhSach(){
        $product_type = ProductType::orderBy('id','asc')->get();
        return view('admin.type_product.list',compact('product_type'));
    }

    public function getThem(){
        return view('admin.type_product.add');
    }

    public function postThem(Request $req){

      $this->validate($req,
        [
            'name'=>'required',
            'description'=>'required',
        ],[
            'name.required'=>'nhap ten loai san pham',
            'description.required'=>'vui long nhap mo ta',
            
        ]);

        $product_type = new ProductType;

        $product_type->name = $req->name;
        $product_type->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/product/".$image))
            {
                $image = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$image);
            $product_type->image = $image;
        }else{
            $image = "";
        }

         $product_type->save();
         return redirect('admin/type_product/them')->with('thongbao','Thêm Thành Công!');
    }

    public function getSua($id)
    {
        $product_type = ProductType::find($id);
        return view('admin.type_product.edit',compact('product_type'));
    }

    public function postSua(Request $req,$id)
    {
        $this->validate($req,
        [
            'name'=>'required',
            'description'=>'required',
        ],[
            'name.required'=>'vui long nhap ten loai san pham',
            'description.required'=>'vui long nhap mo ta',
            
        ]);

        $product_type = ProductType::find($id);

        $product_type->name = $req->name;
        $product_type->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."-". $name;
            while(file_exists("source/image/product/".$image))
            {
                $image = str_random(4)."-". $name;
            }
            unlink('source/image/product/'.$product_type->image);
            $file->move("source/image/product",$image);
            $product_type->image = $image;
        }else{
            echo "khong tim thay file image";
        }
         $product_type->save();
         return redirect('admin/type_product/sua/'.$id)->with('thongbao','Sửa Thành Công!');
    }

    public function getXoa($id)
    {
        $product_type = ProductType::find($id);
        $product_type->delete();
        return redirect('admin/type_product/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
