<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Productcontroller extends Controller
{
    public function add_product(){
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        return view('admin.product_add')->with('cate_product',$cate_product)->with('product_id',$product_id)
        ->with('design_id',$design_id)->with('material_id',$material_id)
        ;
    }
    public function all_product(){
        
        $all_product=DB::table('san_pham')->get();
        $manager_product=view('admin.product_all')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.product_all',$manager_product);
    }
    public function save_product(Request $request){
        $data=array();
        $result=($request->category_product_id).'S'.rand(0,99);
        $data['ma_sp']=$result;
        $data['ten_sp']=$request->product_name;
        $data['solg_sp']=$request->amount_product;
        $data['gia_goc']=$request->corner_price;
        $data['gia_sale']=$request->sale_pricee;
        $data['trang_thai']=$request->product_status;
        $data['chiet_khau']=$request->discount;
        $data['ma_dm']=$request->category_product_id;
        DB::table('san_pham')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('/add-product');
    }
    public function edit_product($ma_sp){
        $edit_product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->get();
        $design_id=DB::table('thiet_ke')->get();
        $material_id=DB::table('chat_lieu')->get();
        $cate_product_id=DB::table('danh_muc_sp')->get();
        $manager_product=view('admin.product_edit')->with('edit_product_id',$edit_product_id)->with('design_id',$design_id)->with('material_id',$material_id)->with('cate_product_id',$cate_product_id);
        return view('admin_layout')->with('manager_product',$manager_product);
      
    }
    public function update_product(){
        
    }





    //images_product
    public function add_images_product(){
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get(); 
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        return view('admin.product_add')->with('product_id',$product_id)->with('cate_product',$cate_product);
    }

    public function all_images_product(){
        return view('admin.product_all');
    }
    public function save_images_product(Request $request){
        $data=array();
        $data['goc_nhin']=$request->images_view;
        $data['ma_sp']=$request->product_images_id;

        $get_images=$request->file('images_pro');

        if($get_images){
            $get_images_name=$get_images->getClientOriginalName();
            $name_imgages=current(explode('.',$get_images_name));
            $new_images=$name_imgages.'-'.rand(0,9999).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('public/uploads/product',$new_images);
            $data['hinhanh'] = $new_images; 
            DB::table('hinh_anh')->insert($data);
            Session::put('message','Thêm hinh ảnh sản phẩm thành công');
            return Redirect::to('/add-images-product');
        }
        else{
            Session::put('message','Thêm hình ảnh sản phẩm không thành công');
            return Redirect::to('/add-images-product');
        }
        
    }
    
}

