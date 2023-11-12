<!-- resources/views/employees/action.blade.php -->
<div class="btn-group">
    <a href="{{ route('employees.edit', $id) }}" class="btn btn-sm btn-info">Edit</a>
    <form action="{{ route('employees.destroy', $id) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
    </form>
</div>
