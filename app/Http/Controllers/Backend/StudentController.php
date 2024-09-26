<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function allUsers()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        $students = User::all();
        return view('admin.components.all_students', ['students' => $students, 'loginAdmin' => $loginAdmin]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->issueBook()->delete();
        $user->delete();
        $image_path = 'assets/images/user/' . $user->image;
        unlink($image_path);
        return redirect()->route('all_student');
        // return back()->with('Delete_msg', 'User delete successfully');
    }

    public function deletedUser()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        $students = User::where('status', 'deleted')->get();
        return view('admin.components.deleted_student', ['students' => $students, 'loginAdmin' => $loginAdmin]);
    }
}
