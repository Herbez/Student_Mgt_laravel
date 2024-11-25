<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Marks</title>
    <style>
        body{
            height: 200vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Marks for Student</h2>
        @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
        @endif
        <form action="{{ route('marks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_id">Student</label>
                <select class="form-control" name="student_id" id="student_id" required>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="math">Math</label>
                <input type="number" name="math" id="math" class="form-control" required>
            </div>

            <br>
            <div class="form-group">
                <label for="computer">Computer</label>
                <input type="number" name="computer" id="computer" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Marks</button>
        </form>


<div class="container">
    <h2>Marks List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table" style="border: 1px solid black;">
        <thead style="border: 1px solid black;">
            <tr>
                <th style="border: 1px solid black;">Student Name</th>
                <th style="border: 1px solid black;">Math</th>
                <th style="border: 1px solid black;">Computer</th>
                <th style="border: 1px solid black;">Average</th>
                <th style="border: 1px solid black;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
                <tr>
                    <td style="border: 1px solid black;">{{ $mark->student->name }}</td>
                    <td style="border: 1px solid black;">{{ $mark->math }}</td>
                    <td style="border: 1px solid black;">{{ $mark->computer }}</td>
                    <td style="border: 1px solid black;">{{ $mark->average }}</td>
                    <td style="border: 1px solid black;">
                       <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
