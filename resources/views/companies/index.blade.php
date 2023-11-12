<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
    <x-company.company-list :companiesList="$companiesList" />
@endsection
