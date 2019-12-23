<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles.index',['user'=>$user,]);
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
      $this->authorize('update', $user->profile);
      $data = request()->validate([
          'title'=>'required',
          'description'=>'required',
          'url'=>'url',
          'image'=>'',
      ]);

      if(request('image')){
          $imagePath = request('image')->store('profile','public');
      }
      auth()->user()->profile->update(array_merge(
        $data,
        ['image'=>$imagePath]
      ));
      return redirect("/profile/{$user->id}");
    }
}
