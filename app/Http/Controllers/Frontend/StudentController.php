<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function allStudent()
    {
        $students = User::all();
        return view('frontend.components.all_user', ['students' => $students]);
    }

    public function studentProfile()
    {
        $id = Auth::user()->id;
        $student = User::find($id);
        return view('frontend.components.user_profile', ['student' => $student]);
    }

    public function studentEdit()
    {
        $id = Auth::user()->id;
        $student = User::find($id);
        return view('frontend.components.update_student', ['student' => $student]);
    }

    public function updateStudent(Request $request)
    {
        $user_id = Auth::user()->id;
        $student = User::where('id', $user_id)->first();
        $imageName = $request->name . '.' . $request->image->extension();
        // return $imageName;
        $request->image->move(public_path('assets/images/user'), $imageName);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->image = $imageName;
        $student->save();
        return redirect('/student_profile');
    }
    public function deleteStudent()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->status = 'deleted';
        $user->save();
        Session::flush('value');
        return redirect()->route('all_student');
    }
}
