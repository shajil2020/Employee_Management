<!-- resources/views/companies/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Company Details</h1>

    <h2>Name: {{ $company->name }}</h2>
    <p>Email: {{ $company->email }}</p>
    <!-- Display 'logo' and 'website' fields as needed -->

    <a href="{{ route('companies.edit', $company->id) }}">Edit</a>
@endsection
