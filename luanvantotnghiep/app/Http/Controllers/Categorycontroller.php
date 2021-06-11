<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Categorycontroller extends Controller
{
    public function add_Category(){
        $material_id=DB::table('chat_lieu')->orderby('ten_cl','desc')->get();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        return view('admin.Category_add')->with('material_id',$material_id)
            ->with('design_id',$design_id);
    }
    public function all_Category(){
        $all_Category=DB::table('danh_muc_sp')->get();
        $manager_Category=view('admin.Category_all')->with('all_Category',$all_Category);
        return view('admin_layout')->with('admin.Category_all',$manager_Category);
    }
    public function save_Category(Request $request){
        $data=array();
        $data['ma_dm']=$request->category_key;
        $data['danh_muc']=$request->category_name;
        $data['ma_cl']=$request->material_key;
        $data['ma_tk']=$request->design_key;
        $data['mo_ta']=$request->category_desic;
        $data['trang_thai']=$request->category_status;
        DB::table('danh_muc_sp')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('/add-Category');
    }
    //trang thái
    public function unactive_category($ma_dm){
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update(['trang_thai'=>1]);
        return Redirect::to('/all-Category');
    }
    public function active_category($ma_dm){
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update(['trang_thai'=>0]);
        return Redirect::to('/all-Category');
    }

    public function edit_Category($ma_dm){
        $edit_Category=DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->get();
        $manager_Category=view('admin.Category_edit')->with('edit_Category',$edit_Category);
        return view('admin_layout')->with('admin.Category_edit',$manager_Category);
    }
    public function update_Category(Request $request,$ma_dm){
        $data=array();
        $data['danh_muc']=$request->category_name;
        $data['ma_cl']=$request->material_key;
        $data['ma_tk']=$request->design_key;
        $data['mo_ta']=$request->category_desic;
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update($data);
        return Redirect::to('/all-Category');
    }

    public function delete_Category($ma_dm){
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->delete();
        return Redirect::to('/all-Category');
    }
}
