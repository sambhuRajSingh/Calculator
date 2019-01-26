<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Basic Calculator</h1>

    @if (Session::has('result'))
    <div class="alert alert-info">Result: {{ Session::get('result') }}</div>
    @endif

    <form method="POST" action="/calculator">
        {{ csrf_field() }}
        <div>
            <input
                type="number"
                name="numbers[]"
                placeholder="Enter first Number"
                min="1"
            >
        </div>

        <div>
            <input
                type="number"
                name="numbers[]"
                placeholder="Enter first Number"
                min="1"
            >
        </div>

        <select name="operation">
            <option value="addition">Addition</option>
            <option value="subtraction">Subtraction</option>
            <option value="multipication">Multipication</option>
            <option value="division">Division</option>
        </select>

        <div>
            <button type="submit">Calculate</button>
        </div>
    </form>

</body>
</html>