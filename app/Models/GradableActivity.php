<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradableActivity extends Model
{
    protected $fillable = [
        'subject_ID',
        'tipo',
        'grade',
        'fecha_actividad',
        'descripcion'
    ];
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
