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
use App\Models\Category;
use App\Models\Sub_category;
use Auth;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class StatisticsController extends Controller
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
    
    public function published_links_statistics()
    {
         $published = Category::with(['categoryHasCrawl' =>  function ($query) {
         $query->where('is_published',1);
         
         }])
         //Uncomment the following when only those childs are required who have wishlist
         //  ->whereHas('sublistingHasWishlist', function ($query)  use($id){
        // $query->where('sublisting_id', $id);
        //  })
         ->where('is_active',1)->select('id','title')->get()->toArray();
         //dd($published);
         $data = array();
         foreach($published as $k => $value)
         {
          //   dd($value);
             $data[$value['title']] = count($value['category_has_crawl']) ;
            // dd($value);
         }
        // dd($data);
        
         return view('admin.statistics.published-links')->with('title','Published Links Statistics')->with('published_links',true)->with(compact('data'));
    }
    
    public function inquiry_statistics()
    {
            $stats = Inquiry::where('is_active',1)
          ->get()
          ->groupBy(function($val) {
          return Carbon::parse($val->created_at)->format('M');
        })->toArray();
        
       // dd($stats);
        
         $data = array();
         foreach($stats as $k => $value)
         {
           
             $data[$k] = count($value) ;
            // dd($value);
         }
         //dd($data);
          return view('admin.statistics.inquiries')->with('title','Inquiries Statistics')->with('inquiries_stats',true)->with(compact('data'));
    }


    public function web_crawl_statistics()
    {
        $totallinks = Crawls::where('is_active',1)->count('*');
        $published_links = Crawls::where('is_active',1)->where('is_published',1)->count('*');
        $archived_links = Crawls::where('is_active',1)->where('is_archived',1)->count('*');
      
         $data = ['total_links' => $totallinks, 'published_links' => $published_links, 'archived_links' => $archived_links];
       
          return view('admin.statistics.web-crawl-statistics')->with('title','Web Crawl Statistics')->with('web_crawl_stats',true)->with(compact('data'));
        
     
    }


}
