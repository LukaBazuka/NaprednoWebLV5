<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
        'naziv_rada',
        'naziv_rada_eng',
        'zadatak_rada',
        'tip_studija',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
