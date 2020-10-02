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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

    private function tableSchema ($data){
        $table_name = $data['username'].'_'.$data['university_name'].'_'.$data['yearOfgraduation'];
        if(Schema::hasTable($table_name)){
            DB::table($table_name)->insert(
                [
                    'lastname' => $data['firstname'],
                    'firstname' => $data['lastname'],
                    'middlename' => $data['middlename'],
                    'class' => $data['class'],
                    'date_of_birth' => $data['dateOfbirth'],
                    'degree' => $data['degree'],
                    'department' => $data['department'],
                    'faculty' => $data['faculty'],
                    'university' => $data['university_name'],
                    'admission_year' => $data['yearOfAdmission'],
                    'graduation_year' => $data['yearOfgraduation'],
                ]
            );
        }
        else{
            DB::statement("CREATE TABLE $table_name LIKE students");

        }
        return response()->json(['status' => 'success'], 200);
    }

    private function tableStructure (){
        return "
           (`id` int(11) NOT NULL AUTO_INCREMENT,
          `firstname` varchar(45) DEFAULT NULL,
          `lastname` varchar(45) DEFAULT NULL,
          `middlename` varchar(45) DEFAULT NULL,
          `university` int(11) DEFAULT NULL,
          `graduation_year` int(11) DEFAULT NULL,
          `faculty` int(11) DEFAULT NULL,
          `department` int(11) DEFAULT NULL,
          `degree` int(11) DEFAULT NULL,
          `class` int(11) DEFAULT NULL,
          `yearOfAdmission` int(11) DEFAULT NULL,
          `date_of_birth` date DEFAULT NULL,
          PRIMARY KEY (`id`),
          KEY `student_university` (`university`),
          KEY `student_graduating_year` (`graduation_year`),
          KEY `student_faculty` (`faculty`),
          KEY `student_department` (`department`),
          KEY `student_degree` (`degree`),
          KEY `student_class` (`class`),
          CONSTRAINT `student_class` FOREIGN KEY (`class`) REFERENCES `classes` (`id`),
          CONSTRAINT `student_degree` FOREIGN KEY (`degree`) REFERENCES `degrees` (`id`),
          CONSTRAINT `student_department` FOREIGN KEY (`department`) REFERENCES `departments` (`id`),
          CONSTRAINT `student_faculty` FOREIGN KEY (`faculty`) REFERENCES `faculties` (`id`),
          CONSTRAINT `student_university` FOREIGN KEY (`university`) REFERENCES `universities` (`id`)
        )";
    }
    public function store(Request $request){

        $val = Validator::make($request->all(),
            [
                'lastname' => 'required',
                'firstname' => 'required',
                'username' => 'required',
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
        $this->tableSchema($request->except('_token'));

//        $students = new Student;
//        $students->firstname = $request->firstname;
//        $students->lastname = $request->lastname;
//        $students->middlename = $request->middlename;
//        $students->university = $request->university_name;
//        $students->graduation_year = $request->yearOfgraduation;
//        $students->faculty = $request->faculty;
//        $students->department = $request->department;
//        $students->degree = $request->degree;
//        $students->class = $request->class;
//        $students->admission_year = $request->yearOfAdmission;
//        $students->date_of_birth = $request->dateOfbirth;
//        $students->save();
//        return response()->json(['status' => 'success'], 200);
    }
}
