@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $title }}</h3>
        </div>
        <div class="card-body">
            <div style="padding-bottom: 1em">
                <a href="{{ route('admin.departments.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->code }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('admin.departments.edit',$department->id) }}" class="btn btn-primary btn-sm">Edit</a>&nbsp;                                
                                <form action="{{ route('admin.departments.destroy',$department->id) }}" method="post">
                                    @method('Delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
