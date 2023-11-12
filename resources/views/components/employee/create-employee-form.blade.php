<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Employee') }}</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ $action }}" method="post">
                        @csrf
                        <!-- Form fields for creating an employee -->
                        
                        <x-input-field label="First Name" name="first_name" :value="isset($employee) ? $employee->first_name : ''" required />
                        <x-input-field label="Last  Name" name="last_name" :value="isset($employee) ? $employee->last_name : ''" required />
                        <!-- Select box for company names -->
                        <x-select-box label="Company" name="company_id" :options="$companies" :selected="old('company_id')" required />
                        <x-input-field label="Email" name="email" :value="isset($employee) ? $employee->email : ''" />
                        <x-input-field label="Phone" name="phone" :value="isset($employee) ? $employee->phone : ''" />
                        <button type="submit" class="btn btn-info m-3">Save Employee</button>
                        <a href="{{ route('home') }}" class="btn btn-default m-3">Canel</a>
                        <!-- Display validation errors -->
                        @error('first_name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        @error('last_name')
                            <p class="error">{{ $message }}</p>
                        @enderror

                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror

                        @error('phone')
                            <p class="error">{{ $message }}</p>
                        @enderror

                        @error('company_id')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <!-- Display all validation errors -->
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
