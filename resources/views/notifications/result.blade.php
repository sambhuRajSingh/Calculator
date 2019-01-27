@if (Session::has('result'))
    <div class="notification is-success">
        <button class="delete"></button>
        Result: {{ Session::get('result') }}
    </div>
@endif