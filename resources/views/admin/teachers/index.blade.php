@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title }}</h3>
    </div>
    <div class="card-body">
        <div style="padding-bottom: 1em">
            <a href="{{ route('admin.teachers.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
        </div>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Actions</th>
            </thead>
            <tbody>        
                          
            </tbody>
        </table>
    </div>
</div>
     
@endsection