<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\CreateLectureRequest;
use App\Http\Requests\CreateUpdateClassroomPlanRequest;
use App\Http\Requests\DeleteClassroomRequest;
use App\Http\Requests\DeleteLectureRequest;
use App\Http\Requests\DeleteStudentRequest;
use App\Http\Requests\GetClassroomPlanRequest;
use App\Http\Requests\GetClassroomRequest;
use App\Http\Requests\GetLectureRequest;
use App\Http\Requests\GetStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Lecture;
use App\Models\Student;

class ApiController extends Controller
{
    // Students
    public function getStudents()
    {
        return Student::all();
    }

    public function getStudent(GetStudentRequest $request)
    {
        return Student::where(['id' => $request->id])->with('classroom')->with('lectures')->get();
    }

    public function createStudent(StoreStudentRequest $request)
    {
        $student = Student::create([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        if ($student) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function updateStudent(UpdateStudentRequest $request)
    {
        $student = Student::where(['id' => $request->id])->update([
            'name'         => $request->name,
            'classroom_id' => $request->classroom_id,
        ]);
        if ($student) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function deleteStudent(DeleteStudentRequest $request)
    {
        $student = Student::where(['id' => $request->id])->delete();
        if ($student) {
            return ['errors' => false, 'message' => 'Student has been deleted'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }


    // Classrooms
    public function getClassrooms()
    {
        return Classroom::all();
    }

    public function getClassroom(GetClassroomRequest $request)
    {
        return Classroom::where(['id' => $request->id])->with('students')->get();
    }

    public function getClassroomPlan(GetClassroomPlanRequest $request)
    {
        return Classroom::where(['id' => $request->id])->with('lectures')->get();
    }

    public function createUpdateClassroomPlan(CreateUpdateClassroomPlanRequest $request)
    {
        \DB::table('classroom_lecture')->where(['classroom_id' => $request->classroom_id])->delete();
        $insert = \DB::table('classroom_lecture')->insert($request->lectures);
        if ($insert) {
            return ['errors' => false, 'message' => 'Data has been updated'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function createClassroom(CreateClassroomRequest $request)
    {
        $classroom = Classroom::create([
            'name' => $request->name,
        ]);
        if ($classroom) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function updateClassroom(UpdateClassroomRequest $request)
    {
        $classroom = Classroom::where(['id' => $request->id])->update([
            'name' => $request->name,
        ]);
        if ($classroom) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function deleteClassroom(DeleteClassroomRequest $request)
    {
        $classroom = Classroom::where(['id' => $request->id])->delete();
        if ($classroom) {
            return ['errors' => false, 'message' => 'Classroom has been deleted'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    // Lectures
    public function getLectures()
    {
        return Lecture::all();
    }

    public function createLecture(CreateLectureRequest $request)
    {
        $lecture = Lecture::create([
            'theme'       => $request->theme,
            'description' => $request->description,
        ]);
        if ($lecture) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function updateLecture(UpdateLectureRequest $request)
    {
        $lecture = Lecture::where(['id' => $request->id])->update([
            'theme'       => $request->theme,
            'description' => $request->description,
        ]);
        if ($lecture) {
            return ['errors' => false, 'message' => 'Data has been saved'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function deleteLecture(DeleteLectureRequest $request)
    {
        $lecture = Lecture::where(['id' => $request->id])->delete();
        if ($lecture) {
            return ['errors' => false, 'message' => 'Lecture has been deleted'];
        } else {
            return ['errors' => false, 'message' => 'Operation failed'];
        }
    }

    public function getLecture(GetLectureRequest $request)
    {
        return Lecture::where(['id' => $request->id])->with('students')->with('classrooms')->get();
    }
}
