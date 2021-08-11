<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\binh_luan;
use App\Models\Product;
use App\Models\Rating;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Productcontroller extends Controller
{
    public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function add_product(){
        $this->AuthLogin();
        if (isset($_GET['keywords_search'])) {
            $keywords=$_GET['keywords_search'];
            $cate_product=DB::table('danh_muc_sp')
            ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
            ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
            ->orwhere('danh_muc','like','%'. $keywords .'%')
            ->orwhere('ten_tk','like','%'. $keywords .'%')
            ->orwhere('ten_cl','like','%'. $keywords .'%')
            ->get();
        }else{

        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
        ->get();
        }
        $product_id=DB::table('san_pham')->orderby('ma_sp','desc')->get();
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        return view('admin.Product.product_add')
        ->with('cate_product',$cate_product)
        ->with('product_id',$product_id)
        ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id);
    }
    public function all_product(){
        $this->AuthLogin();
        if (isset($_GET['Danh_Muc'])) {
            $Danh_Muc=$_GET['Danh_Muc'];
            if ($Danh_Muc=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.ma_dm','DESC')
                ->paginate(10);    
            }elseif ($Danh_Muc=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.ma_dm','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['chiet_khau'])) {
            $chiet_khau=$_GET['chiet_khau'];
            if ($chiet_khau=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.chiet_khau','DESC')
                ->paginate(10);    
            }elseif ($chiet_khau=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.chiet_khau','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['so_luong'])) {
            $so_luong=$_GET['so_luong'];
            if ($so_luong=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('solg','DESC')
                ->paginate(10);    
            }elseif ($so_luong=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('solg','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Gia_Sale'])) {
            $Gia_Sale=$_GET['Gia_Sale'];
            if ($Gia_Sale=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.gia_sale','DESC')
                ->paginate(10);    
            }elseif ($Gia_Sale=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.gia_sale','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Gia_Goc'])) {
            $Gia_Goc=$_GET['Gia_Goc'];
            if ($Gia_Goc=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.gia_goc','DESC')
                ->paginate(10);    
            }elseif ($Gia_Goc=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.gia_goc','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Mo_Ta'])) {
            $Mo_Ta=$_GET['Mo_Ta'];
            if ($Mo_Ta=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.mo_ta','DESC')
                ->paginate(10);    
            }elseif ($Mo_Ta=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.mo_ta','ASC')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Hinh'])) {
            $Hinh=$_GET['Hinh'];
            if ($Hinh=="co") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->paginate(10);    
            }elseif ($Hinh=="khong") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin',null)
                ->groupBy('san_pham.ma_sp')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Sap_Xep_Ten'])) {
            $Sap_Xep_Ten=$_GET['Sap_Xep_Ten'];
            if ($Sap_Xep_Ten=="Z-A") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('ten_sp','ASC')
                ->paginate(10);    
            }elseif ($Sap_Xep_Ten=="A-Z") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('ten_sp','desc')
                ->paginate(10);
            }
        }
        elseif (isset($_GET['Sap_Xep_Ma'])) {
            $Sap_Xep_Ma=$_GET['Sap_Xep_Ma'];
            if ($Sap_Xep_Ma=="tang") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('ma_sp','ASC')
                ->paginate(10);    
            }elseif ($Sap_Xep_Ma=="giam") {
                $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->orderby('ma_sp','desc')
                ->paginate(10);
            }
        }
        elseif(isset($_GET['keywords_search'])){
            $keywords=$_GET['keywords_search'];
            $all_product=DB::table('san_pham')
            ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
            ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
            ->groupBy('san_pham.ma_sp')
            ->where('san_pham.ten_sp','like','%'. $keywords .'%')
            ->orwhere('san_pham.ma_sp',$keywords)
            ->orwhere('san_pham.ma_dm',$keywords)
            ->paginate(10);
        }
        else{
            $all_product=DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->selectRaw('san_pham.*,sum(chi_tiet_san_pham.so_lg) as solg, hinh_anh.hinhanh,hinh_anh.goc_nhin')
                ->where('hinh_anh.goc_nhin','0')
                ->groupBy('san_pham.ma_sp')
                ->paginate(10);
        }
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        return view('admin.Product.product_all')
        ->with('all_product',$all_product)
        ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id);
        
        
    }
    public function save_product(Request $request){
        $validator=$request->validate([
            'category_product_id'=>'required',
            'product_name'=>'required',
            'product_desc'=>'required',
            'corner_price'=>'required|numeric',
            'sale_pricee'=>'required|numeric',
            'discount'=>'required|numeric',
          
        ],[
            'category_product_id.required'=>'***Chưa Chọn Danh Mục***',
            'product_name.required'=>'***Nhập Tên Sản Phẩm***',
            'product_desc.required'=>'***Nhập Mô Tả Sản Phẩm***',

            'corner_price.required'=>'***Nhập Giá Góc Sản Phẩm***',
            'corner_price.numeric'=>'***Nhập Giá Góc Là Số***',
    

            'sale_pricee.required'=>'***Nhập Giá Bán Sản Phẩm***',
            'sale_pricee.numeric'=>'***Nhập Giá Bán Là Số***',

            'discount.required'=>'***Nhập Chiêt Khấu Sản Phẩm***',
            'discount.numeric'=>'***Nhập Chiêt Khấu Sản Phẩm Là Số***',

           
        ]);
        $data=array();
        $result=($request->category_product_id).'S'.rand(0,99);
        $product_id=DB::table('san_pham')->get();
        foreach ($product_id as $key => $val_pro) {
            if ($result==$val_pro->ma_sp) {
                Session::put('message','Lỗi Vui Lòng Thêm Lại');
                return Redirect::to('/add-product');
            }
        }
        $data['ma_sp']=$result;
        $data['ten_sp']=$request->product_name;
        $data['mo_ta']=$request->product_desc;
        $data['gia_goc']=$request->corner_price;
        $data['gia_sale']=$request->sale_pricee;
        $data['trang_thai']=1;
        $data['chiet_khau']=$request->discount;
        $data['ma_dm']=$request->category_product_id;
        DB::table('san_pham')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        Session::put('product_name',$request->product_name);
        return Redirect::to('/add-product');
    }
    public function edit_product($ma_sp){
        $this->AuthLogin();
        $edit_product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->get();
        $design_id=DB::table('thiet_ke')->get();
        $material_id=DB::table('chat_lieu')->get();
        $cate_product_id=DB::table('danh_muc_sp')->get();
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
         return view('admin.Product.product_edit')
         ->with('edit_product_id',$edit_product_id)
         ->with('design_id',$design_id)
         ->with('material_id',$material_id)
         ->with('cate_product_id',$cate_product_id)
         ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id);
      
    }
    public function update_product(Request $request,$ma_sp){
         $validator=$request->validate([
            'category_product_id'=>'required',
            'product_name'=>'required',
            'product_desc'=>'required',
            'corner_price'=>'required|numeric',
            'sale_pricee'=>'required|numeric',
            'discount'=>'required|numeric',
            'amount_product'=>'required|numeric'
        ],[
            'category_product_id.required'=>'***Chưa Chọn Danh Mục***',
            'product_name.required'=>'***Nhập Tên Sản Phẩm***',
            'product_desc.required'=>'***Nhập Mô Tả Sản Phẩm***',

            'corner_price.required'=>'***Nhập Giá Góc Sản Phẩm***',
            'corner_price.numeric'=>'***Nhập Giá Góc Là Số***',

            'sale_pricee.required'=>'***Nhập Giá Bán Sản Phẩm***',
            'sale_pricee.numeric'=>'***Nhập Giá Bán Là Số***',

            'discount.required'=>'***Nhập Chiêt Khấu Sản Phẩm***',
            'discount.numeric'=>'***Nhập Chiêt Khấu Sản Phẩm Là Số***',

            'amount_product.required'=>'***Nhập Số Lượng Sản Phẩm***',
            'amount_product.numeric'=>'***Nhập Số Lượng Sản Phẩm Là Số***'
        ]);
        $data=array();
        $data['ten_sp']=$request->product_name;
        $data['solg_sp']=$request->amount_product;
        $data['gia_goc']=$request->corner_price;
        $data['gia_sale']=$request->sale_pricee;
        if($request->amount_product>0){
            $data['trang_thai']=1;
        }else{
            $data['trang_thai']=0;
            
        }
        $data['chiet_khau']=$request->discount;
        
        DB::table('san_pham')->where('ma_sp',$ma_sp)->update($data);
        return Redirect::to('/all-product');
    }





    //images_product
    public function add_images_product($ma_sp){
        $this->AuthLogin();
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->orderby('ma_sp','desc')->get();
        $img_id=DB::table('hinh_anh')->where('ma_sp',$ma_sp)->orderby('goc_nhin','ASC')->paginate(4);
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        return view('admin.Product.add_img')
        ->with('product_id',$product_id)
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('material_id',$material_id)
        ->with('img_id',$img_id)
        ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id)
        ;
    }
    public function save_images_product(Request $request){

         $validator=$request->validate([
            'images_view'=>'required',
            'product_images_id'=>'required',
            'images_pro'=>'required',
            
        ],[
            'images_view.required'=>'***Chưa Chọn Góc Nhìn***',
            'product_images_id.required'=>'***Chưa chọn Sản Phẩm***',
            'images_pro.required'=>'***Chưa Chọn Hình Sản Phẩm***',
        ]);
        $result=$_SERVER['HTTP_REFERER'];
        $all_img=DB::table('hinh_anh')->get();
        foreach ($all_img as $key => $value) {
            if ($value->ma_sp==$request->product_images_id) {
                if (($value->goc_nhin==0)&&($request->images_view==0)) {
                    Session::put('message_img','Thêm hinh ảnh không thành công');
                    return Redirect::to($result);
                }
            }
        }
        $data=array();
        $data['ma_sp']=$request->product_images_id;
        $data['goc_nhin']=$request->images_view;
        $get_images=$request->file('images_pro');
        $get_images_name=$get_images->getClientOriginalName();
        $name_imgages=current(explode('.',$get_images_name));
        $new_images=$name_imgages.'-'.rand(0,999).'.'.$get_images->getClientOriginalExtension();
        $get_images->move('public/uploads/product',$new_images);
        $data['hinhanh'] = $new_images;
        print_r($data); 
        DB::table('hinh_anh')->insert($data);
        Session::put('message_img','Thêm hinh ảnh sản phẩm thành công');
        return Redirect::to($result);

        
        
    }


    //frontend
    //show sản phẩm
    public function show_product(){
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')
          ->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id,che_do')
        ->get();
        $min_price = DB::table('san_pham')->min('san_pham.gia_goc');
        $max_price = DB::table('san_pham')->max('san_pham.gia_goc');

        $min_price_range = $min_price + 5000;
        $max_price_range = $max_price + 100000;
        //tìm kiếm thiết kế trên menu
        if (isset($_GET['ma_tk_search'])) {
            $ma_tk_search=$_GET['ma_tk_search'];
            $all_product=DB::table('san_pham')
          ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
          ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
          ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
          ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
          ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
          ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
          ->where('thiet_ke.ma_tk',$ma_tk_search)
          ->groupBy('san_pham.ma_sp')
          ->paginate(10);

        }
        //tìm kiếm bằng từ khóa
        elseif (isset($_GET['keywords_submit'])) {
           $keywords=$_GET['keywords_submit'];
           $all_product=DB::table('san_pham')
          ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
          ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
          ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
          ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
          ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
          ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
          ->orwhere('danh_muc_sp.danh_muc','like','%'. $keywords .'%')
          ->orwhere('san_pham.ten_sp','like','%'. $keywords .'%')
          ->orwhere('thiet_ke.ten_tk','like','%'. $keywords .'%')
          ->orwhere('chat_lieu.ten_cl','like','%'. $keywords .'%')
          ->groupBy('san_pham.ma_sp')
          ->paginate(10);
        }
        //tìm kiếm lọc sản phẩm ở shop
        elseif(isset($_GET['checkbox_des'])||isset($_GET['checkbox_col'])||isset($_GET['checkbox_mat'])){
            if(isset($_GET['checkbox_des'])){
                $checkbox_des=$_GET['checkbox_des'];
            }else{
                $checkbox_des="";
            }
            if(isset($_GET['checkbox_col'])){
                $checkbox_col=$_GET['checkbox_col'];
            }else{
                $checkbox_col="";
            }
            if(isset($_GET['checkbox_mat'])){
                $checkbox_mat=$_GET['checkbox_mat'];
            }else{
                $checkbox_mat="";
            }
            $all_product = DB::table('san_pham')
            ->join('danh_muc_sp','danh_muc_sp.ma_dm','san_pham.ma_dm')
            ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
            ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
            ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
            ->orwhere('danh_muc_sp.ma_tk',$checkbox_des)
            ->orwhere('chi_tiet_san_pham.ma_mau',$checkbox_col)
            ->orwhere('danh_muc_sp.ma_cl',$checkbox_mat)
            ->groupBy('san_pham.ma_sp')->paginate(12);
        }
        //Lọc sản phẩm theo giá
        elseif (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $all_product = DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
                ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->orderby('san_pham.gia_goc','desc')
                ->groupBy('san_pham.ma_sp')->paginate(12);

            }elseif($sort_by=='tang_dan'){
                 $all_product = DB::table('san_pham')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
                ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.gia_goc','ASC')
                ->paginate(12);
            }elseif($sort_by=='kytu_za'){
                $all_product = DB::table('san_pham')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
                ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.ten_sp','desc')
                ->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $all_product = DB::table('san_pham')
                ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
                ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
                ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
                ->groupBy('san_pham.ma_sp')
                ->orderby('san_pham.ten_sp','ASC')
                ->paginate(12);
            }
   
        }
        //Lọc sản phẩm bằng giá
        elseif(isset($_GET['start_price']) && $_GET['end_price']){

            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            
            $all_product = DB::table('san_pham')
            ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
            ->whereBetween('san_pham.gia_sale',[$min_price,$max_price])
            ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
            ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
            ->orderby('san_pham.gia_sale','desc')
            ->where ('san_pham.trang_thai','1')
            ->where('hinh_anh.goc_nhin','0')
            ->groupBy('san_pham.ma_sp')
            ->paginate(12);
        }else{
            $all_product=DB::table('san_pham')
            ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
            ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
            ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
            ->where ('san_pham.trang_thai','1')
            ->where('hinh_anh.goc_nhin','0')
            ->orderby('san_pham.ma_sp','desc')
            ->groupBy('san_pham.ma_sp')
            ->paginate(12);

        }


        $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();
        $rating_id= DB::table('danh_gia')->get();
        return view('pages.Shop.shop')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('all_material',$all_material)
        ->with('design_id',$design_id)
        ->with('all_style',$all_style)
        ->with('all_color',$all_color)
        ->with('min_price',$min_price)
        ->with('max_price',$max_price)
        ->with('rating_id',$rating_id)
        ->with('min_price_range',$min_price_range)
        ->with('max_price_range',$max_price_range)
        ->with('message_id',$message_id);
    }

     // show chi tiết sản phẩm
    public function product_details($ma_sp){
        $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();
        $all_img=DB::table('hinh_anh')->get();
        $all_detail_color=DB::table('chi_tiet_san_pham')->where('ma_sp',$ma_sp)->groupBy('ma_mau')->get();
        $all_detail_size=DB::table('chi_tiet_san_pham')->where('ma_sp',$ma_sp)->groupBy('ma_size')->get();
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        $details_product = DB::table('san_pham')
        ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('san_pham.trang_thai','1')->where('san_pham.ma_sp',$ma_sp)->get();
        $all_product=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where ('trang_thai','1')->orderby('san_pham.ma_sp','desc')->get();

        //sản phẩm liên quan
        foreach($details_product as $key => $value){
            $ma_dm = $value->ma_dm;
            $ma_sp=$value->ma_sp;
        }
        $related_product = DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
       ->where('danh_muc_sp.ma_dm',$ma_dm)->whereNotIn('san_pham.ma_sp',[$ma_sp])->get();

        //đáng giá sản phẩm khi đã nhận hàng
        $user_raiting=DB::table('don_dat_hang')
        ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
        ->join('chi_tiet_don_hang','chi_tiet_don_hang.ma_ddh','=','don_dat_hang.ma_ddh')
        ->select('chi_tiet_don_hang.ma_sp','khach_hang.email')
        ->where('chi_tiet_don_hang.ma_sp',$ma_sp)
        ->where('chi_tiet_don_hang.trang_thai','3')
        ->get();
        $rating_id=DB::table('danh_gia')->get();
        $rating = DB::table('danh_gia')->where('ma_sp',$ma_sp)->avg('rating');
        $rating = round($rating);
        
        //thông báo
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();

        //bảng đánh giá sao
        $rating5=DB::table('danh_gia')->where('rating','5')->where('ma_sp',$ma_sp)->count();
        $rating4=DB::table('danh_gia')->where('rating','4')->where('ma_sp',$ma_sp)->count();
        $rating3=DB::table('danh_gia')->where('rating','3')->where('ma_sp',$ma_sp)->count();
        $rating2=DB::table('danh_gia')->where('rating','2')->where('ma_sp',$ma_sp)->count();
        $rating1=DB::table('danh_gia')->where('rating','1')->where('ma_sp',$ma_sp)->count();
        $ratingsum=DB::table('danh_gia')->where('ma_sp',$ma_sp)->count();

        return view('pages.Shop.single')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('all_detail_color',$all_detail_color)
        ->with('all_detail_size',$all_detail_size)
        ->with('all_material',$all_material)
        ->with('design_id',$design_id)
        ->with('all_style',$all_style)
        ->with('all_color',$all_color)
        ->with('all_img',$all_img)
        ->with('rating',$rating)
        ->with('rating_id',$rating_id)
        ->with('user_raiting',$user_raiting)
        ->with('related_product',$related_product)
        ->with('details_product',$details_product)
        ->with('message_id',$message_id)
        ->with('rating5',$rating5)
        ->with('rating4',$rating4)
        ->with('rating3',$rating3)
        ->with('rating2',$rating2)
        ->with('rating1',$rating1)
        ->with('ratingsum',$ratingsum);


    }
    //hien thị số lượng
    public function solg_sanpham(Request $request){
        $mau=$request->radiocolor;
        $size=$request->radiosize;
        $key=$request->key;
        $solg_sp=DB::table('chi_tiet_san_pham')
        ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
        ->where('chi_tiet_san_pham.ma_size',$size)
        ->where('mau.ten_mau',$mau)
        ->where('chi_tiet_san_pham.ma_sp',$key)
        ->get();
        $output='thiếu size hoặc màu';
        foreach ($solg_sp as $key => $value) {
            if ($value->so_lg>0) {
                $output='<ladel>Hàng Còn : '.$value->so_lg.'</ladel>';
            }else{
                $output='tạm hết hàng';
            }
        }
        echo($output);
    }
    //bình luận
    public function load_comment(Request $request){
        $ma_sp=$request->ma_sp;
        // $comment=DB::table('binh_luan')->
        $comment=binh_luan::where('comment_product_id',$ma_sp)->where('comment_parent_comment','=',0)->where('comment_status',0)->orderBy('comment_date','desc')->get();
          $comment_rep = binh_luan::with('san_pham')->where('comment_parent_comment','>',0)->orderBy('comment_id','DESC')->get();
        $output='';
        foreach ($comment as $key => $com) {
            $output .='
                    <div class="comment-user">
                    <ul>
                        <div class="col_1_of_3 ">
                            <img width="50px" src="'.url('/public/frontend/images/bl.png').'" class="img">
                        </div>
                        <div class="span_1_of_1">
                            <li><span style="color:red">@'.$com->comment_name.'</span>
                            <p style="color:#000;">'.$com->comment_date.'</p>
                            <p>'.$com->comment.' </p></li>
                        </div>
                    
                    </ul>
            </div> <p></p>';
            foreach ($comment_rep as $key => $rep_com) {
                if ($rep_com->comment_parent_comment==$com->comment_id) {
            $output .='
            <div class="comment-admin">
                <ul>
                        
                        <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value_det->ma_sp}}">
                        <div class="col_1_of_3 ">
                            <img width="50px" src="'.url('/public/frontend/images/ad.jpg').'" class="img">
                        </div>
                        <div class="span_1_of_1">
                            <li><span style="color:red">@StoreTienLenNao</span>
                             <p style="color:#000;">'.$rep_com->comment_date.'</p>
                            <p>'.$rep_com->comment.'</p></li>
                        </div>
                    
                    </ul>
            </div>';
        }
         }
        }   
        echo($output);
       
    }
    public function list_comment(){
       $comment = binh_luan::with('san_pham')
       ->where('comment_parent_comment','=',0)
       ->orderBy('comment_date','desc')
       ->paginate(10);
       $comment_rep = binh_luan::with('san_pham')->where('comment_parent_comment','>',0)->get();
       $all_product=DB::table('san_pham')
        ->where ('trang_thai','1')->get();
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        return view('admin.Comment.list_comment')->with(compact('comment','comment_rep'))
        ->with('all_product',$all_product)
        ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id);
    }
     public function allow_comment(Request $request){
        $data = $request->all();
        $comment = binh_luan::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new binh_luan();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'tienlennaoStore';
        $comment->save();

    }
    public function send_comment(Request $request){

        $ma_sp = $request->ma_sp;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new binh_luan();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $ma_sp;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->save();
    }
   
   public function delete_comment($comment_id){
        
        DB::table('binh_luan')->where('comment_id',$comment_id)->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect::to('comment');
    }
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->ma_sp = $data['ma_sp'];
        $rating->rating = $data['index'];
        $rating->user_id =$data['user_id'];
        $rating->save();
        echo 'done';
    }
    
}

