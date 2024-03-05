<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Crawls;
use App\Models\Keywords;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Lesson;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Album;
use App\Models\Review;
use App\Models\Photos;
use App\Models\Sub_category;
use Auth;
use App\Models\Faq;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Merchandise;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class ShopController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = Imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
        // $this->middleware('admin');
    }

    public function products_listing()
    {
        $products = Products::with('productBelongsToCategory')->get();
        return view('admin.products-management.list')->with('title','Photography Management')->with('products_menu',true)->with(compact('products'));
    }

    public function add_products()
    {
        $categories = Category::where('is_active',1)->get();
        return view('admin.products-management.add')->with('title','Add Photography')->with(compact('categories'))->with('products_menu',true);
    }

    public function create_products(Request $request)
    {
        // dd($request->all());
    

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'price' => 'required',
            'sale_price' => 'required',
            'sku' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'category' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png',
            'other_image' =>'required',
            'other_image.*' => 'image|mimes:jpeg,png,jpg'
        ]);      
        if ($validator->passes()) {  
            $products = Products::create([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'sale_price' =>  $request['sale_price'],
                'sku' =>  $request['sku'],
                'category_id' =>  $request['category'],
                'is_featured' =>  $request['is_featured'],
               
            ]);

            if(request()->hasFile('main_image')){
                $main_image = request()->file('main_image')->store('Uploads/products/main_image/'.$products->id.rand().rand(10,100), 'public');
                $image = ShopImage::create(
                    [
                    'cat_type' => 'products',
                    'img_path' => $main_image,
                    'ref_id' => $products->id,
                    'img_type' => 1
                    
                ]);
                }
                if(request()->hasFile('other_image')){
                $documents = $request->file('other_image');  
                foreach($documents as $index  => $p)
                {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();   
                    $image =   $request->file('other_image')[$index]->store('Uploads/products/other_image/'.rand().rand(10,1000), 'public');
                    // $inner_page_name = basename($request->file('image')[$index]->getClientOriginalName(), '.'.$request->file('image')[$index]->getClientOriginalExtension());
                    $other_image = ShopImage::create (
                    [
                        'cat_type' => 'products',
                        'img_path' => $image,
                        'ref_id' => $products->id,
                        'img_type' => 2
                    
                ]);
                }
                }

            //$users = User::get();
                return response()->json(['msg' => 'Photography Created Successfully!', 'status' => 1]);
            //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }

    
    }

    public function edit_products($slug)
    {
        $product = Products::where('slug',$slug)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])->first();
        // dd($product);
        $categories = Category::where('is_active',1)->get();
        return view('admin.products-management.edit')->with('title','Edit Photography')->with('products_menu',true)->with(compact('product','categories'));
    }

    public function saveproducts(Request $request)
    {
    //    dd($request->all());

       
         
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'category' => 'required',
          
        ]);      
        if ($validator->passes()) { 
            $check_slug = Products::where('slug',$request->slug)->where('id','!=',$request->id)->first();
            if($check_slug)
            {
                return response()->json(['error'=>'Unique Slug Is Required!','status' => 2]);
            } 
            $products = Products::where('id',$request->id)->update([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'sku' => $request['sku'],
                'sale_price' => $request['sale_price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'category_id' =>  $request['category'],
                'is_featured' =>  $request['is_featured'],
               
            ]);

            if(request()->hasFile('main_image')){
                $validator = Validator::make($request->all(),[
                    'main_image' => 'required|mimes:jpeg,jpg,png',
                    // 'other_image' =>'required',
                    // 'other_image.*' => 'image|mimes:jpeg,png,jpg'
                ]);      
                $main_image = request()->file('main_image')->store('Uploads/products/main_image/'.$request->id.rand().rand(10,100), 'public');
                $delete_img = ShopImage::where('cat_type','products')->where('ref_id',$request->id)->where('img_type',1)->delete();
                $image = ShopImage::create(
                    [
                    'cat_type' => 'products',
                    'img_path' => $main_image,
                    'ref_id' => $request->id,
                    'img_type' => 1
                    
                ]);
                }
                if(request()->hasFile('other_image')){
                    $validator = Validator::make($request->all(),[
                        // 'main_image' => 'required|mimes:jpeg,jpg,png',
                        'other_image' =>'required',
                        'other_image.*' => 'image|mimes:jpeg,png,jpg'
                    ]);  
                $documents = $request->file('other_image');
                $delete_img = ShopImage::where('cat_type','products')->where('ref_id',$request->id)->where('img_type',2)->delete();  
                foreach($documents as $index  => $p)
                {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();   
                    $image =   $request->file('other_image')[$index]->store('Uploads/products/other_image/'.rand().rand(10,1000), 'public');
                    // $inner_page_name = basename($request->file('image')[$index]->getClientOriginalName(), '.'.$request->file('image')[$index]->getClientOriginalExtension());
                    $other_image = ShopImage::create (
                    [
                        'cat_type' => 'products',
                        'img_path' => $image,
                        'ref_id' => $request->id,
                        'img_type' => 2
                    
                ]);
                }
                }

            //$users = User::get();
                return response()->json(['msg' => 'Photography Successfully!', 'status' => 1]);
            //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }
    }

    
    public function suspend_products($id)
    {
        $products = Products::where('id',$id)->first();
        if($products->is_active == 0)
        {
            $products->is_active= 1;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success','Photography Activated Successfuly!!');
        }
        else{
            $products->is_active= 0;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success','Photography Suspended Successfuly!!');
        }
    }

    public function delete_products($id)
    {
        $products = Products::where('id',$id)->with(['productsHasMainImage','productsHasMultiImages'])->delete();
        return redirect()->route('admin.products_listing')->with('notify_success','Photography Deleted Successfuly!!');
       
    }


    public function delete_multiimg($id)
    {
        $delete_img = ShopImage::where('id',$id)->delete();
        return back()->with('notify_success','Image Deleted!');
    }





    public function merchandise_listing()
    {
        $merchandise = Merchandise::with('merchandiseBelongsToCategory')->get();
        return view('admin.merchandise-management.list')->with('title','Merchandise Management')->with('merchandise_menu',true)->with(compact('merchandise'));
    }

    public function add_merchandise()
    {
        $categories = Category::where('is_active',1)->get();
        return view('admin.merchandise-management.add')->with('title','Add Merchandise')->with(compact('categories'))->with('merchandise_menu',true);
    }

    public function create_merchandise(Request $request)
    {
        // dd($request->all());
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'slug' => 'required|unique:merchandise',
            'price' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'info_desc' => 'required',
            'width' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'depth' => 'required|numeric|min:1',
            'weight_pound' => 'required|numeric',
            'weight_kg' => 'required|numeric',
            'category' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png',
            'other_image' =>'required',
            'other_image.*' => 'image|mimes:jpeg,png,jpg'
        ]);      
        if ($validator->passes()) {  
            $merchandise = Merchandise::create([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'long_desc' =>  $request['long_desc'],
                'info_desc' =>  $request['info_desc'],
                'width' =>  $request['width'],
                'height' =>  $request['height'],
                'depth' =>  $request['depth'],
                'weight_pound' =>  $request['weight_pound'],
                'weight_kg' =>  $request['weight_kg'],
                'category_id' =>  $request['category'],
               
            ]);

            if(request()->hasFile('main_image')){
                $main_image = request()->file('main_image')->store('Uploads/merchandise/main_image/'.$merchandise->id.rand().rand(10,100), 'public');
                $image = ShopImage::create(
                    [
                    'cat_type' => 'merchandise',
                    'img_path' => $main_image,
                    'ref_id' => $merchandise->id,
                    'img_type' => 1
                    
                ]);
                }
                if(request()->hasFile('other_image')){
                $documents = $request->file('other_image');  
                foreach($documents as $index  => $p)
                {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();   
                    $image =   $request->file('other_image')[$index]->store('Uploads/merchandise/other_image/'.rand().rand(10,1000), 'public');
                    // $inner_page_name = basename($request->file('image')[$index]->getClientOriginalName(), '.'.$request->file('image')[$index]->getClientOriginalExtension());
                    $other_image = ShopImage::create (
                    [
                        'cat_type' => 'merchandise',
                        'img_path' => $image,
                        'ref_id' => $merchandise->id,
                        'img_type' => 2
                    
                ]);
                }
                }

            //$users = User::get();
                return response()->json(['msg' => 'Merchandise Created Successfully!', 'status' => 1]);
            //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }

    
    }

    public function edit_merchandise($slug)
    {
        $merchandise = Merchandise::where('slug',$slug)->with(['merchandiseBelongsToCategory','merchandiseHasMainImage','merchandiseHasMultiImages'])->first();
        // dd($product);
        $categories = Category::where('is_active',1)->get();
        return view('admin.merchandise-management.edit')->with('title','Edit Merchandise')->with('merchandise_menu',true)->with(compact('merchandise','categories'));
    }

    public function savemerchandise(Request $request)
    {
    //    dd($request->all());

       
         
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'info_desc' => 'required',
            'width' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'depth' => 'required|numeric|min:1',
            'weight_pound' => 'required|numeric',
            'weight_kg' => 'required|numeric',
            'category' => 'required',
          
        ]);      
        if ($validator->passes()) { 
            $check_slug = Merchandise::where('slug',$request->slug)->where('id','!=',$request->id)->first();
            if($check_slug)
            {
                return response()->json(['error'=>'Unique Slug Is Required!','status' => 2]);
            } 
            $merchandise = Merchandise::where('id',$request->id)->update([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'long_desc' =>  $request['long_desc'],
                'info_desc' =>  $request['info_desc'],
                'width' =>  $request['width'],
                'height' =>  $request['height'],
                'depth' =>  $request['depth'],
                'weight_pound' =>  $request['weight_pound'],
                'weight_kg' =>  $request['weight_kg'],
                'category_id' =>  $request['category'],
               
            ]);

            if(request()->hasFile('main_image')){
                $validator = Validator::make($request->all(),[
                    'main_image' => 'required|mimes:jpeg,jpg,png',
                    // 'other_image' =>'required',
                    // 'other_image.*' => 'image|mimes:jpeg,png,jpg'
                ]);      
                $main_image = request()->file('main_image')->store('Uploads/merchandise/main_image/'.$request->id.rand().rand(10,100), 'public');
                $delete_img = ShopImage::where('cat_type','merchandise')->where('ref_id',$request->id)->where('img_type',1)->delete();
                $image = ShopImage::create(
                    [
                    'cat_type' => 'merchandise',
                    'img_path' => $main_image,
                    'ref_id' => $request->id,
                    'img_type' => 1
                    
                ]);
                }
                if(request()->hasFile('other_image')){
                    $validator = Validator::make($request->all(),[
                        // 'main_image' => 'required|mimes:jpeg,jpg,png',
                        'other_image' =>'required',
                        'other_image.*' => 'image|mimes:jpeg,png,jpg'
                    ]);  
                $documents = $request->file('other_image');
                $delete_img = ShopImage::where('cat_type','merchandise')->where('ref_id',$request->id)->where('img_type',2)->delete();  
                foreach($documents as $index  => $p)
                {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();   
                    $image =   $request->file('other_image')[$index]->store('Uploads/merchandise/other_image/'.rand().rand(10,1000), 'public');
                    // $inner_page_name = basename($request->file('image')[$index]->getClientOriginalName(), '.'.$request->file('image')[$index]->getClientOriginalExtension());
                    $other_image = ShopImage::create (
                    [
                        'cat_type' => 'merchandise',
                        'img_path' => $image,
                        'ref_id' => $request->id,
                        'img_type' => 2
                    
                ]);
                }
                }

            //$users = User::get();
                return response()->json(['msg' => 'Merchandise Updated Successfully!', 'status' => 1]);
            //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }
    }

    
    public function suspend_merchandise($id)
    {
        $merchandise = Merchandise::where('id',$id)->first();
        if($merchandise->is_active == 0)
        {
            $merchandise->is_active= 1;
            $merchandise->save();
            return redirect()->route('admin.merchandise_listing')->with('notify_success','Merchandise Activated Successfuly!!');
        }
        else{
            $merchandise->is_active= 0;
            $merchandise->save();
            return redirect()->route('admin.merchandise_listing')->with('notify_success','Merchandise Suspended Successfuly!!');
        }
    }

    public function delete_merchandise($id)
    {
        $merchandise = Merchandise::where('id',$id)->with(['merchandiseHasMainImage','merchandiseHasMultiImages'])->delete();
        return redirect()->route('admin.merchandise_listing')->with('notify_success','Merchandise Deleted Successfuly!!');
       
    }


    
   

}
