@extends('frontend.layouts.app')

@section('notificationA')
@if($issue_book_count > 0)
<span class="badge badge-xs badge-top-right x-danger">
    {{ $issue_book_count }}
</span>
@endif
@endsection

@section('notificationB')
{{ $issue_book_count }}
@endsection

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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript: avoid(0)">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12 col-lg-9">
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGETBOX-->
                <div class="col-sm-12 col-md-4">
                    <div class="panel widgetbox wbox-2 bg-scale-0">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-globe color-darker-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-1">Total Admin</h4>
                                        <h1 class="title color-primary"> {{$admins_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-user color-darker-2"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-2">Total Users</h4>
                                        <h1 class="title color-w"> {{$users_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Books</h4>
                                        <h1 class="title color-light"> {{$books_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--TABS WITH TABLET-->
                <div class="col-sm-12 col-md-8">
                    <div class="tabs mt-none">
                        <!-- Tabs Header -->
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#home" data-toggle="tab">Books</a></li>
                            <li><a href="#profile" data-toggle="tab">Sells</a></li>
                            <li><a href="#messages" data-toggle="tab">Messages</a></li>
                            <li><a href="#settings" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                        </ul>
                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Publication</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($five_books as $book)
                                            <tr>
                                                <td>{{$book->name}}</td>
                                                <td>{{$book->author}}</td>
                                                <td>{{$book->publication}}</td>
                                                <td>{{$book->quantity}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <p><b>Profile</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus
                                    nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla
                                    libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <p><b>Message</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus
                                    nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla
                                    libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <p><b>Settings</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus
                                    nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla
                                    libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--TO DO LIST-->
                <div class="col-sm-12 col-md-4">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">To do List</h4>
                                <button class="add-item btn btn-o btn-primary btn-xs"><i class="fa fa-plus"></i></button>
                                <ul>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h1" value="option1">
                                            <label class="check" for="check-h1">Accusantium eveniet ipsam neque</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h2" value="option1" checked>
                                            <label class="check" for="check-h2">Lorem ipsum dolor sit</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h3" value="option1">
                                            <label class="check" for="check-h3">Dolor eligendi in ipsum sapiente</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h4" value="option1">
                                            <label class="check" for="check-h4">Natus recusandae vel</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h5" value="option1">
                                            <label class="check" for="check-h5">Adipisci amet officia tempore ut</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="check-h6" value="option1">
                                            <label class="check" for="check-h6">Possimus repellat repellendus</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--AREA CHART-->
                <div class="col-sm-12 col-md-8">
                    <div class="panel">
                        <div class="panel-content">
                            <h5><b>First semester</b> Sells</h5>
                            <p class="section-text">Lorem ipsum <span class="highlight">dolor sit amet</span> consectetur adipisicing elit. Assumenda fugit inventore ipsam nam, qui voluptatibus</p>
                            <canvas id="area-chart" width="400" height="160"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--PIE CHART-->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--GALLERY-->

            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--TIMELINE left-->
        <div class="col-sm-12 col-lg-3">
            <div class="timeline">
                <div class="timeline-box">
                    <div class="timeline-icon bg-primary">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="timeline-content">
                        <h4 class="tl-title">Ello impedit iusto</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                    </div>
                    <div class="timeline-footer">
                        <span>Today. 14:25</span>
                    </div>
                </div>
                <div class="timeline-box">
                    <div class="timeline-icon bg-primary">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="timeline-content">
                        <h4 class="tl-title">consectetur adipisicing </h4> Lorem ipsum dolor sit amet. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                    </div>
                    <div class="timeline-footer">
                        <span>Today. 10:55</span>
                    </div>
                </div>
                <div class="timeline-box">
                    <div class="timeline-icon bg-primary">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="timeline-content">
                        <h4 class="tl-title">Impedit iusto minima nisi</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                    </div>
                    <div class="timeline-footer">
                        <span>Today. 9:20</span>
                    </div>
                </div>
                <div class="timeline-box">
                    <div class="timeline-icon bg-primary">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="timeline-content">
                        <h4 class="tl-title">Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                    </div>
                    <div class="timeline-footer">
                        <span>Yesteday. 16:30</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
@endsection