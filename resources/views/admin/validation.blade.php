@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Whoops! Ada kesalahan dalam input anda.</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif