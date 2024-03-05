<?php

namespace App\Http\Controllers;
use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\News;
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
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Merchandise;
use Auth;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        //  $logo = imagetable::where('table_name','logo')->latest()->first();
        // //  View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
    }

    public function cart()
    {
        // // dd(Session::get('cart'));
        // // Session::forget('cart');
        // // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','cart-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('cart')->with('title','Cart')->with(compact('banner'));
    }

    public function save_cart(Request $request)
    {
        //  dd($request->all());
        if(Session::has('cart') && !empty(Session::get('cart')))
       {
           $rowid = null;
           $flag = 0;
           $cart_data = Session::get('cart');

            foreach ($cart_data as $key => $value) 
            {
                                
                if((intval($value['product_id']) == intval($request['product_id'])))
                {
                    $flag = 1;
                    $rowid = $value['cart_id'];
                    // dd($rowid);
                    $cart_data[$rowid]['quantity_selected'] += $request['quantity'];
                    $cart_data[$rowid]['sub_total'] = $cart_data[$rowid]['sale_price']*$cart_data[$rowid]['quantity_selected'];                    
                    Session::forget($rowid);
                    Session::put('cart',$cart_data); 
                    return redirect()->route('cart')->with('notify_success','Product Added To Cart Successfully!');
                    // return response()->json(['msg' => 'Product Added to cart Successfully', 'status' => 1]);
                }

                    
                
            }
       }
    
        $product_id = $request->product_id;
        $qty = $request->quantity;

        $cart = array();
        $cartId = $product_id.$request->type;
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }

    	if($qty == 0){
    		$qty = 1;
    	}

        if($product_id != "" && intval($qty) > 0)
        {
            if(!empty($cartId) && !empty($cart))
            {
                unset($cart[$cartId]);
            }

        
            $product = Products::where('id',$product_id)->with('productsHasMainImage')->first();
            //  dd($product);
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['stock_qty'] = $product->qty;
            $cart[$cartId]['product_id'] = $product_id;
            $cart[$cartId]['category_id'] = $product->category_id;
            $cart[$cartId]['name'] = $product->name;
            $cart[$cartId]['slug'] = $product->slug;
            $cart[$cartId]['quantity_selected'] = $qty;
            $cart[$cartId]['sku'] =  $product->sku;
            $cart[$cartId]['sale_price'] =  $product->sale_price;
            $cart[$cartId]['price'] = $product->price;
            $cart[$cartId]['sub_total'] = floatval($product->sale_price*$qty);
            $cart[$cartId]['image'] = !empty($product->productsHasMainImage[0]) ? $product->productsHasMainImage[0]->img_path : asset('images/noimg.png');
            // dd($cart);

            Session::put('cart',$cart);

            return redirect()->route('cart')->with('notify_success', 'Item Added to cart Successfully');
        }
        else
        {
            return back()->with('notify_error', 'Something Went Wrong, Please Try Again!');
        }
    
   
   
       
    }

    public function updatecart(Request $request)
    {
        // dd($request->all());
        $rowid = $request->rowid;
        $qty = $request->qty;
        $cart_data = Session::get('cart');
        // dd($cart_data);
        $cart_data[$rowid]['quantity_selected'] = $qty;
        $cart_data[$rowid]['sub_total'] = $cart_data[$rowid]['sale_price']*$qty;
        Session::forget($rowid);
        Session::put('cart',$cart_data);

        return response()->json(['status' , 1]);
    }

    public function removecart(Request $request){
       
        $rowid = $request['rowid'];
        $cart_data = Session::get('cart');
        unset($cart_data[$rowid]);
        Session::forget('cart');
        Session::put('cart',$cart_data);
    }
    
    public function checkout()
    {
        
        if(Auth::check())
        {

            if(Session::has('cart') && !empty(Session::get('cart')) )
            {
            // $banner = Imagetable::where('table_name','checkout-banner')->latest()->first();
            $cart_data = Session::get('cart');
            // dd($cart_data);
            return view('checkout')->with('title','Checkout')->with(compact('cart_data'));
            }
            else{
                return redirect()->route('cart')->with('notify_error','Your Cart Is Empty!');
            }
        }
        else{
            return back()->with('notify_error','You need to login first!');
        }

        return view('checkout')->with('title','Checkout');
    }

    public function placeorder(Request $request)
    {
     
        
        if(Session::has('cart'))
        {
      
        $ser = Session::get('ser');
     
        $validator = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'country' => 'required|max:255',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'zip' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        //  dd($request);

       
        $order = Orders::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'country' => $request['country'],
            'address' => $request['address'],
            'town' => $request['town'],
            // 'state' => $request['password'],
            'zip' => $request['zip'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'total_amount' => $request['total_amount'],
            'order_amount' => $request['order_amount'],
            'user_id' => Auth::id(),
           
            
        ]);
    
        $order_detail = OrderDetail::create([
            'details' => $ser,
            'order_id' => $order->id
        ]);
        Session::put('order_id',$order->id);
        $order_detail = unserialize($ser);
        $mail_data = array('orders' => $order, 'order_detail' => $order_detail, 'request' => $request->all());
            Session::put('mail_data',$mail_data);
            Session::forget('cart');
            Session::forget('ser');
        return view('dummy')->with('title', 'Merchant Comming Soon !');

      
        // return redirect()->route('paysecure')->with('notify_success','Please Pay To Complete Your Order!');

       
        // //dd(Session::get('order_id'));
        //  $uns = unserialize($ser);
        //  $token = Str::random(60);
        //  //dd($uns);
        
        // //  Session::forget('cart');
        // //  Session::forget('ser');
        //  $orders = $order;
        // $order_detail = $uns;
        // $mail_data = array('orders' => $order, 'order_detail' => $order_detail, 'request' => $request->all());
        // Session::put('mail_data',$mail_data);
        //  //dd($order_detail);
        // //return view('adminiy.order.detail')->with(compact('orders','order_detail'));
       
        //  $img_tab = Imagetable::where('table_name','checkoutbanner')->first();
        //  return view('pay-secure')->with('title','Payment')->with(compact('order','img_tab'));
        //return redirect()->route('checkout_landing')->with('notify_success','Order Placed Successfuly!');
    }
    else{
        return redirect()->route('home')->with('notify_error','Your Cart Is Empty!');
    }
    }

    public function paysecure()
    {
        if(Session::has('cart'))
        {
        $order_id = Session::get('order_id');
        $custom = $order_id;
        $orders = Orders::where('id',$order_id)->with('orderHasDetail')->first()->toArray();
        // dd($orders);
        $ser = Session::get('ser');
        $uns = unserialize($ser);
        //dd($uns);
        $amount = $orders['total_amount'];
        foreach ($uns as $key => $val) {
            $data1[] = array(
                'name' => $val['name'],
                // 'description' => truncate(html_entity_decode($val['product_desc']), 50),
                'quantity' => $val['quantity_selected'],
                'price' => $val['sub_total'],
                // 'tax' => $this->tax,
                'image' => $val['image'],
                'slug' => $val['slug'],
                'currency' => 'USD'
            );
        }
        $itemsss = $data1;
         
        
         $banner = Imagetable::where('table_name','checkout-landing-banner')->latest()->first();
        return view('paysecure')->with('title','Payment')->with(compact('banner','order_id','uns','amount','orders','itemsss','custom'));
        }
        else{
            return redirect()->route('home')->with('notify_error','Your Cart Is Empty!');
        }
    }

    public function paystatus(Request $request)
    {
        // dd($request->all());
        $status_codes = array("Default" => 0, "Completed" => 1, "Pending" => 2, "Denied" => 3, "Failed" => 4, "Reversed" => 5);
        $payment_status = $request['payment_status'];

            $updateParam = $status_codes[$payment_status];

            $order_upd = Orders::where('id',$request['custom'])->update([
                'pay_status' => $updateParam,
                'order_response' => serialize($request->all()),
                'order_merchant' => 'PAYPAL'
            ]);
            
    }

    public function checkout_landing()
    {
        
        if(Session::has('cart'))
        {
        $order_id = Session::get('order_id');
        $ser = Session::get('ser');
        $uns = unserialize($ser);

         $mail_data = Session::get('mail_data');
                    // dd($mail_data);
                    $orders = $mail_data['orders'];
                    //dd($orders);
                    $order_detail = $mail_data['order_detail'];
                    $request = $mail_data['request'];
                    //dd($order_detail);
                    Mail::send('invoice', ['orders'=>$orders,'order_detail'=>$order_detail]
                    ,function($message) use ($orders,$order_detail,$request) {
                      $message->to($request['email']);
                      $message->subject('Your Order Invoice');
                      });
        //dd($order_id);
         
         $banner = Imagetable::where('table_name','checkout-landing-banner')->latest()->first();
        return view('checkout-landing')->with('title','Order Complete')->with(compact('banner'));
        }
        else{
            return redirect()->route('home')->with('notify_error','Your Cart Is Empty!');
        }
    }
    


   
}
