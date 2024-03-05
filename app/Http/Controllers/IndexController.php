<?php

namespace App\Http\Controllers;
use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\Newsletter   ;
use App\Models\Content;
use App\Models\Keywords;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Album;
use App\Models\Photos;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Matches;
use App\Models\Team;
use App\Models\Review;
use Carbon\Carbon;
use Auth;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Merchandise;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        //  $logo = imagetable::where('table_name','logo')->latest()->first();
        //  View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
    }

    public function search(Request $request){
       
        $search = $request->input('search');
   
  
        $searchproduct = Products::query()
                    ->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('sku', 'LIKE', "%{$search}%")
                     ->orWhere('short_desc', 'LIKE', "%{$search}%")
                    ->where('is_active',1)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])
                    ->get();
                    // dd($searchproduct);
        
        return view('search', compact('searchproduct'));
    }
    public function index()
    {
       // dd(Carbon::now()->format("Y-m-dTH:i"));
        // $content = Content::where('id',1)->first();
        $testimonial = Testimonial::where('is_active',1)->latest()->take(10)->get();
        // $sponsors = Partner::where('is_active',1)->latest()->take(8)->get();
        // $reviews = Review::where('is_active',1)->with(['reviewBelongsToUser','reviewBelongsToProducts','reviewBelongsToMerchandise'])->get();
      
        $banner = Imagetable::where(['type'=> 3 ,'is_active_img' => 1])->get();
        // dd($banner);
        // $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(10)->get();
        // $matches = Matches::where('is_active',1)->where('dated' , '>=' , Carbon::now()->format('Y-m-dTH:i'))->get();
        // $streams = Matches::where('is_active',1)->where('dated' , '>=' , Carbon::now()->toDateTimeString())->whereNotNull('live_stream')->get();
    //    dd($matches);
    $products = Products::where('is_featured',1)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])->latest()->take(10)->get();
    
    
    // $testimonials = Testimonial::where('is_active',1)->latest()->take(5)->get();
        return view('welcome')->with('title','Home')->with(compact('products','testimonial','banner'))->with('homemenu',true);
    }
    
    static public function get_albums()
    {
        $albums = Album::all();
        return $albums;
    }

    public function about()
    {
        // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','about-banner')->where('type',2)->where('is_active_img',1)->first();
        //   $streams = Matches::where('is_active',1)->where('dated' , '>=' , Carbon::now()->toDateTimeString())->whereNotNull('live_stream')->get();
        return view('about')->with('title','About Us')->with(compact('banner'))->with('aboutmenu',true);
    }

    public function photography()
    {
        // $content = Content::where('id',1)->first();
        // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
        $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('photography')->with(compact('banner'))->with('photographymenu',true);
    }
    
   
    
     public function beach()
    {
        // $content = Content::where('id',1)->first();
        // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
        $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('beach')->with(compact('banner'))->with('photographymenu',true);
    }

    
    
     public function birds()
    {
        // $content = Content::where('id',1)->first();
        // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
        $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('birds')->with(compact('banner'))->with('photographymenu',true);
    }
      public function desert()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('desert')->with(compact('banner'))->with('photographymenu',true);
        }
         public function lakes()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('lakes')->with(compact('banner'))->with('photographymenu',true);
        }
      public function mountains()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('mountains')->with(compact('banner'))->with('photographymenu',true);
        }
      public function mics()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('mics')->with(compact('banner'))->with('photographymenu',true);
        }
    public function sunset()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('sunset')->with(compact('banner'))->with('photographymenu',true);
        }
    public function waterfalls()
        {
            // $content = Content::where('id',1)->first();
            // $albums = Album::where('is_active',1)->with('albumHasPhotos')->get();
            $banner = Imagetable::where('table_name','photography-banner')->where('type',2)->where('is_active_img',1)->first();
            return view('waterfalls')->with(compact('banner'))->with('photographymenu',true);
        }

    public function blog()
    {
        // $content = Content::where('id',1)->first();
        // $blogs = Blog::where('is_active',1)->get();
        $banner = Imagetable::where('table_name','blog-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('blog')->with('title','Blog')->with(compact('banner'))->with('blogmenu',true);
    }

    public function blog_detail($slug)
    {
        // dd($slug);
        $blog_detail = Blog::where('slug',$slug)->first();
        // dd($blog_detail);

        
        $banner = Imagetable::where('table_name','blog-banner')->where('type',2)->where('is_active_img',1)->first();

        return view('blog-detail')->with('title','Blog Detail')->with(compact('banner','blog_detail'))->with('blogdetailmenu',true);
    }
    

  
    public function privacy_policy()
    {
        // // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','privacy-policy-banner')->where('type',2)->where('is_active_img',1)->first();
        // // return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
        // $matches = Matches::where('is_active',1)->with(['matchBelongsToTeam1','matchBelongsToTeam2'])->get()->toArray();
        return view('privacy-policy')->with(compact('banner'))->with('title','Privacy Policy');
    }

    public function refund_policy()
    {
        // // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','refund-policy-banner')->where('type',2)->where('is_active_img',1)->first();
        // // return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
        // $matches = Matches::where('is_active',1)->with(['matchBelongsToTeam1','matchBelongsToTeam2'])->get()->toArray();
        return view('refund-policy')->with('title','Refund Policy')->with(compact('banner'));
    }
    public function shipping_policy()
    {
        // // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','shipping-policy-banner')->where('type',2)->where('is_active_img',1)->first();
    
        // // return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
        // $matches = Matches::where('is_active',1)->with(['matchBelongsToTeam1','matchBelongsToTeam2'])->get()->toArray();
        return view('shipping-policy')->with('title','Shipping Policy')->with(compact('banner'));
    }
    public function terms_conditions()
    {
        // // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','term-condition-banner')->where('type',2)->where('is_active_img',1)->first();
        // // return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
        // $matches = Matches::where('is_active',1)->with(['matchBelongsToTeam1','matchBelongsToTeam2'])->get()->toArray();
        return view('terms-conditions')->with('title','Terms Conditions')->with(compact('banner'));
    }

    public function shop()
    {
        // $content = Content::where('id',1)->first();
        $products = Products::where('is_active',1)->with(['productBelongsToCategory','productsHasMainImage'])->latest()->get();
        $banner = Imagetable::where('table_name','shop-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('shop')->with('title','Shop')->with(compact('banner','products'))->with('shopmenu',true);
    }
    
    public function gallery_detail($id)
    {
        $photos = Photos::where('album_id',$id)->get();
        $title = Album::where('id',$id)->first();
        return view('gallery')->with(compact('photos','title'));
    }

    public function product_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $product = Products::where('is_active',1)->where('slug',$slug)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])->first();
        // $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(4)->get();
        // $banner = Imagetable::where('table_name','shop-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        $reviews = Review::where('is_active',1)->where('item_id',$product->id)->get();
        
    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //     'Content-Type:  application/json',
    //     'web_api_key: 3f816550-8073-4325-8b8f-d70fdee30bc6',
    //     'app_key: 1c342089-2390-4ead-b5b4-53adb9e44e8d',
    //     'Content-Length: 0',
    //     'Connection: keep-alive',
    //     'Accept-Encoding: gzip, deflate, br',
    //     'Accept: */*',
        
    //     ));
    //     curl_setopt_array($curl, array(
    // //   CURLOPT_HTTPHEADER => array(
    // //     'Content-Type' =>  'application/json',
    // //     'web_api_key' => '3f816550-8073-4325-8b8f-d70fdee30bc6',
    // //     'app_key' => '1c342089-2390-4ead-b5b4-53adb9e44e8d',
    // //     'Content-Length' => '0'
    // //     ),
    //     CURLOPT_URL => "https://api.finerworks.com/v3/test_my_credentials"
    //     ,CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 50,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
       
    //     // Content-Type => 'application/json',
    //     // web_api_key => '3f816550-8073-4325-8b8f-d70fdee30bc6',
    //     // app_key =>  '1c342089-2390-4ead-b5b4-53adb9e44e8d',
    //     // Content-Length=> '0'
    //     ));
       
        
    //     //  echo 
    //     // exit;
    //     $response = curl_exec($curl);
    //     // dd();
    //     // echo "<pre>";
    //     // print_r($response);
    //     // exit;
    //     curl_close($curl);
    //      dd($response);
    //      $response = json_decode($response);
    //     dd($response);
        return view('shop-detail')->with('title','Shop Detail')->with(compact('product','reviews'))->with('shopmenu',true);
    }

    public function merchandise_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $merchandise = Merchandise::where('is_active',1)->where('slug',$slug)->with(['merchandiseBelongsToCategory','merchandiseHasMainImage','merchandiseHasMultiImages'])->first();
        $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(4)->get();
        $banner = Imagetable::where('table_name','merchandise-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        $reviews = Review::where('is_active',1)->where('item_id',$merchandise->id)->where('type',2)->get();
        return view('merchandise-detail')->with('title','Merchandise Detail')->with(compact('banner','merchandise','merchandises','reviews'))->with('shopmenu',true);
    }

    public function sponsors()
    {
        // $content = Content::where('id',1)->first();
        $sponsors = Partner::where('is_active',1)->latest()->get();
        $banner = Imagetable::where('table_name','sponsors-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('sponsors')->with('title','Sponsors')->with(compact('banner','sponsors'))->with('sponsorsmenu',true);
    }
    
    public function opportunities_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $blog = Blog::where('is_active',1)->where('slug',$slug)->first();
        $showcase = Blog::where('is_active',1)->where('slug','!=',$slug)->latest()->take(3)->get();
        $banner = Imagetable::where('table_name','opportunities-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('opportunity-detail')->with('title','Opportunity')->with(compact('banner','blog','showcase'))->with('opdetmenu',true);
    }  
    
    public function contactus()
    {
        $banner = Imagetable::where('table_name','contactus-banner')->where('type',2)->where('is_active_img',1)->first();
    
        return view('contact-us')->with('title', 'Contact Us')->with(compact('banner'))->with('contactmenu',true);
    }
    

    public function news()
    {
        $content = Content::where('id',5)->first();
       $news = News::where('is_active',1)->with('thumbnail','picture')->get();
        return view('news')->with('title','News')->with(compact('news','content'));
    }
    
    public function search_news(Request $request)
    {
       // dd($request->all());
       $search = $request->search;
         $content = Content::where('id',5)->first();
         $news = News::where('title','like', '%'.$request->search.'%')->where('is_active',1)->get();
         if(count($news) > 0)
         {
            return view('news')->with('title','News')->with(compact('news','content','search'));
         }
         else
         {
             return back()->with('notify_error','No Record Found!');
         }
         
        
    }
    
    public function news_detail($slug)
    {
        $content = Content::where('id',8)->first();
        $news = News::where('slug',$slug)->where('is_active',1)->with('thumbnail','picture')->first();
        return view('news-detail')->with('title','News Detail')->with(compact('news','content'));
    }

    public function partners()
    {
       
        $content = Content::where('id',6)->first();
        return view('partners')->with(compact('content'));
    }

    
    public function create_review(Request $request)
    {
        // dd($request);
        // if(Auth::check()){
          
        $validator = Validator::make($request->all(),[
            'review' => 'required|max:500',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'phone' => 'required|max:255',
            'rating' => 'required'
        ]);      
        // dd();
        if ($validator->passes()) {  
            $review = Review::create([
                'review' =>  $request['review'],
                'name' => $request['name'],
                'email' => $request['email'],
                // 'phone' => $request['phone'],
                'rating' => $request['rating'][0],
                
                'user_id' =>  Auth::id(),
                // 'type' => $request['type'],
                'item_id' =>  $request['item_id'],
               
            ]);

                return response()->json(['msg' => 'Review Pending For Admin Approval!', 'status' => 1]);

            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }
            // }
            // else
            // {
            //     return response()->json(['error'=>'Please Login To Post Reviews!','status' => 2]);
            // }
    }
    
public function newsletterstore(Request $request)
{
    // dd($request);
    $validator = Validator::make($request->all(),[
        'email' => 'required|email|unique:newsletter,email|max:255',
    ],
    [
        'email.unique' => 'Sorry! You have already subscribed',
      

    ]);      
    
    if ($validator->passes()) {  
        $newsletter = Newsletter::create([
           
            'email' => $request['email'],
           
        ]);

            return response()->json(['msg' => 'Thanks For Subscribe', 'status' => 1]);

        }
            else
            {
            return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                
            }
}
    


   
}
