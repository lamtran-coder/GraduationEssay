<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\binh_luan;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Productcontroller extends Controller
{
    public function add_product(){
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $product_id=DB::table('san_pham')->orderby('ma_sp','desc')->get();
        return view('admin.product_add')->with('cate_product',$cate_product)->with('product_id',$product_id)
        ->with('design_id',$design_id)->with('material_id',$material_id)
        ;
    }
    public function all_product(){
        
        $all_product=DB::table('san_pham')->get();
        $img_id=DB::table('hinh_anh')->get();
        $manager_product=view('admin.product_all')->with('all_product',$all_product)->with('img_id',$img_id);
        return view('admin_layout')->with('admin.product_all',$manager_product);
        
    }
    public function save_product(Request $request){
        $data=array();
        $result=($request->category_product_id).'S'.rand(0,99);
        $data['ma_sp']=$result;
        $data['ten_sp']=$request->product_name;
        $data['mo_ta']=$request->product_desc;
        $data['solg_sp']=$request->amount_product;
        $data['gia_goc']=$request->corner_price;
        $data['gia_sale']=$request->sale_pricee;
        if($request->amount_product>0){
            $data['trang_thai']=1;
        }else{
            $data['trang_thai']=0;
            
        }
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
    public function update_product(Request $request,$ma_sp){
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
    // public function delete_product($ma_sp){
    //     DB::table('san_pham')->where('ma_sp',$ma_sp)->delete();
    //     DB::table('hinh_anh')->where('ma_sp',$ma_sp)->delete();
    //     return Redirect::to('/all-product');
    // }





    //images_product
    public function add_images_product(){
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        $design_id=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $material_id=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $product_id=DB::table('san_pham')->orderby('ma_sp','desc')->get();
        return view('admin.product_add')->with('product_id',$product_id)->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('material_id',$material_id)
        ;
    }
    public function save_images_product(Request $request){
        $data=array();
        $data['goc_nhin']=$request->images_view;
        $data['ma_sp']=$request->product_images_id;

        $get_images=$request->file('images_pro');

        if($get_images){
            $get_images_name=$get_images->getClientOriginalName();
            $name_imgages=current(explode('.',$get_images_name));
            $new_images=$name_imgages.'-'.rand(0,999).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('public/uploads/product',$new_images);
            $data['hinhanh'] = $new_images; 
            DB::table('hinh_anh')->insert($data);
            Session::put('messageimg','Thêm hinh ảnh sản phẩm thành công');
            return Redirect::to('/add-images-product');
        }
        else{
            Session::put('messageimg','Thêm hình ảnh sản phẩm không thành công');
            return Redirect::to('/add-images-product');
        }
        
    }


    //frontend
    //show sản phẩm
    public function show_product(){
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('danh_muc_sp.trang_thai','1')
        ->orderby(('danh_muc_sp.ma_dm'),'desc')->get();
        $all_product=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where ('trang_thai','1')->where('goc_nhin','0')->orderby('san_pham.ma_sp','desc')->get();


        $min_price = DB::table('san_pham')->min('san_pham.gia_goc');
        $max_price = DB::table('san_pham')->max('san_pham.gia_goc');

        $min_price_range = $min_price + 5000;
        $max_price_range = $max_price + 100000;

        if(isset($_GET['start_price']) && $_GET['end_price']){

        $min_price = $_GET['start_price'];
        $max_price = $_GET['end_price'];


        $all_product = DB::table('san_pham')
        ->whereBetween('san_pham.gia_goc',[$min_price,$max_price])
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')->orderby('san_pham.gia_goc','desc')->get();

         
        }else{
           $all_product=DB::table('san_pham')->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where ('trang_thai','1')->orderby('san_pham.ma_sp','desc')->get();

        }


        $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();
        return view('pages.shop')->with('cate_product',$cate_product)
        ->with('all_product',$all_product)->with('all_material',$all_material)
        ->with('all_style',$all_style)->with('all_color',$all_color)
        ->with('min_price',$min_price)
        ->with('max_price',$max_price)
        ->with('min_price_range',$min_price_range)
        ->with('max_price_range',$max_price_range);
    }
    public function show_category_home (Request $request,$ma_dm )
    {     $keywords=$request->keywords_submit;
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')->orderby('danh_muc_sp.ma_dm','desc')->get();
        $all_product=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where ('trang_thai','1')->orderby('san_pham.ma_sp','desc')->get();


        $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();
        $all_img=DB::table('hinh_anh')->orderby('ma_sp','desc')->get();
        $search_product=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where('ten_sp','like','%'. $keywords .'%')->get();
        $category_by_id=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->join('danh_muc_sp','san_pham.ma_dm','=','danh_muc_sp.ma_dm')->where('san_pham.ma_dm',$ma_dm)->get();

         return view('pages.search_cate')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('all_material',$all_material)
        ->with('all_style',$all_style)
        ->with('all_color',$all_color)
        ->with('all_img',$all_img)
         ->with('search_product',$search_product)
         ->with('category_by_id',$category_by_id);
    }
     // show chi tiết sản phẩm
    public function product_details($ma_sp){
        $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
        $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
        $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();
        $all_img=DB::table('hinh_anh')->get();
        $all_detail=DB::table('chi_tiet_san_pham')
        ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
        ->join('size','size.ma_size','=','chi_tiet_san_pham.ma_size')->get();
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')->orderby('danh_muc_sp.ma_dm','desc')->get();
        $details_product = DB::table('san_pham')
        ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('san_pham.trang_thai','1')->where('san_pham.ma_sp',$ma_sp)->get();
        $all_product=DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where ('trang_thai','1')->orderby('san_pham.ma_sp','desc')->limit(4)->get();

        foreach($details_product as $key => $value){
            $ma_dm = $value->ma_dm;
            $ma_sp=$value->ma_sp;
        }
        $related_product = DB::table('san_pham')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
       ->where('danh_muc_sp.ma_dm',$ma_dm)->whereNotIn('san_pham.ma_sp',[$ma_sp])->get();

        return view('pages.single')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('all_detail',$all_detail)
        ->with('all_material',$all_material)
        ->with('all_style',$all_style)
        ->with('all_color',$all_color)
        ->with('all_img',$all_img)
        ->with('related_product',$related_product)
        ->with('details_product',$details_product);


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
       $comment = binh_luan::with('san_pham')->where('comment_parent_comment','=',0)->orderBy('comment_status','DESC')->get();
        $comment_rep = binh_luan::with('san_pham')->where('comment_parent_comment','>',0)->get();
       $all_product=DB::table('san_pham')
        ->where ('trang_thai','1')->get();
        return view('admin.list_comment')->with(compact('comment','comment_rep'))
        ->with('all_product',$all_product);
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
    
}

