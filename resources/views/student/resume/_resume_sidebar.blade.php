<div class="col-md-3">
    <div class="panel panel-default sidebar-menu">
        
        <div class="panel-heading">
            <a href="/student/resumeProfile">
                <h3 class="panel-title">{{$studDetail->LastName}} {{$studDetail->FirstName}}</h3>
            </a>
        </div>
        
        <div class="panel-body">
            
            <ul class="nav nav-pills nav-stacked">
                <li class="{{ request()->is('student') ? 'active' : ''}}">
                    <a href="{{route('stud_Index')}}"><i class="fa fa-home"></i>Home</a>
                </li>
                <li class="{{ request()->is('student/profile') ? 'active' : ''}}">
                    <a href="{{route('student_profile')}}"><i class="fa fa-user"></i>Profile</a>
                </li>
                <li class="{{ request()->is('student/resume/experience*') ? 'active' : ''}}">
                    <a href="{{route('experience')}}"><i class="fa fa-calendar"></i>Experience</a>
                </li>
                <li class="{{ request()->is('student/resume/education*') ? 'active' : ''}}">
                    <a href="{{route('education')}}"><i class="fa fa-mortar-board"></i>Education</a>
                </li>
                <li class="{{ request()->is('student/resume/skill*') ? 'active' : ''}}">
                    <a href="{{route('skill')}}"><i class="fa fa-list"></i>Skills</a>
                </li>
                <li class="{{ request()->is('student/resume/language*') ? 'active' : ''}}">
                    <a href="{{route('language')}}"><i class="fa fa-language"></i>Languages</a>
                </li>
                <li class="{{ request()->is('student/resume/additional_info*') ? 'active' : ''}}">
                    <a href="{{route('additional_info')}}"><i class="fa fa-info-circle"></i>Additional Info</a>
                </li>
            </ul>
        </div>         
    </div>
</div>
