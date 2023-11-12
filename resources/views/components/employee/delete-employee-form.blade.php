<form action="{{ route('employees.destroy', $employee->id) }}" method="post" class="inline-form">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
</form>
