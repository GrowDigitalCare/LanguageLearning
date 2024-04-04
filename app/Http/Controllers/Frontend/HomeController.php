<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Team;
use App\Models\Test;
use App\Models\Quote;
use App\Models\Course;
USe Session;

use App\Models\Contact;
use App\Models\Package;
use App\Models\Project;
use App\Models\Service;
use App\Models\Language;
use App\Models\Question;
use App\Models\Instructor;
use App\Models\MediaCenter;
use App\Models\Testimonial;
use App\Models\AttemptsTest;
use App\Models\CourseDetail;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\ServiceCategory;
use App\Models\Student_answers;
use App\Http\Middleware\Student;
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
    public function showTest(Request $request, $slug)
    {
        $language = Language::where('slug', $slug)->firstOrFail();
        $test = Test::where('languageid', $language->id)->first();

    
        if (!$test) {
            // Handle the case where no test is associated with the subject
            return redirect()->back()->with('error', 'No test available for this subject.');
        }
    
        if (!$request->user()) {
            return redirect()->route('login.form')->with('error', 'Please log in to attempt the test.');
        }
    
        // Check if the user has already attempted the test
        $existingAttempt = AttemptsTest::with('answers')  // Eager load studentAnswers relationship
        ->where('user_id', auth()->id())
        ->where('test_id', $test->id)
        ->first();
    
            // dd($existingAttempt);
        // Load questions along with the test
        $questions = $test->questions;
    
        // Filter out questions that have already been attempted
        if ($existingAttempt) {
            $attemptedQuestionIds = $existingAttempt->answers->pluck('question_id')->toArray();
            $questions = $questions->reject(function ($question) use ($attemptedQuestionIds) {
                return in_array($question->id, $attemptedQuestionIds);
            });
        }
    
        $totalTime = $test->time_dur;
        $relatedLanguages = Language::all();
        return view('frontend.pages.test', compact('relatedLanguages','language', 'test', 'totalTime', 'questions', 'existingAttempt'));
    }
    
    public function submitTest(Request $request, $languageId)
    {
        $request->validate([]);
    
        $language = Language::findOrFail($languageId);
        $test = Test::where('languageid', $language->id)->first();
    
        $existingAttempt = AttemptsTest::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->first();
    
        if ($existingAttempt) {
            return redirect()->back()->with('error', 'You have already attempted this test.');
        }
    
        $attempt = new AttemptsTest();
        $attempt->user_id = auth()->id();
        $attempt->test_id = $test->id;
        $attempt->save();
    
        $totalQuestions = count($test->questions);
        $marksObtained = 0;
    
        foreach ($test->questions as $index => $question) {
            $selectedOptionId = $request->input("question_{$index}");
    
            // Fetch the correct option letter from the database
            $correctOptionLetter = $question->options->where('correct_opt', true)->first()->correct_opt;
    
            $isCorrect = strtoupper($selectedOptionId) === $correctOptionLetter; // Ignore case
    
            if ($isCorrect) {
                // Increase marks for correct answers
                $marksObtained += $question->marks;
            }
    
            // Save student answer for each question with the attempt_test_id
            $studentAnswer = new Student_answers();
            $studentAnswer->attempt_test_id = $attempt->id;
            $studentAnswer->question_id = $question->id;
            $studentAnswer->option_id = strtoupper($selectedOptionId); // Store selected option as letter
            $studentAnswer->save();
        }
    
        // Save the obtained marks in the AttemptsTest table
        $attempt->marks_obtained = $marksObtained;
        $attempt->save();
    
        return redirect('testresult')->with('success', 'Test submitted successfully!');
    }
    
    
    // public function testresult()
    // {
    //     $attempts = AttemptsTest::all();
    //     $results = [];
    
    //     foreach ($attempts as $attempt) {
    //         $test = Test::find($attempt->test_id);
    
    //         if (!$test) {
    //             continue; // Skip the iteration if the test is not found
    //         }
    
    //         $total_marks = $test->total_marks;
    //         $subject_id = $test->subject_id;
    //         $passmarks = $test->pass_marks;
    //         $total_mcq = $test->total_mcq;
    
    //         $percentage = $attempt->marks_obtained / $total_marks * 100;
    //         $mark = $attempt->marks_obtained;
    //         $attempt->percentage = $percentage;
    
    //         $results[] = [
    //             'attempt' => $attempt,
    //             'mark' => $mark,
    //             'subject_id' => $subject_id,
    //             'passmarks' => $passmarks,
    //             'total_marks' => $total_marks,
    //             'total_mcq' => $total_mcq,
    //         ];
    //     }
    
    //     $latestResult = end($results);
    
    //     return view('frontend.pages.testresult', compact('latestResult', 'subject_id'));
    // }
    
    
    public function testresult()
    {
        $attempts = AttemptsTest::all();
        $results = [];
    
        foreach ($attempts as $attempt) {
            $test = Test::find($attempt->test_id);
    
            if (!$test) {
                continue; // Skip the iteration if the test is not found
            }
    
            $total_marks = $test->total_marks;
            $subject_id = $test->subject_id;
            $passmarks = $test->pass_marks;
            $total_mcq = $test->total_mcq;
    
            $percentage = $attempt->marks_obtained / $total_marks * 100;
            $mark = $attempt->marks_obtained;
            $attempt->percentage = $percentage;
    
            $results[] = [
                'attempt' => $attempt,
                'mark' => $mark,
                'subject_id' => $subject_id,
                'passmarks' => $passmarks,
                'total_marks' => $total_marks,
                'total_mcq' => $total_mcq,
            ];
        }
    
        $latestResult = end($results);
    
        return view('frontend.pages.testresult', compact('latestResult', 'subject_id'));
    }
    
    
   
}
