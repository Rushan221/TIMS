@extends('admin.layouts.app')

@section('content')
    @foreach ($departments as $department)
    {{ $department->name }}    
    @endforeach
@endsection
