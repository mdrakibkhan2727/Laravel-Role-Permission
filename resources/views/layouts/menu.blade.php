<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="fa fa-cogs"></i>
        <p>Settings</p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="fa fa-user"></i>
        <p>
            Profile
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ">
        <li class="nav-item">
            <a href="{{route('admin.role.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.role.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission Table</p>
            </a>
        </li>
    </ul>
</li>
