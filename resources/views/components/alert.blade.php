@session('success')
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        <strong>Puff !</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession

@session('error')
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        <strong>Ooppss !</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
