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
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index',['user'=>$user, 'follows'=>$follows]);
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
          $imageArray = ['image'=>$imagePath];
      }
      auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
      ));
      return redirect("/profile/{$user->id}");
    }
}
