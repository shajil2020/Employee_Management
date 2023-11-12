<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Company') }}</div>
                <div class="card-body">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @method('patch')
                        <!-- Form fields for editing an employee -->
                        <x-input-field label="Comapny Name" name="name" :value="isset($company) ? $company->name : ''" required />
                        <x-input-field label="Email" name="email" :value="isset($company) ? $company->email : ''" />
                        <x-input-field label="Website" name="website" :value="isset($company) ? $company->website : ''" />
                        <label for="logo">Logo (minimum 100x100):</label>
                        <x-file-input label="Upload File" name="file" :value="$company->file ?? ''" />
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100"  height="100" >
                            <button type="submit" class="btn btn-info m-3"> Update Company</button>
                        <!-- Display all validation errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
