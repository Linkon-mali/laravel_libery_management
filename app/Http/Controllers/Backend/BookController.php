<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Book;
use App\Models\Backend\Admin;
use App\Models\Frontend\IssueBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{

    public function addBook()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        return view('admin.components.add_book', ['loginAdmin' => $loginAdmin]);
    }

    public function createBook(Request $request)
    {
        $admin_id = Session::get('admin_id');
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->quantity = $request->quantity;
        $book->av_quantity = $request->av_quantity;
        $book->admin_id = $admin_id;
        $book->save();
        return redirect()->route('all_book')->with('Add_msg', 'Book added successfully');
    }

    public function allBook()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);

        if ($loginAdmin->status == 'active') {
            $books = Book::with('admins')->get();
            return view('admin.components.all_book', ['books' => $books, 'loginAdmin' => $loginAdmin]);
        } else {
            $books = Book::with('admins')->where('admin_id', $admin_id)->get();
            return view('admin.components.all_book', ['books' => $books, 'loginAdmin' => $loginAdmin]);
        }
    }

    public function editBookForm($id)
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);

        $book = Book::find($id);
        return view('admin.components.book_update', ['book' => $book, 'loginAdmin' => $loginAdmin]);
    }

    public function editBook(Request $request)
    {
        $id = $request->id;
        $book = Book::find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->quantity = $request->quantity;
        $book->av_quantity = $request->av_quantity;
        $book->save();
        return redirect()->route('all_book')->with('Edit_msg', 'Book edit successfully');
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->delete();
        return back()->with('Delete_msg', 'Book delete successfully');
    }

    public function browedBook()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        $values = IssueBook::select('*')
            ->with('admin', 'book', 'user')
            ->whereNull('book_return_date')
            ->get();
        // return $values;
        return view('admin.components.browed_book', ['values' => $values, 'loginAdmin' => $loginAdmin]);
    }

    public function returnBookMsg($id)
    {
        $issueBook = IssueBook::find($id);
        $issueBook->book_return_msg = 'Return Soon';
        $issueBook->save();
        return back();
    }

    public function returnBookList()
    {
        $admin_id = Session::get('admin_id');
        $loginAdmin = Admin::find($admin_id);
        $values = IssueBook::select('*')
            ->with('admin', 'book', 'user')
            ->whereNotNull('book_return_date')
            ->get();
        // return $values;
        return view('admin.components.return_book', ['values' => $values, 'loginAdmin' => $loginAdmin]);
    }
}
