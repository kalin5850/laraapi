<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student as Student;

class ApiController extends Controller
{
    public function getAllStudents(Request $request)
    {
        $isGet = $request->isMethod('GET');
        if ( !$isGet ) {
            return response('Method Not Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $students = Student::all();
        if (!count($students)) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }
        $students = $students->toJson(JSON_PRETTY_PRINT);

        return response($students, 200)
            ->header('Content-Type', 'application/json');
    }

    public function getStudent(Request $request, $id)
    {
        $isGet = $request->isMethod('GET');
        if ( !$isGet ) {
            return response('Method Not Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $student = Student::where('id', $id)->get();
        if (!count($student)) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }
        $student = $student->toJson(JSON_PRETTY_PRINT);

        return response($student, 200)
            ->header('Content-Type', 'application/json');
    }

    public function createStudent(Request $request)
    {
        $isPost = $request->isMethod('POST');
        if (!$isPost) {
            return response('Method Now Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $var = $request->post();
        if (!count($var)) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        } elseif (!isset($var['name']) || !isset($var['course'])) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }

        $student = new Student();
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function updateStudent(Request $request, $id)
    {
        $isPut = $request->isMethod('PUT');
        if (!$isPut) {
            return response('Method Now Allowed', 405)
                ->header('Content-Type', 'application/json');
        }

       if(Student::where('id', $id)->exists()) {
           $student = Student::find($id);
           $student->name = is_null($request->name) ? $student->name : $request->name;
           $student->course = is_null($request->course) ? $student->course : $request->course;
           $student->updated_at = time();
           $student->save();

           return response()->json([
               "message" => "records updated successfully"
           ], 200);
       } else {
           return response()->json([
               "message" => "Student not found"
           ], 404);
       }
    }

    public function deleteStudent(Request $request, $id)
    {
        $isDelete = $request->isMethod('DELETE');
        if (!$isDelete) {
            return response('Method Now Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
