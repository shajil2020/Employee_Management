

<form id="delete-company-form-{{ $companyId }}" action="{{ route('companies.destroy', $companyId) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>