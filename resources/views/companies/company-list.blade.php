<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Company List') }}
                        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm" style=" float: right;">{{ __('Create New') }}</a>
                        <a href="{{ route('home') }}" class="btn btn-info btn-sm" style=" float: right;">Back</a>
                    </div>
                     @if (session('success'))
                     <x-alert>{{ session('success') }}</x-alert>
                     @endif
                    <div class="card-body">
                        <table class="table table-boarded">
                            <!-- Table headers -->
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($companees as $compane)
                                    <tr>
                                        <td>{{ $compane->name }} </td>
                                        <td>{{ $compane->email }}</td>
                                        
                                        <td>
                                            <a href="{{ route('employees.edit', $compane->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <x-company.delete-company-form :compane="$compane" style="display: inline;" />
                                            <!-- Add other buttons or actions as needed -->
                                        </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $employees->links('vendor.pagination.bootstrap-4') }} {{-- Display Bootstrap pagination links --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
