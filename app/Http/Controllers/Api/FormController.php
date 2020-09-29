<?php

namespace App\Http\Controllers\Api;

use App\Classes;
use App\Degree;
use App\Department;
use App\Faculty;
use App\Http\Controllers\Controller;
use App\Http\Resources\Classes as ClassesResources;
use App\Http\Resources\Degree as DegreeResources;
use App\Http\Resources\Department as DepartmentResources;
use App\Http\Resources\Faculty as FacultyResource;
use App\Http\Resources\University as UniversityResource;
use App\Student;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function home(){
        return view('home');
    }
    public function index(){
        $universityModel = University::all();
        $facultyModel = Faculty::all();
        $classesModel = Classes::all();
        $degreeModel = Degree::all();
        $departmentModel = Department::all();
        $universities = UniversityResource::collection($universityModel);
        $classes = ClassesResources::collection($classesModel);
        $degree = DegreeResources::collection( $degreeModel);
        $department = DepartmentResources::collection( $departmentModel);
        $faculties = FacultyResource::collection($facultyModel);
        return (['universities'=>$universities, 'faculties'=>$faculties, 'classes'=>$classes, 'degree'=>$degree, 'department'=>$department]);
    }

    public function store(Request $request){
        $val = Validator::make($request->all(),
            [
                'lastname' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'class' => 'required',
                'dateOfbirth' => 'required',
                'degree' => 'required',
                'department' => 'required',
                'faculty' => 'required',
                'university_name' => 'required',
                'yearOfAdmission' => 'required',
                'yearOfgraduation' => 'required',
            ]
        );

        // process the login
        if ($val->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $val->errors()
            ], 422);
        }
        $students = new Student;
        $students->firstname = $request->firstname;
        $students->lastname = $request->lastname;
        $students->middlename = $request->middlename;
        $students->university = $request->university_name;
        $students->graduation_year = $request->yearOfgraduation;
        $students->faculty = $request->faculty;
        $students->department = $request->department;
        $students->degree = $request->degree;
        $students->class = $request->class;
        $students->admission_year = $request->yearOfAdmission;
        $students->date_of_birth = $request->dateOfbirth;
        $students->save();
        return response()->json(['status' => 'success'], 200);
    }
}
