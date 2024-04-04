<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use DB;
use Auth;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }


    Public function view(){
        return view('backend.pages.setting.changepassword');
    }

    Public function allUseres(){
        $alluseres= User::all();

        return view('backend.pages.users.users',compact('alluseres'));
    }

    public function deleteUser(Request $request,$id){
        $users=User::find($id);
        $users->delete();
         return redirect()->back()->with('warning','User Delete Successfully');

       }

       public function updateStatus(Request $request, $id)
       {


           $user = User::findOrFail($id);
           $user->update(['status' => $request->status]);

           return response()->json(['message' => 'Status updated successfully']);
       }

    public function shoMessages(){
        $contact=Contact::all();
        return view('backend.pages.messages.list',compact('contact'));

    }

    public function delete(Request $request,$id){
       $contact=Contact::find($id);
       $contact->delete();
      return redirect()->back()->with('warning','Message Delete Successfully');

    }




    public function changepassword(Request $request)
    {
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('error', 'The old password is incorrect.');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('admin-dashboard')->with('info', 'Password changed successfully.');
    }

}
