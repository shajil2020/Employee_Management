<!-- resources/views/companies/create.blade.php -->

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Company') }}</div>

                    <div class="card-body">
                        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" name="website" id="website" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
