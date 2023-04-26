<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;



class StudentRegisterController extends Controller
{

    public function show()
    {
        return view('auth.student-register');
    }

    public function register(StudentRegisterRequest $request) 
    {
        $student = Student::create($request->validated());

        auth()->login($student);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
