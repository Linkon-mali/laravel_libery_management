@extends('frontend.layouts.app')

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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li><a href="javascript: avoid(0)"> Student Update</a></li>
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
                        <form action="{{url('update_student')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="book_name">Name</label>
                                <input type="text" class="form-control" name="name" id="book_name" value="{{ $student->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Image</label>
                                <span>
                                    @if(Auth::user()->image)
                                    <img style="width: 100px;" alt="profile photo" src="{{ asset('/') }}assets/images/user/{{Auth::user()->image}}" />
                                    @else
                                    <img style="width: 100px" alt=" profile photo" src="{{ asset('/') }}assets/images/user/people.png" />
                                    @endif
                                </span>
                                <input type="file" class="form-control" id="image" name="image" value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}">
                            </div>
                            <div class="form-group">
                                <label for="text">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $student->phone }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="book_add" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    @endsection