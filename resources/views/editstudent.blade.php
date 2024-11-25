<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit student</title>
</head>
<body>
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <h2>Edit Student Information</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')


        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="form-control" required>
        <label for="class">class</label>
        <input type="text" name="class" id="class" value="{{ old('class', $student->class) }}" class="form-control" required>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>


</body>
</html>
