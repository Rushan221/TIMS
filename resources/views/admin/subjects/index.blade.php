@extends('admin.layouts.app')

@section('content')
    <h3>{{ $title }}</h3>
    <div style="padding-bottom: 1em">
        <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
    </div>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Code</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@endsection