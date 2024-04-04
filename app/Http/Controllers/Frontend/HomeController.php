<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Team;
use App\Models\Quote;
use App\Models\Contact;
use App\Models\Package;
USe Session;

use App\Models\Project;
use App\Models\Service;
use App\Models\MediaCenter;
use App\Models\Testimonial;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\projectreviewtbl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function about()
    {
        return view('frontend.pages.aboutus');
    }

    public function contact()
    {
        return view('frontend.pages.contactus');
    }
    // public function contact()
    // {
    //     return view('frontend.pages.contact');
    // }

    public function contactuspost(Request $req)
    {
        $contactmodel = new Contact();
        $contactmodel->name = $req->name;
        $contactmodel->email = $req->email;
        $contactmodel->phone = $req->phone;
        $contactmodel->message = $req->message;
        $contactmodel->save();
        return redirect()->back()->with('message', "Your Message Has Been Send...");


    }

    public function index()
    {   
       
        return view('frontend.pages.index');
    }
    

    public function privacypolicy()
    {
        return view('frontend.pages.privacy');
    }

    public function termsandconditions()
    {
        return view('frontend.pages.terms');
    }
    public function course()
    {
        return view('frontend.pages.course');
    }

    public function coursedetail()
    {
        return view('frontend.pages.coursedetail');
    }
 
    public function mediacenter()
    {
        $fetch = MediaCenter::paginate(6);
        return view('frontend.pages.mediacenter', compact('fetch'));
    }


    public function mediacenterdetail($slug)
    {
        $related = MediaCenter::where('slug', '!=', $slug)->limit(8)->get();
        $fetch = MediaCenter::where('slug', $slug)->first();
        return view('frontend.pages.mediacenterdetail', compact('related', 'fetch'));
    }

   
}
