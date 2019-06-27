@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <strong>{{ session('flash_message') }}</strong>
    </div>
@endif
