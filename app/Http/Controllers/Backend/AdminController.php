<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\backend\Book;
use App\Models\Frontend\IssueBook;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);

        $admins = Admin::all();
        $admins_count = $admins->count();

        $books = Book::all();
        $books_count = $books->count();

        $five_books = Book::orderBy('id', 'desc')->take(5)->get();

        $users = User::all();
        $users_count = $users->count();

        $issue_book =  IssueBook::where('admin_id', $admin_id)->whereNull('book_return_msg')->whereNull('book_return_date')->get();
        $issue_book_count = count($issue_book);
        // return $issue_book_count;
        return view(
            'admin/components/admin_dashbord',
            [
                'loginAdmin' => $loginAdmin,
                'admins_count' => $admins_count,
                'books_count' => $books_count,
                'five_books' => $five_books,
                'users_count' => $users_count,
                'issue_book_count' => $issue_book_count,
            ]
        );
    }

    public function adminAdd()
    {
        return view('admin/components/admin_register');
    }

    public function adminRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // If validation passes, you can proceed to save the data.

        $admin_count = Admin::count();
        $admin = new Admin();
        if ($admin_count >= 1) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = md5($request->password);
            $admin->save();
            return redirect('/admin/login')->with('msg', 'Admin add successfully!');
        } else {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = md5($request->password);
            $admin->status = 'active';
            $admin->save();
            return redirect('/admin/login')->with('msg', 'Admin add successfully!');
        }
    }

    public function showLoginForm()
    {
        return view('admin/components/admin_login');
    }

    public function adminLogin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if ($admin->password == md5($request->password)) {
                // if (password_verify($admin->password, $request->password)) {
                // return 'valid password';
                Session::put(['admin_id' => $admin->id]);
                return redirect('/admin');
            } else {
                return redirect('/admin/login')->with('message', 'Password is not valid!');
            }
        } else {
            return redirect('/admin/login')->with('message', 'Email is not found!');
        }
    }
    public function adminLogout(Request $request)
    {
        $request->session()->flush(); // It's use alert session message file clear
        Session::flush('value');
        return redirect('/admin/login');
    }

    public function allAdmin()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        $admins = Admin::all();
        return view('admin/components/all_admin', ['admins' => $admins, 'loginAdmin' => $loginAdmin]);
    }

    public function adminProfile()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        // $admin = Admin::where('id', $id);
        return view('admin/components/admin_profile', ['loginAdmin' => $loginAdmin]);
    }

    public function adminUpdateForm()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        return view('admin/components/admin_update', ['loginAdmin' => $loginAdmin]);
    }

    public function adminUpdate(Request $request)
    {
        $admin_id = Session::get('admin_id');
        $admin = Admin::find($admin_id);
        $imageName = $request->name . '.' . $request->image->extension();
        // return $imageName;
        $request->image->move(public_path('assets/images/admin'), $imageName);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->image = $imageName;
        $admin->save();
        return redirect('/admin/admin_profile');
    }

    public function adminDelete($id)
    {
        $admin = Admin::find($id);
        $admin->book()->delete();
        $admin->issueBook()->delete();
        $admin->delete();
        $image_path = 'assets/images/admin/' . $admin->image;
        unlink($image_path);
        return redirect('/admin/login');
    }

    public function loginAdminDelete()
    {
        $admin_id = Session::get('admin_id');
        $admin = Admin::find($admin_id);
        $admin->book()->delete();
        $admin->issueBook()->delete();
        $admin->delete();
        $image_path = 'assets/images/admin/' . $admin->image;
        unlink($image_path);
        return redirect('/admin/login');
    }
}
