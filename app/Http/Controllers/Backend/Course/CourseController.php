<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function show()
    {
        $course = Course::all();
        return view('backend.pages.course.courses.index', compact('course'));
    }

    public function view()
    {

        $language = Language::all();
        return view('backend.pages.course.courses.create',compact('language'));
    }





    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|exists:languages,id',
            'title' => 'required|string',
            'course_duration' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
            'level' => 'required|in:Basic,Intermediate,Expert',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->input('title'));
        // $cleanDescription = strip_tags($request->input('description'));
        $course = Course::create([
            'language_id' => $request->input('language_id'),
            'title' => $request->input('title'),
            'slug' => $slug,
            'course_duration' => $request->input('course_duration'),
            'level' => $request->input('level') ?? 'Basic',
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/course/', $filename);

            $course->image = $filename;
            $course->save();
        }

        return redirect()->route('course-list')->with("info", "Course  Added Successfully!!!");
    }

    public function edit($id)
    {
        $course = Course::with('language')->find($id);
        $language = Language::all();

        // dd($categories, $subcategory);
        return view('backend.pages.course.courses.edit', compact('course', 'language'));
    }




    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'language_id' => 'required|exists:languages,id',
            'title' => 'required|string',
            'course_duration' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
            'level' => 'required|in:Basic,Intermediate,Expert',
            'price' => 'required|numeric',
            'description' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $course = Course::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        // $cleanDescription = strip_tags($request->input('description'));
       $course->title = $request->input('title');
       $course->course_duration = $request->input('course_duration');
       $course->language_id = $request->language_id;
       $course->level = $request->level ?? 'Basic' ?? 'Intermediate' ?? 'Expert';
       $course->price = $request->input('price');

       $course->slug=$slug;
       $course->description =  $request->input('description');

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/course/', $filename);

        // Delete the previous image file if it exists
        if (!empty($course->image)) {
            $oldImagePath = 'uploads/course/' . $course->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $course->image = $filename;
    }

    $course->update();

        return redirect()->route('course-list')->with('info', 'Course Updated Successfully');
    }


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $course = Course::find($del);
        $path='uploads/course/'.$coursetopic->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $course->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
}
