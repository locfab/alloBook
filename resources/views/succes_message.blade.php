@if(session()->has('message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('message') }}.
    </div>
@endif