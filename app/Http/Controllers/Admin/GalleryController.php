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
use App\Models\Photos;
use App\Models\Sub_category;
use Auth;
use App\Models\Faq;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
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
    
    static public function get_albums()
    {
        $albums = Album::all();
        return $albums;
    }

    public function album_listing()
    {
        $album = Album::get();
        return view('admin.album-management.list')->with('title','Album Management')->with('album_menu',true)->with(compact('album'));
    }

    public function add_album()
    {
        return view('admin.album-management.add')->with('title','Create Album')->with('album_menu',true);
    }

    public function create_album(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:255',
           
            
        ]);  
 
        
        $album = Album::create([
            'name' => $request['name'],
        
        ]);

          return redirect()->route('admin.album_listing')->with('notify_success','Album Created Successfuly!!');
    }

    public function edit_album($id)
    {

        $album = Album::where('id',$id)->first();
        return view('admin.album-management.edit')->with('title','Edit Album')->with('album_menu',true)->with(compact('album'));
    }

    public function savealbum(Request $request)
    {
    //    dd($request->all());

    $request->validate([
        'name' => 'required|max:255',
        
        
    ]);  

    $album = Album::where('id',$request->id)->update (
        [
            'name' => $request['name'],
    ]);

    // if(request()->hasFile('thumbnails')){
 
    //     $request->validate([
    //         'thumbnails' => 'required|mimes:jpeg,jpg,png',
            
            
    //     ]);  
    //     $thumbnails = request()->file('thumbnails')->store('Uploads/album_thumbnails/'.rand().rand(10,100), 'public');
    //     $album = Album::where('id',$request->id)->update (
    //         [
    //         'img_path' => $thumbnails,
    //     ]);
    //  }

  
          return redirect()->route('admin.album_listing')->with('notify_success','Album Updated Successfuly!!');
    }
    
    public function suspend_album($id)
    {
        $album = Album::where('id',$id)->first();
        if($album->is_active == 0)
        {
            $album->is_active= 1;
            $album->save();
            return redirect()->route('admin.album_listing')->with('notify_success','Album Activated Successfuly!!');
        }
        else{
            $album->is_active= 0;
            $album->save();
            return redirect()->route('admin.album_listing')->with('notify_success','Album Suspended Successfuly!!');
        }
    }

    public function delete_album($id)
    {
        $album = Album::where('id',$id)->delete();
        return redirect()->route('admin.album_listing')->with('notify_success','Album Deleted Successfuly!!');
       
    }


    public function photos_listing()
    {
        $photos = Photos::with('photosBelongsToAlbum')->get();
        // dd($subcategory);
        return view('admin.photos-management.list')->with('title','Photos Management')->with('photos_menu',true)->with(compact('photos'));
    }

    public function add_photos()
    {
        $album = Album::where('is_active',1)->get();
        // dd($maincategory);
        return view('admin.photos-management.add')->with('title','Add Photos')->with('photos_menu',true)->with(compact('album'));
    }

    public function create_photos(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:255',
            'album_name'=>'required',
            'thumbnails' => 'required|mimes:jpeg,jpg,png',
            
        ]);  
 
        $thumbnails = request()->file('thumbnails')->store('Uploads/photos_thumbnails/'.rand().rand(10,100), 'public');
        
        $photos = Photos::create([
            'name' => $request['name'],
            'img_path' => $thumbnails,
            'album_id' => $request['album_name']
        
        ]);

          return redirect()->route('admin.photos_listing')->with('notify_success','Photos Created Successfuly!!');
    }

    public function edit_photos($id)
    {

        $photos = Photos::where('id',$id)->with('photosBelongsToAlbum')->first();
        $album = Album::where('is_active',1)->with('albumHasPhotos')->get();
        return view('admin.photos-management.edit')->with('title','Edit Photos')->with('photos_menu',true)->with(compact('photos','album'));
    }
    public function savephotos(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255',
            // 'album_name'=>'required',
            
        ]);  
    
        $photos = Photos::where('id',$request->id)->update (
            [
                'name' => $request['name'],
                // 'album_id'=>$request['album_name'],
        ]);
    
        if(request()->hasFile('thumbnails')){
     
            $request->validate([
                'thumbnails' => 'required|mimes:jpeg,jpg,png',
                
                
            ]);  
            $thumbnails = request()->file('thumbnails')->store('Uploads/photos_thumbnails/'.rand().rand(10,100), 'public');
            $album = Photos::where('id',$request->id)->update (
                [
                'img_path' => $thumbnails,
            ]);
         }

          return redirect()->route('admin.photos_listing')->with('notify_success','Photos Updated Successfuly!!');
    }



    public function suspend_photos($id)
    {
        
    //    dd($id);
        $photos = Photos::where('id',$id)->first();
        if($photos->is_active == 0)
        {
            $photos->is_active= 1;
            $photos->save();
            return redirect()->route('admin.photos_listing')->with('notify_success','Photos Activated Successfuly!!');
        }
        else{
            $photos->is_active= 0;
            $photos->save();
            return redirect()->route('admin.photos_listing')->with('notify_success','Photos Suspended Successfuly!!');
        }
    }

    public function delete_photos($id)
    {
        $photos = Photos::where('id',$id)->delete();
        return redirect()->route('admin.photos_listing')->with('notify_success','Photos Deleted Successfuly!!');
       
    }


    



}
