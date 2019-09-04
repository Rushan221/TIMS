
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview"><a href="#" class="nav-link">
                <i class="fas fa-user-shield"></i>
                <p>
                  Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item"><a href="{{ route('admin.departments.index') }}" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Departments</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.subjects.index') }}" class="nav-link"><i class="nav-icon fas fa-book-open"></i><p>Subjects</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.teachers.index') }}" class="nav-link"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Teachers</p></a></li>   
            </ul>
        </li>
    </ul>    
</nav>