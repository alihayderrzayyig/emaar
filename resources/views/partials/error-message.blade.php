@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        {{-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. --}}
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
