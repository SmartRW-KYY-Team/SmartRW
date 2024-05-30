<!DOCTYPE html>
<html>

<head>
    <title>AHP Result</title>
</head>

<body>
    <h1>AHP Calculation Result</h1>

    <h2>Eigen Vector</h2>
    <ul>
        @foreach ($eigenVector as $index => $value)
            <li>{{ $criteriaNames[$index] }}: {{ $value }}</li>
        @endforeach
    </ul>

    <h2>Consistency</h2>
    <p>Consistency Index (CI): {{ $consistency['CI'] }}</p>
    <p>Consistency Ratio (CR): {{ $consistency['CR'] }}</p>

    @if ($consistency['CR'] < 0.1)
        <p>Consistency Ratio (CR) is acceptable.</p>
    @else
        <p>Consistency Ratio (CR) is not acceptable.</p>
    @endif
</body>

</html>
