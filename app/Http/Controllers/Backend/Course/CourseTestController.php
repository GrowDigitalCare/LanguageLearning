<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseTestController extends Controller
{
    public function show()
    {
        $tests = CourseTest::with('lectures')->get();
        return view('backend.pages.course.tests.index', compact('tests'));
    }

    public function view()
    {
        $courses=Course::get();
        $lectures = CourseLecture::get();
        return view('backend.pages.course.tests.create', compact('courses','lectures'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'lecture_id' => 'required|exists:course_lectures,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_dur' => 'required|string',
            'total_mcq' => 'required|string',
            'pass_marks' => 'required|string',
            'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $test = CourseTest::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'time_dur' => $request->input('time_dur'),
            'total_mcq' => $request->input('total_mcq'),
            'pass_marks' => $request->input('pass_marks'),
            'total_marks' => $request->input('total_marks'),
            'course_id' => $request->input('course_id'),
            'lecture_id' => $request->input('lecture_id'),

        ]);

        return redirect()->route('test-list')->with('info', 'Test Added Successfully');
    }


    public function edit($id){
        // Find the department
        $courses = Course::all();

        // Find the test
        $test = CourseTest::find($id);

        // Get all subjects
        $lectures =CourseLecture ::all();

        return view('backend.pages.course.tests.edit', compact('courses', 'test', 'lectures'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'lecture_id' => 'required|exists:course_lectures,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_dur' => 'required|string',
            'total_mcq' => 'required|string',
            'pass_marks' => 'required|string',
            'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $test = CourseTest::findOrFail($id);

//   $cleanDescription = strip_tags($request->input('description'));
        $test->title = $request->input('title');
        $test->description = $request->input('description');
        $test->time_dur = $request->input('time_dur');
        $test->total_mcq = $request->input('total_mcq');
        $test->pass_marks = $request->input('pass_marks');
        $test->total_marks = $request->input('total_marks');
        $test->course_id = $request->input('course_id');
        $test->lecture_id = $request->input('lecture_id');

        $test->Update();

        return redirect()->route('test-list')->with('info', 'Test Updated Successfully');
    }



    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $test = CourseTest::find($del);

        $test->delete();

        return redirect()->back()->with('warning', ' Test Deleted  Successfully');
    }



    public function getlecture($courseId)
{
    $course = Course::find($courseId);

    if (!$course) {
        return response()->json(['error' => 'Course not found'], 404);
    }

    $lectures = $course->lectures()->pluck('title', 'id');

    return response()->json($lectures);
}

}
