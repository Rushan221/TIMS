@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title }}</h3>
    </div>
    <div class="card-body">
        <div style="padding-bottom: 1em">
            <a href="{{ route('admin.subjects.create') }}" class="btn btn-success" title="Add"><i class="fa fa-plus"></i></a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </thead>
            <tbody>        
                @forelse ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>
                        <div class="row">
                            <a href="{{ route('admin.subjects.edit',$subject->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;
                            <form action="{{ route('admin.subjects.destroy',$subject->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick=" return confirm('Are you sure you want to delete?') "><i class="fas fa-trash"></i></button>
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