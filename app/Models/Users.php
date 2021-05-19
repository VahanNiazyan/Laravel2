<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //use HasFactory;

    protected $fillable = ['fname','lname','email','password'];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
