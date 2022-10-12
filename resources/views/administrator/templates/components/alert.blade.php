@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $titleError ?? trans('message_alert.error.operation') }}</strong>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close">
        </button>
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $titleError ?? trans('message_alert.error.operation') }}</strong>
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close">
        </button>
    </div>
@elseif (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close">
        </button>
    </div>
@endif