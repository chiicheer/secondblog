<?php

namespace App\Http\Controllers;

//use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile')->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url'
        ]);

       // dd($request->all());

        $user = Auth::user();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time(). $avatar->getClientOriginalName();

            $avatar->move('uploads/avatar', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatar/'. $avatar_new_name;

            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        if($request->has('password')){

            $user->password = bcrypt($request->password);

            $user->save();
        }

        Session::flash('success', 'Account profile updated successfully');

        return redirect()->back();
    }

}
