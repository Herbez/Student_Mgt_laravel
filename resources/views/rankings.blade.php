<div class="container">
    <h2>Rankings</h2>

    @if ($students->isEmpty())
        <p>No students found.</p>
    @else
        <h3>All Students' Rankings</h3>
        <table class="table" style="border: 1px solid black;">
            <thead style="border: 1px solid black;">
                <tr>
                    <th style="border: 1px solid black;">Rank</th>
                    <th style="border: 1px solid black;">Name</th>
                    <th style="border: 1px solid black;">Average</th>
                    <th style="border: 1px solid black;">Grade</th>
                </tr>
            </thead>
            <tbody>
                @php $rank = 1; @endphp
                @foreach ($students as $student)
                    <tr>
                        <td style="border: 1px solid black;">{{ $rank++ }}</td>
                        <td style="border: 1px solid black;">{{ $student->student->name }}</td>
                        <td style="border: 1px solid black;">{{ number_format($student->average, 2) }}</td>
                        <td style="border: 1px solid black;">{{ $student->grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Top Student</h3>
        <p>{{ $topStudent->student->name }} with an average of {{ number_format($topStudent->average, 2) }}</p>

        <h3>Bottom Student</h3>
        <p>{{ $bottomStudent->student->name }} with an average of {{ number_format($bottomStudent->average, 2) }}</p>
    @endif
</div>
