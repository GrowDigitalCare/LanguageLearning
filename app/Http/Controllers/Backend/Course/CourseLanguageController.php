<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseLanguageController extends Controller
{
    public function show()
    {
        $language = Language::all();
        return view('backend.pages.course.language.index', compact('language'));
    }

    public function view()
    {
        return view('backend.pages.course.language.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $slug = Str::slug($request->input('name'));
        // $cleanDescription = strip_tags($request->input('short_description'));
       $language= Language::create([
         'name'=>$request->input('name'),
         'slug'=>$slug,
        ]);

        if ($request->hasFile('image')) {
            // Handle image upload only if it's present in the request
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/language/', $filename);

            $language->image = $filename;
            $language->save();
        }

        return redirect()->route('language-list')
            ->with('info', 'Language created successfully');
    }

    public function edit($id)
    {
        $language=Language::find($id);
        return view('backend.pages.course.language..edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',

            'image' => 'nullable|mimes:jpg,jpeg,png',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $language = Language::findOrFail($id);

        $slug = Str::slug($request->input('name'));



        $language->name = $request->input('name');
        $language->slug=$slug;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/language/', $filename);

            // Delete the previous image file if it exists
            if (!empty($coursecategory->image)) {
                $oldImagePath = 'uploads/language/' . $language->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $language->image = $filename;
        }

        $language->save();

        return redirect()->route('language-list')->with('info', 'Language Updated Successfully');
    }


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $language = Language::find($del);
        $path='uploads/language/'.$language->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $language->delete();
        return redirect()->back()->with('warning', 'Language Deleted  Successfully');
    }
}
