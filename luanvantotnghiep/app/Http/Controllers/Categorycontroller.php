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
        if (isset($_GET['tim_chat_lieu'])||isset($_GET['tim_thiet_ke']))
        {
            if (isset($_GET['tim_thiet_ke'])) {
                $tim_thiet_ke=$_GET['tim_thiet_ke'];
                $design_id=DB::table('thiet_ke')
                ->orwhere('ten_tk','like','%'. $tim_thiet_ke .'%')
                ->orderby('ma_tk','desc')->get();
                $material_id=DB::table('chat_lieu')
                ->orderby('ma_cl','desc')->get();
            }
            if (isset($_GET['tim_chat_lieu'])) {
                $tim_chat_lieu=$_GET['tim_chat_lieu'];
                $design_id=DB::table('thiet_ke')
                ->get();
                $material_id=DB::table('chat_lieu')
                ->orwhere('ten_cl','like','%'. $tim_chat_lieu .'%')
                ->get();
            }
            if (isset($_GET['tim_chat_lieu'])&&isset($_GET['tim_thiet_ke'])) {
                $tim_chat_lieu=$_GET['tim_chat_lieu'];
                $tim_thiet_ke=$_GET['tim_thiet_ke'];
                $material_id=DB::table('chat_lieu')
                ->where('ten_cl','like','%'. $tim_chat_lieu .'%')
                ->get();
                $design_id=DB::table('thiet_ke')
                ->where('ten_tk','like','%'. $tim_thiet_ke .'%')
                ->get();
            }
        }
        else{
            $design_id=DB::table('thiet_ke')
            ->orderby('ma_tk','desc')->get();
            $material_id=DB::table('chat_lieu')
            ->orderby('ma_cl','desc')->get();
        }
       
        return view('admin.Category.Category_add')
        ->with('material_id',$material_id)
        ->with('design_id',$design_id);
    }
    public function all_Category(){
         $this->AuthLogin();
         if (isset($_GET['keywords_submit'])) {
            $keywords=$_GET['keywords_submit'];
          $all_Category=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
        ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
        ->where('ma_dm','like','%'.$keywords.'%')
        ->orwhere('danh_muc','like','%'.$keywords.'%')
        ->orwhere('ten_cl','like','%'.$keywords.'%')
        ->orwhere('ten_tk','like','%'.$keywords.'%')
        ->paginate(10);
         }
        elseif (isset($_GET['Trang_thai'])) {
            $Trang_thai=$_GET['Trang_thai'];
            if ($Trang_thai==1) {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->where('danh_muc_sp.trang_thai','1')
                ->paginate(10);   
            }elseif ($Trang_thai==0) {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                 ->where('danh_muc_sp.trang_thai','0')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Chat_Lieu'])) {
            $Chat_Lieu=$_GET['Chat_Lieu'];
            if ($Chat_Lieu=="Z-A") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('chat_lieu.ten_cl','DESC')
                ->paginate(10);   
            }elseif ($Chat_Lieu=="A-Z") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('chat_lieu.ten_cl','ASC')
                ->paginate(10);
            }
        }
         elseif (isset($_GET['Thiet_Ke'])) {
            $Thiet_Ke=$_GET['Thiet_Ke'];
            if ($Thiet_Ke=="Z-A") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('thiet_ke.ten_tk','DESC')
                ->paginate(10);   
            }elseif ($Thiet_Ke=="A-Z") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('thiet_ke.ten_tk','ASC')
                ->paginate(10);
            }
        }
         elseif (isset($_GET['Sap_Xep_ten'])) {
            $Sap_Xep_ten=$_GET['Sap_Xep_ten'];
            if ($Sap_Xep_ten=="Z-A") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('danh_muc_sp.danh_muc','DESC')
                ->paginate(10);   
            }elseif ($Sap_Xep_ten=="A-Z") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('danh_muc_sp.danh_muc','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Sap_Xep_Ma'])) {
            $Sap_Xep_Ma=$_GET['Sap_Xep_Ma'];
            if ($Sap_Xep_Ma=="tang") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('danh_muc_sp.ma_dm','DESC')
                ->paginate(10);   
            }elseif ($Sap_Xep_Ma=="giam") {
                $all_Category=DB::table('danh_muc_sp')
                ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
                ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
                ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
                ->orderby('danh_muc_sp.ma_dm','ASC')
                ->paginate(10);
            }
        }else{
            $all_Category=DB::table('danh_muc_sp')
            ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
            ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
            ->select('danh_muc_sp.*','chat_lieu.ten_cl','thiet_ke.ten_tk')
            ->paginate(10); 
        }
        return view('admin.Category.Category_all')->with('all_Category',$all_Category);
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