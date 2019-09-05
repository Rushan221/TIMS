@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
        <div style="padding-bottom: 1em">
            <a href="{{ route('admin.teachers.create') }}" class="btn btn-success btn-sm" title="Add"><i class="fa fa-plus"></i></a>
        </div>
        <table class="table table-striped">
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
                                <a href="{{ route('admin.teachers.edit',$teacher->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;
                                <form action="{{ route('admin.teachers.destroy',$teacher->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to Proceed?');" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>&nbsp;
                                <form action="{{ route('addAsUser',$teacher->id) }}" method="post"> 
                                    @csrf 
                                    @if ($teacher->user_id)
                                        <button class="btn btn-default btn-sm text-success font-weight-bold" title="User Access Granted" disabled><i class="fas fa-lock-open"></i></button>
                                    @else
                                        <button type="submit" class="btn btn-default btn-sm text-danger font-weight-bold" title="Grant User Access" onclick="return confirm('Do you want to grant access?');"><i class="fas fa-key"></i></button>
                                    @endif                                  

                                </form>
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