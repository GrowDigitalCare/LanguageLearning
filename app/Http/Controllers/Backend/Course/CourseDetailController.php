<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\Instructor;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseDetailController extends Controller
{
    public  function view(){
        $language=Language::all();
        $course=Course::all();
        $instructor=Instructor::all();
        return view('backend.pages.course.coursedetail.create',compact('language','course','instructor'));
    }



    public  function show(){
        $coursedetails=CourseDetail::all();
        return view('backend.pages.course.coursedetail.list',compact('coursedetails'));
    }




    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|exists:languages,id',
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'course_description' => 'required',
            'what_you_will_learn' => 'required',
            'certification_description' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }





        $coursedetail = CourseDetail::create([
            'language_id' => $request->input('language_id'),
            'course_id' => $request->input('course_id'),
            'instructor_id' => $request->input('instructor_id'),
            'course_description' => $request->input('course_description'),
            'what_you_will_learn' => $request->input('what_you_will_learn'),
            'certification_description' =>$request->input('certification_description'),

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/coursedetail/', $filename);

            $coursedetail->image = $filename;
            $coursedetail->save();
        }

        return redirect()->route('coursedetail-list')->with("info", "Course Details Added Successfully!!!");
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $coursedetails = CourseDetail::find($del);
        $path='uploads/coursedetail/'.$coursedetails->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $coursedetails->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }






    public function edit($id)
    {
        $language=Language::all();
        $course=Course::all();
        $instructor=Instructor::all();
        $coursedetail = CourseDetail::findOrFail($id);

        return view('backend.pages.course.coursedetail.edit', compact('language', 'course', 'coursedetail','instructor'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|exists:languages,id',
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'course_description' => 'required',
            'what_you_will_learn' => 'required',
            'certification_description' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $coursedetail = CourseDetail::findOrFail($id);




        $coursedetail->update([
            'language_id' => $request->input('language_id'),
            'course_id' => $request->input('course_id'),
            'instructor_id' => $request->input('instructor_id'),
            'course_description' => $request->input('course_description'),
            'what_you_will_learn' => $request->input('what_you_will_learn'),
            'certification_description' =>$request->input('certification_description'),

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/coursedetail/', $filename);

            $coursedetail->image = $filename;
            $coursedetail->save();
        }

        return redirect()->route('coursedetail-list')->with("info", "Course Details Updated Successfully!!!");
    }
}
