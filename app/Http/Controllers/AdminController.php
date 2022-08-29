<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Images;

use App\Traits\fileUpload;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\FuncCall;
use Carbon\Carbon;


class AdminController extends Controller
{
  
     public function addnews(Request $request)
     {
          return view('add_news');
     }

     public function deleteNews(Request $request, $newsid )
     {
          
          $new = News::find($newsid);
          $new->delete();
          session()->flash('newsdelete','Record Successfully Deleted');
          return redirect()->back();
     }
     public function updateNews(Request $request, $newsid)
     {
          $newData = News::where('newsid', $newsid)->first();
          return view('update_news',['news_data'=>$newData]);
     }
    
     public function viewNews()
     {
          $news =  News::paginate(15);
          return view('news',['all_news'=>$news]);
     }
     use fileUpload;
     public function AddNewsRecord(Request $request){
        
          $new =  new News();
          $new->newstitle =  $request->ar_title;
          $new->news_e_title = $request->en_title;
          $new->newscategory = $request->category;
          $new->newsdate = $request->date;
          $new->newsbody = $request->ar_body;
          $new->news_e_body = $request->en_body;
          if ($file = $request->news_images) {
               $newImage = $this->uploadFile($file, 'images');
               $new->newsimages = $newImage;
          }
          $myimages= []; 
          foreach($request->imagefile as $file)
          {
               $newImage = $this->uploadFile($file, 'images');
               array_push($myimages, $newImage );
          }
          $new->addonimages = implode(",",$myimages);
          $new->extra = $_SERVER['HTTP_USER_AGENT'];
          $new->save();
          session()->flash('notyms','News Successfully Added');
          return redirect()->route('news');
     }

     public function  updateNewsRecord(Request $request, $newsid){
          $myimages= []; 
          $new = News::find($newsid);
          if(!$new)
          {
               return "Record does not exist";
          }
          if(isset( $request->ar_title))
          {
               $new->newstitle =  $request->ar_title;
          }
          if(isset( $request->en_title))
          {
               $new->newstitle =  $request->en_title;
          }
          if(isset( $request->en_title))
          {
               $new->news_e_title =  $request->en_title;
          }
          if(isset( $request->category))
          {
               $new->newscategory =  $request->category;
          }
          if(isset( $request->date))
          {
               $new->newsdate =  $request->date;
          }
          if(isset($request->ar_body)){
               $new->newsbody =  $request->ar_body;
          }
          if(isset($request->en_body)){
               $new->news_e_body =  $request->en_body;
          }     
          if ($file = $request->news_images) {
               $newImage = $this->uploadFile($file, 'images');
               $new->newsimages = $newImage;
          }
          if (isset($request->imagefile)) {
          foreach($request->imagefile as $file)
          {
               $newImage = $this->uploadFile($file, 'images');
               array_push($myimages, $newImage );
          }
          $new->addonimages = implode(",",$myimages);
          $new->save();
     }
  
          session()->flash('updated_notfi','News Updated Successfully');
          return redirect()->route('news');
     }

   
     public function login(Request $request)
     {
          return view('welcome');
     }
     public function authentication(Request $request)
     {
          $validated = $request->validate([
               'email' => 'required|email',
               'password' => 'required',
          ]);
          if (Auth::attempt([
               "email" => $request->email,
               "password" => $request->password,
          ])) {
               return redirect()->route('/');
          }
          return redirect()->back()->withErrors('Invalid Password/ Email');
     }

     public function viewGallery()
     {      
          $gallery =  Gallery::paginate(12);      
          return view('gallery',['all_gallery'=>$gallery]);
          //return view('gallery.',['all_gallery'=>$gallery]);
     }
     public function AddGallery(Request $request)
     {
          $gal = new Gallery();
          $gal->galleryaname = $request->ar_name;
          $gal->galleryename = $request->en_name;
          $gal->gallerydate = $request->date;
          $gal->albumnames = $request->alb_name;
          $gal->save(); 
          session()->flash('message','Gallery Added Successfully');
          return redirect()->back();
     }

     public function updateGallery(Request $request)
     {
          $gal = Gallery::find($request->galleryid);
          if(!$gal)
          {
               return "Gallery not found";
          }
          if(isset($request->ar_name))
          {
               $gal->galleryaname = $request->ar_name;
          }
          if(isset($request->en_name))
          {
               $gal->galleryename = $request->en_name;
          }
          if(isset($request->date))
          {
               $gal->gallerydate = $request->date;
          }
          if(isset($request->alb_name)){
               $gal->albumnames = $request->alb_name;
          }
          $gal->save();
          session()->flash('success_gallery_update','Galarey Updated Successfully');
          return redirect()->back();
     }

     public function deleteGallery(Request $request, $galleryid)
     {
          $gal = Gallery::find($galleryid);
          $gal->delete();
          session()->flash('delete_galarey','Record Successfully Deleted');
          return redirect()->back();
     }
     public function closeModal()
     {
         $this->resetInput();
     }

     public function viewGalleryImages(Request $request)
     {
          $galimages = Images::where('linked_galleryid', $request->id)->paginate(8);
          $gallery= Gallery::find($request->id);
          return view('gallery_imgs')->with(['gallery'=>$gallery, 'gallery_imgs'=>$galimages]);
     }

     public function addGalleryImages(Request $request, $gid){
   
          if ($file = $request->gallery_images) {
            
               foreach($request->gallery_images as $file)
               {
                    $path = $this->uploadFile($file, 'images');
                    $imags = new Images();
                    $imags->imgfilename = $path;
                    $imags->uploadedtime = Carbon::now();
                    $imags->linked_galleryid = $gid;
                    $imags->save();
               }
          }
          return back()->with('gallery_message', 'Images added successfully');
       }

     public function deleteGalleryImages(Request $request, $imgid){
          $imgs = Images::find($imgid);
          $imgs->delete();
          return back()->with('gallery_imges_deleted', 'Image deleted successfully');
     }

     public function updateGalleryImage(Request $request)
     {
          $galImge = Images::find($request->imgid);

          if ($file = $request->gallery_images) {
               $galImage = $this->uploadFile($file, 'images');
               $galImge->imgfilename = $galImage;
          }
          $galImge->save();
          return back()->with('update_gallery_image', 'Image updated successfully');
     }
}

     
   

