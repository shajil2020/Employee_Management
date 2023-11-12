<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>
                <div class="card-body">
                    <form action="{{ $action }}" method="post">
                        @csrf
                        @method('patch')
                        <!-- Form fields for editing an employee -->
                        <x-input-field label="First Name" name="first_name" :value="isset($employee) ? $employee->first_name : ''" required />
                        <x-input-field label="Last  Name" name="last_name" :value="isset($employee) ? $employee->last_name : ''" required />
                        <x-select-box label="Company" name="company_id" :options="$companies" :selected="old('company_id', isset($employee) ? $employee->company_id : null)" required />
                        <x-input-field label="Email" name="email" :value="isset($employee) ? $employee->email : ''" />
                        <x-input-field label="Phone" name="phone" :value="isset($employee) ? $employee->phone : ''" />

                        <button type="submit" class="btn btn-info m-3"> Update Employee</button>
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
