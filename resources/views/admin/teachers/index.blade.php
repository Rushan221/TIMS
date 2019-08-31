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
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->contact_no }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->address }}</td>
                        <td>{{ $teacher->departments->name }}</td>
                        <td>{{ $teacher->subjects->name }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('admin.teachers.edit',$teacher->id) }}" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                                <form action="{{ route('admin.teachers.destroy',$teacher->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to Proceed?');">Delete</button>
                                </form>
                                <a href="#" class="btn btn-default btn-sm" onclick="return confirm('Do you want to grant access?');"><i class="fas fa-key"></i> Grant access</a>
                            </div>
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <td colspan="2">No records found</td>
                    </tr>                    
                @endforelse                          
            </tbody>
        </table>
    </div>
</div>
     
@endsection