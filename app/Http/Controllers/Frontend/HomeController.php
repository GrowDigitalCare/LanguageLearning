<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Team;
use App\Models\Quote;
use App\Models\Course;
use App\Models\Contact;
USe Session;

use App\Models\Package;
use App\Models\Project;
use App\Models\Service;
use App\Models\Language;
use App\Models\Instructor;
use App\Models\MediaCenter;
use App\Models\Testimonial;
use App\Models\CourseDetail;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
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
       $language = Language::all();
        return view('frontend.pages.index',compact('language'));
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
        $course = Course::paginate(6);
        return view('frontend.pages.course',compact('course'));
    }
    public function instructordetail($name,$id)
    {
        $related = Course::all();
        $instructor = Instructor::where('id', $id)->first();
        return view('frontend.pages.instructordetail', compact('related', 'instructor'));
    }
    
public function courseDetails($slug)
   {
       $subCategory = Course::where('slug', $slug)
           ->with(['lectures']) // Include the 'reviews' relationship
           ->firstOrFail();
   
       $courseDetails = CourseDetail::where('course_id', $subCategory->id)->firstOrFail();
       $relatedCourses = CourseDetail::where('course_id', $subCategory->id)
           ->where('id', '!=', $courseDetails->id)
           ->limit(6)
           ->get();
        //    $reviewcount = CourseReview::where('status', 'active')->count();
       $lectureCount = CourseLecture::where('course_id', $subCategory->id)->count();
   
       return view('frontend.pages.coursedetail', compact('subCategory', 'courseDetails', 'relatedCourses', 'lectureCount'
    //    ,'reviewcount'
    ));
   }
   public function showVideo($slug)
   {
       // Fetch the course lecture based on the slug
       $lecture = CourseLecture::where('slug', $slug)->firstOrFail();
   
       // Fetch all lectures related to the course of this lecture
       $relatedLectures = CourseLecture::where('course_id', $lecture->course_id)->get();
   
       return view('frontend.pages.lecture', compact('lecture', 'relatedLectures'));
   }
   
   
    public function mediacenter()
    {
        $mediacenter = MediaCenter::paginate(6);
        return view('frontend.pages.mediacenter', compact('mediacenter'));
    }


    public function mediacenterdetail($slug)
    {
        $related = MediaCenter::where('slug', '!=', $slug)->limit(4)->get();
        $mediacenter = MediaCenter::where('slug', $slug)->first();
        return view('frontend.pages.mediacenterdetail', compact('related', 'mediacenter'));
    }

   
}
