<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach(){
        $slide = Slide::orderBy('id','asc')->get();
        return view('admin.slide.list',compact('slide'));
    }

    public function getThem(){
        return view('admin.slide.add');
    }

    public function postThem(Request $req){

      $this->validate($req,
        [
            'image'=>'required',
        ],[
            'image.required'=>'chon hinh de thay doi',
            
        ]);

        $slide = new Slide;

        $slide->link = $req->link_image;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists($req->link_image.$image))
            {
                $image = str_random(4)."_". $name;
            }
            $file->move($req->link_image,$image);
            $slide->image = $image;
        }else{
            return redirect('admin/slide/them')->with('thongbao','Khong tim thay file image ');
        }

         $slide->save();
         return redirect('admin/slide/them')->with('thongbao','Thêm Thành Công!');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    public function postSua(Request $req,$id)
    {
        $this->validate($req,
        [
            'image'=>'required'
        ],[
            'image.required'=>'vui long them hinh anh'
            
        ]);

        $slide = Slide::find($id);

        $slide->link = $req->link;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."-". $name;
            while(file_exists("source/image/slide/".$image))
            {
                $image = str_random(4)."-". $name;
            }
            $file->move('source/image/slide/',$image);
            $slide->image = $image;
        }else{
            return redirect('admin/slide/sua/'.$id)->with('thongbao','Khong tin thay file Image');
        }
         $slide->save();
         return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa Thành Công!');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
