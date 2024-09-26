<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Book;
use App\Models\Frontend\IssueBook;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function allBook()
    {
        $delete_books = IssueBook::where('book_return_date', '<', now()->subMinutes(1))->get();
        foreach ($delete_books as $delete_book) {
            // $delete_book->delete();
            $delete_book->forceDelete();
        }

        $books = Book::with('admins')->where('av_quantity', '>', 0)->get();
        return view('frontend.components.all_book', ['books' => $books]);
    }

    public function issueBook($book_id, $admin_id)
    {
        $user_id = Auth::user()->id;
        $issue_book = new IssueBook();
        $issue_book->user_id = $user_id;
        $issue_book->book_id = $book_id;
        $issue_book->admin_id = $admin_id;
        $issue_book->save();
        if ($issue_book) {
            $data = Book::where('id', $book_id)->first();
            $data->av_quantity = $data->av_quantity - 1;
            $data->save();
            return redirect('/browed_book');
        }
    }

    public function borwedBook()
    {
        $user_id = Auth::user()->id;
        $values = IssueBook::select('*')
            ->with('admin', 'book')
            ->where('user_id', '=', $user_id)
            ->whereNull('book_return_date')
            ->get();
        // return $values;
        return view('frontend.components.browed_book', ['values' => $values]);
    }

    public function returnBook($id)
    {
        $return_book = IssueBook::where('id', $id)->first();
        $return_book->book_return_date = date('Y-m-d H:i:s');
        $return_book->save();
        if ($return_book) {
            $data = Book::where('id', $return_book->book_id)->first();
            $data->av_quantity = $data->av_quantity + 1;
            $data->save();
            return redirect('/return_book');
        }
    }

    public function returnBookList()
    {
        $user_id = Auth::user()->id;
        $values = IssueBook::select('*')
            ->with('admin', 'book')
            ->where('user_id', '=', $user_id)
            ->whereNotNull('book_return_date')
            // ->whereNull('book_return_msg')
            ->get();
        // return $values;
        return view('frontend.components.return_book', ['values' => $values]);
    }
}
