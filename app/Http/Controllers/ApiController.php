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
        if (empty($students->get('item'))) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }
        $students = Student::all()->toJson(JSON_PRETTY_PRINT);

        return response($students, 200)
            ->header('Content-Type', 'application/json');
    }

    public function getStudent($id)
    {
        echo $id;
    }

    public function createStudent(Request $request)
    {

    }

    public function updateStudent(Request $request, $id)
    {

    }

    public function deleteStudent($id)
    {

    }
}
