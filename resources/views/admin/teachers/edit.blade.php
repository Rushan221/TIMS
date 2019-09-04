@extends('admin.layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.teachers.update',$teacher->id) }}" >
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $teacher->name }}" required>
                </div>
                <div class="form-group">
                    <label for="contact">Mobile No.</label>
                    <div style="color: red">
                        {{ $errors->first('contact') }}
                    </div>
                    <input type="text" class="form-control" name="contact" id="contact" value="{{ $teacher->contact_no }}" required>
                </div>
                <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <div style="color: red">
                        {{ $errors->first('email_address') }}
                    </div>
                    <input type="email" class="form-control" name="email_address" id="email_address" value="{{ $teacher->email }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <div style="color: red">
                        {{ $errors->first('address') }}
                    </div>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $teacher->address }}" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <div style="color: red">
                        {{ $errors->first('department') }}
                    </div>
                    <select name="department_id" id="department_id" class="form-control">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ $teacher->department_id == $department->id ? 'selected':'' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <div style="color: red">
                        {{ $errors->first('subject') }}
                    </div>
                    <select name="subject_id" id="subject_id" class="form-control">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $teacher->subject_id == $subject->id ? 'selected':'' }}>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div> 
                <input type="hidden" name="teacher_code" value="{{ $teacher->teacher_code }}">                              
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>    
@endsection