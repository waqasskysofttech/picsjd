<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Keywords;
use App\Models\Imagetable;
use App\Models\Config;
use App\Models\Content;
use Auth;
class SiteSettingsController extends Controller
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


 
    public function showLogo()
    {
        return view('admin.logo-management')->with('title','Logo Management');
    }

    public function saveLogo(Request $request)
    {
        //dd(auth('admin')->user());
       // dd($request->all());
        $request->validate([
            'logo' => 'required',
            
        ]);  

        $logo = request()->file('logo')->store('Uploads/Logo/'.auth('admin')->user()->id.rand().rand(10,100), 'public');

        $save_logo = Imagetable::create([
            'table_name' => 'logo',
            'img_path' => $logo,
        ]);
        return back()->with('notify_success','Logo Updated!');
    }

    public function socialInfo()
    {
        return view('admin.contact-social');
    }

    public function saveSocialInfo(Request $request)
    {
        $validator =  $request->validate([
            'FACEBOOK' => 'required',
            'INSTAGRAM' => 'required',
            'YOUTUBE' => 'required',
            'TWITTER' => 'required',
            'LINKDIN' => 'required',
            'PINTEREST' => 'required',
            'COMPANYEMAIL' => 'required',
            'COMPANYPHONE' => 'required',
            'COMPANYADDRESS' => 'required',
            'EXTERNALEMAIL' => 'required',
            
            
        ]);  
        //dd($request->all());
        $config =  $request->except(['_token']);

        foreach($config as $k => $v )
        {
            //dd($k);
            $conf = Config::updateOrCreate (
                [
                 'flag_type' => $k
                ],
             [
             'flag_type' => $k,
             'flag_value' => $v,
             'flag_additionalText' => $v,
         ]);
        }
        //unset($config[0]->_token);
        //dd($config);
        return redirect()->route('admin.dashboard')->with('notify_success','Settings Updated!');
    }

    
    public function Slider()
    {
        $home_slider = Imagetable::where('type',3)->get();
        return view('admin.home-slider.homesliderlist')->with('title','Slider Management')->with(compact('home_slider'));
    }

    public function homeSlider()
    {
        $home_slider = Imagetable::where('type',2)->get();
        return view('admin.home-slider.list')->with('title','Banner Management')->with(compact('home_slider'));
    }

    public function deletehomeSlider($id)
    {
        $img = Imagetable::where('id',$id)->where('table_name','home-slider')->delete();
        return redirect()->route('admin.Slider')->with('notify_success','Home Slider Deleted Successfuly!!');
       
    }

    public function addhomeSlider()
    {
        return view('admin.home-slider.add')->with('title','Add Home Slider');
    }

    public function createhomeSlider(Request $request)
    {
  

        $request->validate([
            'homeslider' => 'required',
        ]);
    

        if(request()->hasFile('homeslider')){
            $homeslider = request()->file('homeslider')->store('Uploads/homeslider/'.rand().rand(10,100), 'public');
            $image = Imagetable::create (
             [
             'table_name' => 'home-slider',
             'img_path' => $homeslider,
             'type' => 3,
             'is_active_img'=>1,
             'headings' => $request->content
         ]);
          }
          return redirect()->route('admin.Slider')->with('notify_success','Slider Uploaded!');
    }

    public function edithomeSlider($id)
    {
       
        $home_slider = Imagetable::where(['type'=> 3 , 'id' => $id , 'is_active_img' => 1])->first();
         
        return view('admin.home-slider.edit')->with('title','Edit Home Slider')->with(compact('home_slider'));
    }

    
    public function editbanner($id)
    {
        $home_slider = Imagetable::where('type',2)->where('is_active_img',1)->where('id',$id)->first();
        return view('admin.home-slider.editbanner')->with('title','Edit Home Slider')->with(compact('home_slider'));
    }

    public function updateeditbanner(Request $request)
    {
        // dd($request->all());


        if(request()->hasFile('homeslider')){
            $homeslider = request()->file('homeslider')->store('Uploads/banners/'.$request->id.rand().rand(10,100), 'public');
            $image = imagetable::where('id', $request->id)->where('table_name',$request->table_name)->update (
             [
             'table_name' => $request->table_name,
             'img_path' => $homeslider,
             'ref_id' => $request->id,
             'type' => 2,
             'is_active_img'=>1,
         ]);
          }
        //   else
        //   {
        //       $headings = Imagetable::where('id',$request->id)->update([
        //         'headings' => $request->content
        //       ]);
        //     return redirect()->route('admin.Slider')->with('notify_success','Content Updated Successfuly!!');
        //   } 
          return redirect()->route('admin.banner')->with('notify_success','Banner Updated Successfuly!!');
    }

    public function updatehomeSlider(Request $request)
    {
        // dd($request->all());

       


        if(request()->hasFile('homeslider')){
            $homeslider = request()->file('homeslider')->store('Uploads/banners/'.$request->id.rand().rand(10,100), 'public');
            $image = imagetable::where('id', $request->id)->where('table_name',$request->table_name)->update (
             [
             'table_name' => $request->table_name,
             'img_path' => $homeslider,
             'ref_id' => $request->id,
             'type' => 3,
             'is_active_img'=>1,
             'headings' => $request->content
         ]);
          }
          else
          {
              $headings = Imagetable::where('id',$request->id)->update([
                'headings' => $request->content
              ]);
            return redirect()->route('admin.Slider')->with('notify_success','Content Updated Successfuly!!');
          } 
          return redirect()->route('admin.Slider')->with('notify_success','Banner Updated Successfuly!!');
    }

    public function suspendhomeSlider($id)
    {
        // dd($id);
        $img = Imagetable::where('type',3)->where('id',$id)->first();
        if($img->is_active_img == 0)
        {
            $img->is_active_img= 1;
            $img->save();
            return redirect()->route('admin.Slider')->with('notify_success','Home Slider Activated Successfuly!!');
        }
        else{
            $img->is_active_img= 0;
            $img->save();
            return redirect()->route('admin.Slider')->with('notify_success','Home Slider Suspended Successfuly!!');
        }
    }

    public function cms()
    {
        $contents = Content::get();
        return view('admin.cms.list')->with(compact('contents'));
    }

    public function edit_cms($id)
    {
        $contents = Content::where('id',$id)->first();
        if($contents)
        {
            return view('admin.cms.edit')->with(compact('contents'));
        }
        else
        {
            return redirect()->route('admin.cms')->with('notify_error','No Record Found!');
        }

    }

    public function update_cms(Request $request)
    {

        // dd($request->all());
        $contents = Content::where('id',$request->id)->update([
            'page_heading' => $request->page_heading,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'content4' => $request->content4,
            'content5' => $request->content5,
            'content6' => $request->content6,
            'content7' => $request->content7,
        ]);

        if(request()->hasFile('img1')){
            $img1 = request()->file('img1')->store('Uploads/cms_images/'.$request->id.rand().rand(10,100), 'public');
            $image1 = Content::where('id',$request->id)->update (
             [
             'img1' => $img1,
             
             ]);

          }

          if(request()->hasFile('img2')){
            $img2 = request()->file('img2')->store('Uploads/cms_images/'.$request->id.rand().rand(10,100), 'public');
            $image2 = Content::where('id',$request->id)->update (
             [
             'img2' => $img2,
             
             ]);

          }

            return redirect()->route('admin.cms')->with('notify_success','Content Updated!');
    }



    
}
