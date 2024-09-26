<?php

namespace App\Models\Frontend;

use App\Models\Backend\Admin;
use App\Models\backend\Book;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueBook extends Model
{
    use SoftDeletes;
    protected $table = 'issue_books';

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
