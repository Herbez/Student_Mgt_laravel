<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <style>
        body{
            height: 200vh;
        }
    </style>
</head>
<body>
    <h1>Register Student</h1>
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required>
        <br>
        <br>
        <button type="submit">Register</button>
    </form>

    <h3>Existing Students</h3>
    <table style="border: 1px solid black">
        <thead >
            <tr>
                <th style="border: 1px solid black;">Name</th>
                <th style="border: 1px solid black;">Class</th>
                <th colspan="2" style="border: 1px solid black;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td style="border: 1px solid black;">{{ $student->name }}</td>
                <td style="border: 1px solid black;">{{ $student->class }}</td>
                    <td>
                        <button><a href="{{ route('students.edit', $student->id) }}">Edit</a></button>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
