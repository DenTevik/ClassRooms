<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'classroom_id'];

    public function classroom()
    {
        return $this->hasOne(Classroom::class, 'id', 'classroom_id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'student_lecture');
    }

}
