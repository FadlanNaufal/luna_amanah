<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Banner;
use App\Models\Testimoni;
use App\Models\CertificateLogo;
use App\Models\TentangKami;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Category;
use App\Models\Subcategory;

class LandingPageController extends Controller
{
    public function index(){
        $news = News::limit(3)->get();
        $package = Package::limit(3)->get();
        $testimonis = Testimoni::where('status','published')->get();
        $logos = CertificateLogo::where('status','published')->get();
        return view('user.home.index', compact('news','testimonis','logos','package'));
    }

    public function about(){
        $about = TentangKami::first();
        $banners = Banner::where('status','published')->get();
        return view('user.about.index',compact('about','banners'));
    }

    public function package(){
        $package = Package::where('status','published')->get();
        $banners = Banner::where('status','published')->get();
        return view('user.package.index',compact('banners','package'));
    }

    public function package_detail($id){
        $package = Package::findOrFail($id);
        return view('user.package.detail',compact('package'));
    }

    public function news(){
        $news = News::all();
        return view('user.news.index', compact('news'));
    }

    public function gallery(){
        $banners = Banner::where('status','published')->get();

        // Haji
        $haji_plus = Gallery::where('category_id','1')->where('subcategory_id','1')->get();
        $haji_furoda = Gallery::where('category_id','1')->where('subcategory_id','2')->get();

        // Umrah
        $umrah_aqsha = Gallery::where('category_id','2')->where('subcategory_id','3')->get();
        $umrah_andalusia = Gallery::where('category_id','2')->where('subcategory_id','4')->get();
        $umrah_dubai = Gallery::where('category_id','2')->where('subcategory_id','5')->get();
        $umrah_turki = Gallery::where('category_id','2')->where('subcategory_id','6')->get();
        $umrah_eropa = Gallery::where('category_id','2')->where('subcategory_id','7')->get();

        // Badal
        $badal_haji = Gallery::where('category_id','3')->where('subcategory_id','8')->get();
        $badal_umrah = Gallery::where('category_id','3')->where('subcategory_id','9')->get();

        // Muslim Tour
        $muslim_turki = Gallery::where('category_id','4')->where('subcategory_id','10')->get();
        $muslim_eropa = Gallery::where('category_id','4')->where('subcategory_id','11')->get();
        $muslim_dubai = Gallery::where('category_id','4')->where('subcategory_id','12')->get();
        $muslim_andalusia = Gallery::where('category_id','4')->where('subcategory_id','13')->get();


        return view('user.gallery.index', compact(
            'banners', 
            'haji_plus', 
            'haji_furoda', 
            'umrah_aqsha', 
            'umrah_andalusia', 
            'umrah_dubai', 
            'umrah_turki', 
            'umrah_eropa', 
            'badal_haji', 
            'badal_umrah', 
            'muslim_turki', 
            'muslim_eropa', 
            'muslim_dubai', 
            'muslim_andalusia'
        ));
    }

    public function news_detail($slug){
        $news = News::where('slug', $slug)->firstOrFail();
        return view('user.news.detail',compact('news'));
    }

    
}
