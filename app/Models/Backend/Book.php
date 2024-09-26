<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\Admin;
use App\Models\Frontend\IssueBook;

class Book extends Model
{
    use SoftDeletes;
    protected $table = "books";

    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
