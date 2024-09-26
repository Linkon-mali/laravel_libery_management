<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\backend\Book;
use App\Models\Frontend\IssueBook;
use App\User;

class Admin extends Model
{
    use SoftDeletes;
    protected $table = "admins";

    public function books()
    {
        return $this->hasMany(Book::class)->seclect('id', 'name');
    }
    // Admin Delete Relation Below
    public function book()
    {
        return $this->hasOne(Book::class);
    }
    public function issueBook()
    {
        return $this->hasOne(IssueBook::class);
    }
}
