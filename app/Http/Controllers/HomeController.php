<?php

namespace App\Http\Controllers;

use App\Models\Backend\Admin;
use App\Models\backend\Book;
use App\Models\Frontend\IssueBook;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admins = Admin::all();
        $admins_count = $admins->count();

        $books = Book::all();
        $books_count = $books->count();

        $five_books = Book::orderBy('id', 'desc')->take(5)->get();

        $users = User::all();
        $users_count = $users->count();
        $issue_book =  IssueBook::whereNotNull('book_return_msg')->whereNull('book_return_date')->get();
        $issue_book_count = count($issue_book);
        // return $issue_book_count;
        return view(
            'frontend.components.user_dashboard',
            [
                'admins_count' => $admins_count,
                'books_count' => $books_count,
                'five_books' => $five_books,
                'users_count' => $users_count,
                'issue_book_count' => $issue_book_count,
            ]
        );
    }
}
