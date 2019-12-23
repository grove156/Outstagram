<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];

    public function profileImage()
    {
      $imagePath = ($this->image) ?  $this->image : 'profile/8Yy0mtmSN1isz4Ws6fGo8O5XfHW3BIGALJbmI6lt.jpeg';
      return '/storage/' . $imagePath;
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function followers()
    {
      return $this->belongsToMany(User::class);
    }
}
