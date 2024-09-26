@extends('frontend.layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="{{ url('dashbord') }}">Dashboard</a></li>
                <li><a>User profile</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--PROFILE-->
            <div>
                <div class="profile-photo">
                    <span>
                        @if(Auth::user()->image)
                        <img style="width: 100px;" alt="profile photo" src="{{ asset('/') }}assets/images/user/{{Auth::user()->image}}" />
                        @else
                        <img style="width: 100px" alt=" profile photo" src="{{ asset('/') }}assets/images/user/people.png" />
                        @endif
                    </span>
                </div>
                <div class="user-header-info">
                    <h2 class="user-name">{{ $student->name }}</h2>
                    <h5 class="user-position">UI Designer</h5>
                    <div class="user-social-media">
                        <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--CONTACT INFO-->
            <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                <div class="panel-content">
                    <h4 class=""><b>Contact Information</b></h4>
                    <ul class="user-contact-info ph-sm">
                        <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> {{ $student->email }}</li>
                        <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> {{ $student->phone }}</li>
                        <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> Helsinki, Finland</li>
                        <li class="mt-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorem error itaque maxime minus saepe similique voluptatibus. Beatae cumque dolore doloribus impedit omnis porro tempore tenetur. Aperiam dolorum odio quo?</li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LIST-->
            <div class="panel  b-primary bt-sm ">
                <div class="panel-content">
                    <div class="widget-list list-sm list-left-element ">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-check color-success"></i></div>
                                    <div class="text">
                                        <span class="title">95 Jobs</span>
                                        <span class="subtitle">Completed</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-clock-o color-warning"></i></div>
                                    <div class="text">
                                        <span class="title">3 Proyects</span>
                                        <span class="subtitle">working on</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                    <div class="text">
                                        <span class="title">Leave a Menssage</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--TIMELINE-->
            <div class="timeline animated fadeInUp">
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
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--GALLERY-->

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
@endsection