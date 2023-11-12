<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <x-company.edit-company-form action="{{ route('companies.update', $company->id) }}" :company="$company"  />
@endsection

