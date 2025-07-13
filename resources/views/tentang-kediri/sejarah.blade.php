<style>
    .timeline {
  position: relative;
  padding: 20px 0;
  margin: 0 auto;
  max-width: 95%;
}

.timeline-item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  margin-left: 30px;
  position: relative;
  text-align: center;
}

.timeline-icon {
  flex: 0 0 50px;
  height: 50px;
  border-radius: 50%;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 18px;
  position: relative;
  z-index: 1;
}

.timeline-content {
  background-color: #f9f9f9;
  padding: 15px;
  border-radius: 8px;
  margin-left: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: calc(100% - 70px);
}

.timeline-title {
  font-size: 18px;
  margin-bottom: 5px;
  color: #333;
}

.timeline-item::before {
  content: '';
  position: absolute;
  width: 2px;
  height: 100%;
  background-color: rgba(var(--bs-primary-rgb)); 
  left: 25px;
  top: 0;
  z-index: 0;
}

.timeline-item:last-child::before {
  height: 25px;
}
</style>

<div class="timeline">
    <h4 class="mb-3 fw-bold border-bottom title-border text-left">Sejarah Singkat Kota Kediri</h4>
    <p>Kediri memiliki sejarah panjang yang dimulai sejak era kerajaan Hindu pada abad ke-11. Dari penemuan artefak hingga berbagai peristiwa penting, kota ini telah menyaksikan banyak perubahan yang membentuknya menjadi seperti sekarang.</p>
    <!-- Timeline item 1 -->
    @php
    $no = 1;
  @endphp
    @foreach ($sejarah as $item)
      <div class="timeline-item">
        <div class="timeline-icon bg-primary">{{ $no++ }}</div>
        <div class="timeline-content">
          <h5 class="timeline-title">{{ $item['tahun'] }}</h5>
          <p>{!! $item['keterangan'] !!}</p>
        </div>
      </div>
    @endforeach
</div>