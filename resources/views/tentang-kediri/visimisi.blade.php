<style>
    .text-with-border {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
        border-radius: 5px;
    }

    .text-with-border::before,
    .text-with-border::after {
        content: "";
        display: block;
        width: 50px;
        height: 5px;
        background-color: var(--bs-primary) ; 
        margin: 0 10px;
    }


    .card-misi .card-title {
        font-size: 24px;
        background-color: #e9ecef; 
        border-radius: 50%; 
        width: 40px; 
        height: 40px;
        margin-bottom: 15px;
    }

</style>

<div class="container my-4">
    <h4 class="mb-3 fw-bold border-bottom title-border text-left">Visi & Misi</h4>

    <div class="row mt-5">
        <h4 class="text-with-border fw-bold">Visi</h4>
        <p class="text-center fs-5 italic">{{ empty($visi->deskripsi) ? 'Visi not found' : $visi->deskripsi }}</p>
        <h4 class="text-with-border fw-bold mt-3">Misi</h4>
        <div class="row m-2">
            @foreach ($misi as $item)
            <div class="col-md-6 mb-4">
                <div class="card-misi card-body d-flex h-auto">
                    <h5 class="card-title col-2 text-secondary fw-bold d-flex align-items-center justify-content-center text-center"> {{ $loop->iteration }}</h5>
                    <p class="card-text col-10 mx-2">
                       {{ $item['deskripsi']}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

