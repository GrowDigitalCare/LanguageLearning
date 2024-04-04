<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\City;
use App\Models\School;
 use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function view(){
        return view('frontend.pages.auth.login');
    }


 


public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
      
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'google_id' => 'nullable|string',
        'facebook_id' => 'nullable|string',
        'password' => 'required|min:8',
       
    ]);

    // Handle profile image upload
    $filename = null;
    if ($request->hasFile('profile_image')) {
        $file = $request->file('profile_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('uploads/Students/', $filename);
    }


  
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone_number' => $request->phone_number,
        
        'role' => 'Student',
        'google_id' => $request->google_id,
        'facebook_id' => $request->facebook_id,
        'profile_image' => $filename,
        'status' => 'active',
     
    ]);

    // Manually send the email verification notification
    // $user->sendEmailVerificationNotification();

    // Redirect to the registration form with a message
    return redirect('register')->with('message', 'Account Has Been Created.');
}


    

}
