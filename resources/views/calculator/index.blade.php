<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"
    >
</head>
<body>

    <div class="columns is-mobile">
        <div class="column column is-half is-offset-one-quarter">
            <h1 class="title">Basic Calculator</h1>

            @if (Session::has('result'))
            <div class="notification">Result: {{ Session::get('result') }}</div>
            @endif

            <form method="POST" action="/calculator">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label" for="numbers">First Number</label>

                    <div class="control">
                        <input
                            type="number"
                            step="any"
                            class="input"
                            name="numbers[]"
                            placeholder="Enter first Number"
                            min="1"
                            required
                        >
                    </div>
                </div>


                <div class="field">
                    <label class="label" for="numbers">Second Number</label>

                    <div class="control">
                        <input
                            type="number"
                            step="any"
                            class="input"
                            name="numbers[]"
                            placeholder="Enter second Number"
                            min="1"
                            required
                        >
                    </div>
                </div>

                <div class="select">
                    <div class="control">
                        <select name="operation">
                            <option value="addition">Addition</option>
                            <option value="subtraction">Subtraction</option>
                            <option value="multipication">Multipication</option>
                            <option value="division">Division</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button">Calculate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>