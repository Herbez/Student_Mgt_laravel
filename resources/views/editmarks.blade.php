
<div class="container">
    <h2>Edit Marks for {{ $mark->student->name }}</h2>

    <form action="{{ route('marks.update', $mark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="math">Math</label>
            <input type="number" name="math" id="math" value="{{ old('math', $mark->math) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="computer">Computer</label>
            <input type="number" name="computer" id="computer" value="{{ old('computer', $mark->computer) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Marks</button>
    </form>
</div>

