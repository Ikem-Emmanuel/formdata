<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Department;
use App\Faculty;
use App\Classes;
use App\Http\Resources\Classes as ClassesResources;
use App\Http\Resources\Degree as DegreeResources;
use App\Http\Resources\Department as DepartmentResources;
use App\Http\Resources\University as UniversityResource;
use App\Http\Resources\Faculty as FacultyResource;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests;

class FormsController extends Controller
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
}
