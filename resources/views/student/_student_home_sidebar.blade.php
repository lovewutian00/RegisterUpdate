<div class="col-md-3">
    <div class="panel panel-default sidebar-menu"> 
        
        <div class="panel-body">
            
            <ul class="nav nav-pills nav-stacked">
                <li class="{{ request()->is('student') ? 'active' : ''}} {{ request()->is('student/index') ? 'active' : ''}}">
                    <a href="{{route('stud_Index')}}"><i class="fa fa-home"></i>Home</a>
                </li>
                <li class="{{ request()->is('student/profile') ? 'active' : ''}}">
                    <a href="{{route('student_profile')}}"><i class="fa fa-user"></i>Update Profile</a>
                </li>
                <li class="{{ request()->is('student/report/*') ? 'active' : ''}}">
                    <a href="{{route('report.index')}}"><i class="fa fa-clipboard"></i>Submit Report</a>
                </li>
                <li class="{{ request()->is('student/appliedJob') ? 'active' : ''}}">
                    <a href="{{route('appliedJob')}}"><i class="fa fa-envelope"></i>Apllied Job</a>
                </li>
                <li class="{{ request()->is('student/preference') ? 'active' : ''}}">
                    <a href="{{route('preference')}}"><i class="fa fa-heart"></i>Preferences</a>
                </li>
            </ul>
        </div>  
        
    </div>
</div>