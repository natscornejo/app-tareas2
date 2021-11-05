<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    //Relacion uno a muchos
    public function tasks() {

        return $this->hasMany(Task::class, 'project_id', 'id');
    }


    //Relacion muchoS a muchos
    public function users(){

        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');

    }
}