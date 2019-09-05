
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column">
    <li class="nav-header">MASTER</li>
    <li class="nav-item"><a href="{{ route('admin.departments.index') }}" class="nav-link {{ (request()->is('admin/departments*')) ? 'active' : '' }} "><i class="nav-icon fas fa-users"></i><p>Departments</p></a></li>
  <li class="nav-item"><a href="{{ route('admin.subjects.index') }}" class="nav-link {{ (request()->is('admin/subjects*')) ? 'active' : '' }}"><i class="nav-icon fas fa-book-open"></i><p>Subjects</p></a></li>
    <li class="nav-item"><a href="{{ route('admin.teachers.index') }}" class="nav-link {{ (request()->is('admin/teachers*')) ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Teachers</p></a></li>       
  </ul> 
</nav>