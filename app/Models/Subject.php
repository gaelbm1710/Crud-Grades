<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    public function gradableActivities(){
        return $this->hasMany(GradableActivity::class, 'subject_id'); 
    }
}

