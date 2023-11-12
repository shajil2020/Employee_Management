<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
    <x-employee.create-employee-form action="{{ route('employees.store') }}" :employee="null" :companies="$companies" />
@endsection
