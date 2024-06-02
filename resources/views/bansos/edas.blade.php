<!DOCTYPE html>
<html>

<head>
    <title>EDAS Result</title>
</head>

<body>
    <h1>EDAS Calculation Result</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Alternative</th>
                <th>Appraisal Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatives as $index => $alt)
                <tr>
                    <td>{{ $alt->keluarga_id }}</td>
                    <td>{{ $appraisalScores[$index] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
