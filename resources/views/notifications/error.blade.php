@if ($errors->any())
    <div class="notification is-danger">
        <button class="delete"></button>
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $key => $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif