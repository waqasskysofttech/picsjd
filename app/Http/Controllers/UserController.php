<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Wishlist;
use App\Models\Config;
use App\Models\Review;
use App\Models\Products;

use App\Models\Password_resets;
use Auth;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
    }
    public function signin()
    {
        $banner = Imagetable::where('table_name','login-banner')->where('type',2)->where('is_active_img',1)->first();
        // $countries = Country::get();
        return view('sign-in')->with('title','Login')->with(compact('banner'))->with('login_menu',true);
    }

    public function signin_submit(Request $request)
    {

        
        $validator = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
           
           if(Session::has('cart'))
           {
               return redirect()->route('checkout')->with('notify_success','Logged In!');
           }
           else
           {
               return redirect()->route('home')->with('notify_success','Logged In!');
           }
            
        }
        else
        {
            return back()->with('notify_error','Invalid Credentials');
        }
    
    }

    public function signup()
    {
      
        $banner = Imagetable::where('table_name','signup-banner')->where('type',2)->where('is_active_img',1)->first();
        //   $countries = Country::get();
        return view('sign-up')->with('title','Sign Up')->with(compact('banner'))->with('login_menu',true);
    }

    public function signup_submit(Request $request)
    {
        //dd($request->all());
      
        $validator = $request->validate([
            'fullname' => 'required|max:255',
            'password' => 'required|max:50',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|email|unique:users|max:255|',
           
            
        ]);

        $user = User::create([
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
             
        ]);

        Auth::login($user);
        // $data = [
        //         'no-reply' => 'admin@monisbari.com',
        //         'fullname'    => $user->fullname,
        //         'country'    => $user->country,
        //          'city'    => $user->city,
              
              
        //         'email'    => $user->email,
        //         'address'    => $user->address,
        //         'phone'    => $user->phone,
               
        //     ];
   
        //   \Mail::send('email.signup', ['data' => $data],function ($message) use ($data){
        //         $message
        //             ->from($data['no-reply'])
        //             ->to($data['email'])->subject('Sign Up Successful | Tariq Jahangiri');
              
        //   });
        // if(request()->hasFile('avatar')){
        //     $avatar = request()->file('avatar')->store('Uploads/avatar/'.Auth::user()->id.rand().rand(10,100), 'public');
        //     $image = imagetable::updateOrCreate (
        //         [
        //          'ref_id' => $user->id,
        //          'table_name' => 'users',
        //         ],
        //      [
        //      'table_name' => 'users',
        //      'img_path' => $avatar,
        //      'ref_id' => $user->id,
        //      'type' => 1,
        //      'is_active_img'=>1,
        //  ]);
        //   }

       
        return redirect()->route('home')->with('notify_success','Logged In!');
    }

    public function signout(Request $request)
    {
     
        Auth::logout();
        // Session::flush();
        return redirect()->route('home')->with('notify_success','Logged Out!');
    }

    public function contact_us_submit(Request $request)
    {
        // dd($request->all());

        $validator = $request->validate([
            'fullname' => 'required',
            // 'event_date' => 'required',
            // 'phone'=> 'required',
            'email' => 'required|email',
            'message' => 'required',
           
        ]);

        $inquiry = Inquiry::create([
            'fullname'=> $request['fullname'],
            'event_date'=> $request['event_date'],
            'email'=> $request['email'],
            // 'phone'=> $request['phone'],
            'message'=> $request['message']
        ]);

        $external_email = Config::where('flag_type','EXTERNALEMAIL')->first();

        
          $data = [
                'no-reply' => $request->get('email'),
                'from' => $external_email['flag_value'],
                'fullname'    => $request->get('fullname'),
                'email'    => $request->get('email'),
                'event-date'    => $request->get('event_date'),
                'message'    => $request->get('message'),
            ];
   
          \Mail::send('email.contact-temp', ['data' => $data],function ($message) use ($data){
                $message
                    ->from($data['no-reply'] )
                    ->to($data['from'])->subject('Inquiry|PicbyJD');
              
          });


    
        return redirect()->route('home')->with('notify_success','Inquiry Submitted!');
    }
    
    
    
    public function showForgetPasswordForm()
    {
        $banner = Imagetable::where('table_name','forgetpassword-banner')->where('type',2)->where('is_active_img',1)->first();
        // dd($banner);
        return view('forgot-password')->with('title','Forget Password')->with(compact('banner'));
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // $token = Str::random(64);
        
          $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
          
          Mail::send('reset-password', ['token' => $token ,'request'=>$request], function($message) use($request){
             $message->from("info@dynamic.creativedesigndok.com"); 
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        
        
        return back()->with('notify_success', 'We have e-mailed your password reset link!');
    }
    public function submitResetPasswordForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
           
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])->
                            latest()->first();

        if(!$updatePassword){
            return back()->withInput()->with('notify_error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('sign-in')->with('notify_success', 'Your password has been changed!');
    }
    public function showResetPasswordForm($token) { 
        $reset_email =  password_resets::where('token',$token)->first();
        return view('resetpasswordform', ['token' => $token,'email' => $reset_email])->with(compact('reset_email'));
     }
    
    public function addToWishlist(Request $request)
    {
        

        if(Auth::check())
        {
            $wishlistproduct = Products::where('id',$request->product_id)->with(['productBelongsToCategory','productsHasMainImage'])->first();
        
            $wishlist = Wishlist::create([
                'user_id'=>Auth::id(),
                'product_id'=>$wishlistproduct->id,
                'product_title'=>$wishlistproduct->name,
                'short_desc'=>$wishlistproduct->short_desc,
                'sku'=>$wishlistproduct->sku,
                'price'=>$wishlistproduct->price,
                'sale_price'=>$wishlistproduct->sale_price,
                'product_img'=>$wishlistproduct->productsHasMainImage[0]->img_path,
                ]);
          
                
            return redirect()->route('dashboard.myWishlist')->with('notify_success', 'Item Added to Wishlist Successfully');

        }
        else{
            return back()->with('notify_error','You need to login first!');
        }


        
        
        // $param = array();
        // $param['status'] = 1;
        //   echo json_encode($param);
    }
    
     public function removeFromWishlist(Request $request)
    {
   
        
        $wishlist = Wishlist::where(['product_id' => $request->id, 'user_id' => Auth::id()])->delete();
            
        return redirect()->route('dashboard.myWishlist')->with('notify_success', 'Item Remove to Wishlist Successfully');
    }

    public function myWishlist()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        $banner = Imagetable::where('table_name','wishlist-banner')->where('type',2)->where('is_active_img',1)->first();
        // dd($banner);
        return view('wishlist')->with('title','My Wishlist')->with('mywishlistMenu',true)->with(compact('wishlist','banner'));
    }
 

  
    

   
}
