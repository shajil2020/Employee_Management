<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company List') }}
                    <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm"
                        style=" float: right;">{{ __('Create New') }}</a>
                    <a href="{{ route('home') }}" class="btn btn-info btn-sm" style=" float: right;">Back</a>
                </div>
                @if (session('success'))
                    <x-alert>{{ session('success') }}</x-alert>
                @endif
                @if (session('fail'))
                    <x-alert>{{ session('fail') }}</x-alert>
                @endif

                <div class="card-body">
                    <table class="table table-boarded" id="company-table">
                        <!-- Table headers -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Actions</th> <!-- Add a new column for actions -->
                            </tr>
                        </thead>
                        <!-- Table body -->

                    </table>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var deleteCompanyRoute = "{{ route('companies.destroy', ':id') }}";
    $(document).ready(function() {
        $('#company-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getcompanies') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'website',
                    name: 'website'
                },
                {
                    data: 'id',
                    name: 'actions',
                    render: function(data, type, row) {
                        var companyId = row.id;
                        return `
                <a href="{{ url('companies') }}/${row.id}/edit" class="btn btn-sm btn-info">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="deleteCompany(${row.id})">Delete</button>
               
            `;
                    }
                }
            ]

        });
    });


    var deleteCompanyRoute = "{{ route('companies.destroy', ':id') }}";

    function deleteCompany(companyId) {
        if (confirm('Are you sure you want to delete this company?')) {
            // Trigger the form submission through AJAX
            $.ajax({
                url: `{{ route('companies.destroy', '') }}/${companyId}`,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    '_token': '{{ csrf_token() }}'
                },
                success: function() {
                    alert('Company deleted successfully');
                    // Reload the DataTable after deletion
                    $('#company-table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    }
</script>
