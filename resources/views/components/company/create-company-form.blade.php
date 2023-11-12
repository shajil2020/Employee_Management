<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create New Company') }}</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields for creating an employee -->
                        <x-input-field label="Company  Name" name="name" :value="isset($employee) ? $employee->last_name : ''" required />
                        <x-input-field label="Email" name="email" :value="isset($employee) ? $employee->email : ''" />
                        <x-input-field label="Website" name="website" :value="isset($employee) ? $employee->phone : ''" />
                        <label for="logo">Logo (minimum 100x100):</label>
                        <x-file-input label="Upload File" name="file" :value="$employee->file ?? ''" />
                        <button type="submit" class="btn btn-info m-3">Save Company</button>
                        <a href="{{ route('home') }}" class="btn btn-default m-3">Canel</a>
                        <!-- Display validation errors -->
                        @error('company_name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <!-- Display all validation errors -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
