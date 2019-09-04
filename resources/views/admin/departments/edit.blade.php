@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin.departments.update',$department->id) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <div style="color: red">
                        {{ $errors->first('name') }}
                    </div>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $department->name }}">
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <div style="color: red">
                            {{ $errors->first('code') }}
                        </div>
                    <input type="text" class="form-control" name="code" id="code" required value="{{ $department->code }}">
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
    
@endsection