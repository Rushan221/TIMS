@if (session('success'))
    <div class="alert alert-success" role="alert" id="alert-message">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert" id="alert-message">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('warning') }}
    </div>
@endif