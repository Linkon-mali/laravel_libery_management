@extends('admin.layouts.app')

@section('content')
<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('admin') }}">Dashboard</a></li>
                <li><a href="javascript: avoid(0)"> Add Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12 col-lg-12">
            <div class="box col-sm-6 col-sm-offset-3">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form action="{{route('create_book')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" name="name" id="book_name" placeholder="Book Name">
                            </div>
                            <div class="form-group">
                                <label for="book_author_name">Book Author Name</label>
                                <input type="text" class="form-control" name="author" id="book_author_name" placeholder="Book Author Name">
                            </div>
                            <div class="form-group">
                                <label for="book_pb_name">Book PB Name</label>
                                <input type="text" class="form-control" name="publication" id="book_pb_name" placeholder="Book Publication Name">
                            </div>
                            <div class="form-group">
                                <label for="book_qty">Book Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="book_qty" placeholder="Book Quantity">
                            </div>
                            <div class="form-group">
                                <label for="book_ab_qty">Book AB Quantity</label>
                                <input type="number" class="form-control" name="av_quantity" id="book_ab_qty" placeholder="Book Available Quantity">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="book_add" class="btn btn-primary">Add Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    @endsection