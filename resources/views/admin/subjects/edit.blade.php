@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin.subjects.update',$subject->id) }}" method="post">
        @csrf
        @method('PUT')
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $subject->name }}">
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <div style="color: red">
                            {{ $errors->first('code') }}
                        </div>
                    <input type="text" class="form-control" name="code" id="code" required value="{{ $subject->code }}">
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
    
@endsection