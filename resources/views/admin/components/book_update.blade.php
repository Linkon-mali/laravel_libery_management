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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin') }}">Dashboard</a></li>
                <li><a href="javascript: avoid(0)"> Book Update</a></li>
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
                        <form action="{{route('update_book')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="book_name">Name</label>
                                <input type="text" class="form-control" name="name" id="book_name" value="{{ $book->name }}">
                                <input type="hidden" class="form-control" name="id" value="{{ $book->id }}">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="{{ $book->author }}">
                            </div>
                            <div class="form-group">
                                <label for="text">Publication</label>
                                <input type="text" class="form-control" name="publication" id="publication" value="{{ $book->publication }}">
                            </div>
                            <div class="form-group">
                                <label for="text">Quantity</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $book->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="text">AV Quantity</label>
                                <input type="text" class="form-control" name="av_quantity" id="av_quantity" value="{{ $book->av_quantity }}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="text">Image: </label>
                                <span>
                                    @if($loginAdmin->image)
                                    <img style="width: 100px;" alt="profile photo" src="{{ asset('/') }}assets/images/admin/{{$loginAdmin->image}}" />
                                    @else
                                    <img style="width: 100px" alt=" profile photo" src="{{ asset('/') }}assets/images/admin/people.png" />
                                    @endif
                                </span>
                                <input type="file" class="form-control" name="image" id="image" value="">
                            </div> -->
                            <div class="form-group">
                                <button type="submit" name="book_add" class="btn btn-primary">Update Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    @endsection