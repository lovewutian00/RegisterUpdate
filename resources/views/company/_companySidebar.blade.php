<div class="col-md-3">
    <div class="panel panel-default sidebar-menu">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="{{ request()->is('company/companyHome') ? 'active' : ''}}">
                    <a href="/company/companyHome"><i class="glyphicon glyphicon-home"></i> Company Home</a>
                </li>
                <li class="{{ request()->is('company/profile') ? 'active' : ''}}">
                    <a href="/company/profile"><i class="glyphicon glyphicon-user"></i> Company Profile</a>
                </li>
                <li class="{{ request()->is('company/post') ? 'active' : ''}}">
                    <a href="/company/post"><i class="glyphicon glyphicon-briefcase"></i> Post Job </a>
                </li>
                <li class="{{ request()->is('company/add') ? 'active' : ''}}">
                    <a href="/company/add"><i class="glyphicon glyphicon-hourglass"></i> View Applicant </a>
                <li class="{{ request()->is('company/_list') ? 'active' : ''}}">
                    <a href="/company/_list"><i class="glyphicon glyphicon-list-alt"></i> Student List</a>
                </li>
            </ul>
        </div>
    </div>
</div>