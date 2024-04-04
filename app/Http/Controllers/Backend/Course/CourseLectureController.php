<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseLectureController extends Controller
{
    public  function view(){
        $course=Course::all();
        return view('backend.pages.course.lectures.create',compact('course'));
    }

    public  function show(){
        $lectures=CourseLecture::all();
        return view('backend.pages.course.lectures.index',compact('lectures'));
    }




    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'course_id' => 'required|exists:courses,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'video_link' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $cleanDescription = strip_tags($request->input('description'));




        $lecture = CourseLecture::create([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'video_link' => $request->input('video_link'),
            'description' => $request->input('description'),


        ]);

        // dd($lecture);



        return redirect()->route('lecture-list')->with("info", "Course Details Added Successfully!!!");
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $lecture = CourseLecture::find($del);

        $lecture->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }






    public function edit($id)
    {

        $course = Course::all();
        $lecture = CourseLecture::findOrFail($id);
        return view('backend.pages.course.lectures.edit', compact('lecture', 'course'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'video_link' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lecture = CourseLecture::findOrFail($id);

        //$cleanDescription = strip_tags($request->input('description'));


        $lecture->update([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'video_link' => $request->input('video_link'),
            'description' => $request->input('description'),

        ]);



        return redirect()->route('lecture-list')->with("info", "Course Details Updated Successfully!!!");
    }
}
