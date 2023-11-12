<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
    <x-employee.employee-list :employees="$employees" />
@endsection
