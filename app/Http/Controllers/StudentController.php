<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function loadOnScroll(Request $request)
    {
        $posts = Student::paginate(10);

        if($request->ajax()){
            $view = view('student-data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('display-students', compact('posts'));
    }
}
