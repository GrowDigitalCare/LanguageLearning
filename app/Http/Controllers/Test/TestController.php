<?php

namespace App\Http\Controllers\Test;

use App\Models\Test;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function show()
    {
        $tests = Test::with('languages')->get();
    
        return view('backend.pages.tests.index', compact('tests'));
    }

    public function view()
    {
        $languages = Language::get();
        // dd($department,$languages);
        return view('backend.pages.tests.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'subject_id' => 'required|exists:subjects,id',
            // 'department_id' => 'required|exists:departments,id',
            // 'title' => 'required|string|max:255',
            // 'description' => 'nullable|string',
            // 'level' => 'required|in:beginner,intermediate,expert',
            // 'time_dur' => 'required|string',
            // 'total_mcq' => 'required|string',
            // 'pass_marks' => 'required|string',
            // 'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slug = Str::slug($request->input('title'));
        $test = Test::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'time_dur' => $request->input('time_dur') ?? 'null',
            'total_mcq' => $request->input('total_mcq'),
            'pass_marks' => $request->input('pass_marks'),
            'total_marks' => $request->input('total_marks'),
            'languageid' => $request->input('languageid'),
            'level' => $request->level ?? 'beginner' ?? 'intermediate' ?? 'expert',
        ]);

        return redirect()->route('test-list')->with('info', 'Test Added Successfully');
    }
   

    public function edit($id){

    
        // Find the test
        $test = Test::find($id);
    
        // Get all languages
        $languages = Language::all();
    
        return view('backend.pages.tests.edit', compact('languages', 'test'));
    }
    
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'languageid' => 'required|exists:languages,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'required|in:beginner,intermediate,expert',
            'time_dur' => 'nullable|string',
            'total_mcq' => 'required|string',
            'pass_marks' => 'required|string',
            'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $test = Test::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $test->title = $request->input('title');
        $test->slug = $slug;
        $test->description = $request->input('description');
        $test->time_dur = $request->input('time_dur') ?? 'null';
        $test->total_mcq = $request->input('total_mcq');
        $test->pass_marks = $request->input('pass_marks');
        $test->languageid = $request->input('languageid');
        $test->level = $request->level ?? 'beginner' ?? 'intermediate' ?? 'expert';

        $test->Update();

        return redirect()->route('test-list')->with('info', 'Test Updated Successfully');
    }



    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $test = Test::find($del);
       
        $test->delete();
        
        return redirect()->back()->with('warning', ' Test Deleted  Successfully');
    }



    // public function getlanguages($departmentId)
    // {
    //     $languages = Language::pluck('name', 'id');
    //     return response()->json($languages);
    // }
}