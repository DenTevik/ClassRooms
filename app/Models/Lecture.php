<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['theme', 'description'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_lecture');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_lecture');
    }
}
