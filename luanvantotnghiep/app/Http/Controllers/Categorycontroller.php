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
   public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function index(){
        return view('admin_login');
    }
    public function add_Category(){
        $this->AuthLogin();
        $design_id=DB::table('thiet_ke')
        ->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')
        ->orderby('ma_cl','desc')->get();
        return view('admin.Category.Category_add')
        ->with('material_id',$material_id)
        ->with('design_id',$design_id);
    }
    public function all_Category(){
         $this->AuthLogin();
        $all_Category=DB::table('danh_muc_sp')->paginate(5);
        $design_id=DB::table('thiet_ke')->get();
        $material_id=DB::table('chat_lieu')->get();
        $manager_Category=view('admin.Category.Category_all')
        ->with('all_Category',$all_Category)
        ->with('design_id',$design_id)
        ->with('material_id',$material_id);
        return view('admin_layout')->with('admin.Category_all',$manager_Category);
    }
    
    public function save_Category(Request $request){
        $request->validate([
            'category_key'=>'required',
            'design_key'=>'required',
            'material_key'=>'required',
            'category_status'=>'required'
        ],[
            'category_key.required'=>'***Chưa Chọn Danh Mục***',
            'design_key.required'=>'***Chưa Chọn Thiết kế***',
            'material_key.required'=>'***Chưa Chọn Chất Liệu***'
        ]);
        $result=($request->category_key).'M'.($request->material_key).'D'.($request->design_key);
        $category_pro=DB::table('danh_muc_sp')->get();
        foreach ($category_pro as $key => $value_pro) {
            if ($result==$value_pro->ma_dm) {
               Session::put('message','Không thành công');
               return Redirect::to('/add-Category'); 
            }else{
                $data=array();
                $data['ma_dm']=$result;
                $data['danh_muc']=$request->category_key;
                $data['ma_cl']=$request->material_key;
                $data['ma_tk']=$request->design_key;   
                $data['trang_thai']=$request->category_status;
                DB::table('danh_muc_sp')->insert($data);
                Session::put('message','Thêm thành công');
                return Redirect::to('/add-Category');
            }
        }
        
          
    }

    //trang thái
    public function unactive_category($ma_dm){
         $this->AuthLogin();
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update(['trang_thai'=>0]);
        return Redirect::to('/all-Category');
    }
    public function active_category($ma_dm){
         $this->AuthLogin();
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update(['trang_thai'=>1]);
        return Redirect::to('/all-Category');
    }

    public function edit_Category($ma_dm){
         $this->AuthLogin();
        $edit_Category=DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->get();
        $design_id=DB::table('thiet_ke')->get();
        $material_id=DB::table('chat_lieu')->get();
        $manager_Category=view('admin.Category.Category_edit')->with('edit_Category',$edit_Category)->with('design_id',$design_id)->with('material_id',$material_id);
        return view('admin_layout')->with('admin.Category_edit',$manager_Category);
    }
    public function update_Category(Request $request,$ma_dm){
        $data=array();
        $result1=($request->category_name).'M'.($request->material_key).'D'.($request->design_key);
        $data['ma_dm']=$result1;
        $data['danh_muc']=$request->category_name;
        $data['ma_cl']=$request->material_key;
        $data['ma_tk']=$request->design_key;
        DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->update($data);
        return Redirect::to('/all-Category');
    }

    public function delete_Category($ma_dm){
         DB::table('san_pham')->where('ma_dm',$ma_dm)->delete();
         DB::table('danh_muc_sp')->where('ma_dm',$ma_dm)->delete();
         return Redirect::to('/all-Category');
     }

        


    //add thiết kế
    public function add_design(){
         $this->AuthLogin();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        return view('admin.Category_add')
        ->with('material_id',$material_id)
        ->with('design_id',$design_id);
    }
    public function save_design(Request $request){
        $data=array();
        $all_design=DB::table('thiet_ke')->orderby('ten_tk','desc')->get();
        $data['ten_tk']=$request->design_name;
        DB::table('thiet_ke')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('/add-design');     
    }
    //add chất liệu
    public function add_material(){
         $this->AuthLogin();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        return view('admin.Category_add')
        ->with('material_id',$material_id)
            ->with('design_id',$design_id);
    }
    public function save_material(Request $request){
        $data=array();
        $all_design=DB::table('chat_lieu')->orderby('ten_cl','desc')->get();
        $data['ten_cl']=$request->material_name;
        DB::table('chat_lieu')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('/add-material');     
    }



    

}