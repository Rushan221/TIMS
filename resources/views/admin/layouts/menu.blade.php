<li class="nav-item">
    <a class="nav-link" href="{{ url('admin/home') }}">Dashboard</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.departments.index') }}">Departments</a>
        <a class="dropdown-item" href="{{ route('admin.subjects.index') }}">Subjects</a>       
    </div>
</li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.teachers.index') }}">Teachers</a></li>


