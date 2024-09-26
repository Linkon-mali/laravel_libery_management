@extends('frontend.layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('dashbord') }}">Dashboard</a></li>
                <li><a href="javascript: avoid(0)">Return Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle">
                @if (session('Delete_msg'))
                <div style="margin-bottom: 0px;" class="alert alert-danger">{{ session('Delete_msg') }}</div>
                @endif
            </h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>publication</th>
                                    <th>Liberyan</th>
                                    <th>Quantity</th>
                                    <th>AV Quantity</th>
                                    <th>Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{$id = 1}}
                                @foreach($values as $value)
                                <tr>
                                    <td>{{$id}}</td>
                                    <td>{{$value->book->name}}</td>
                                    <td>{{$value->book->author}}</td>
                                    <td>{{$value->book->publication}}</td>
                                    <td>{{$value->admin->name}}</td>
                                    <td>{{$value->book->quantity}}</td>
                                    <td>{{$value->book->av_quantity}}</td>
                                    <td>{{$value->book_return_date}}</td>
                                </tr>
                                {{$id ++}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
@endsection