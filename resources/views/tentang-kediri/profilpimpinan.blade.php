<style>
  
    .profile-card{
        scrollbar-width: none;
    }
    .profile-image img {
      border-radius: 50%;
      border: 5px solid var(--bs-primary);
    }
    
</style>

<div class="container my-4">
    <h4 class="mb-3 fw-bold border-bottom title-border text-left">Profil Pimpinan Kota Kediri</h4>

    <div class="row py-3">
      @foreach ($profil_pimpinan as $profil)
        <div class="profile-card col-md-6 radius overflow-auto">
          <div class="profile-header bg-primary text-white py-2 text-center">
            <h5 class="mt-1">{{ $profil->jabatan['nama_jabatan']}}</h5>
          </div>
          <div class="profile-content row py-3">
            <div class="profile-image text-center">
              <img src="{{ asset('storage/pimpinan/' . $profil['foto']) }}" class="w-lg-50 w-md-75" alt="{{ $profil->jabatan['nama_jabatan']}}" loading="lazy" height="250px">
            </div>
            <div class="profile-details mt-3"> 
              <h5 class="text-center fw-semibold text-primary">{{ $profil['nama_pimpinan']}}</h5>
              <div class="profile-section">
                {!! $profil['deskripsi'] !!}
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

