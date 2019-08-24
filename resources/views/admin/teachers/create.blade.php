@extends('admin.layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.teachers.store') }}" >
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>{{ $title }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <div style="color: red">
                        {{ $errors->first('name') }}
                    </div>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <div style="color: red">
                        {{ $errors->first('contact') }}
                    </div>
                    <input type="text" class="form-control" name="contact" id="contact" required>
                </div>
                <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <div style="color: red">
                        {{ $errors->first('email_address') }}
                    </div>
                    <input type="email" class="form-control" name="email_address" id="email_address" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <div style="color: red">
                        {{ $errors->first('address') }}
                    </div>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <div style="color: red">
                        {{ $errors->first('department') }}
                    </div>
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="" disabled selected>-- Please select the Department --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <div style="color: red">
                        {{ $errors->first('subject') }}
                    </div>
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option value="" disabled selected>-- Please select the subject --</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>                               
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
    
@endsection