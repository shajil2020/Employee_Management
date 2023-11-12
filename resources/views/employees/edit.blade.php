<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <x-employee.edit-employee-form action="{{ route('employees.update', $employee->id) }}" :employee="$employee" :companies="$companies" />
@endsection

