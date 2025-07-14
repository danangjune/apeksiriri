<style>
  .d-none {
    display: none !important;
  }

  .day-pane.active {
    display: block;
  }

  .nested-detail-content {
    display: none;
    padding-left: 20px;
    /* Agar terlihat seperti nested list */
  }

  .nested-detail.open+.nested-detail-content {
    display: block;
  }
</style>
<div class="container agenda-apeksi">
  <div class="row mb-4 mt-4">
    <div class="col-12 text-center">
      <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">
        Agenda APEKSI MUSKOMWIL IV Kota Kediri
      </h2>
      <p class="lead">Berikut adalah jadwal lengkap rangkaian acara MUSKOMWIL IV APEKSI ke-13 tahun 2025 di Kota Kediri.</p>
    </div>
  </div>

  <div class="date-picker">
    @foreach($groupedEvents as $date => $events)
    <button
      class="date-item {{ $loop->first ? 'active' : 'inactive' }}"
      aria-selected="{{ $loop->first ? 'true' : 'false' }}"
      aria-controls="day{{ $loop->index + 1 }}"
      id="tab{{ $loop->index + 1 }}">
      <span>{{ \Carbon\Carbon::parse($date)->format('j M') }}</span>
      <span>{{ \Carbon\Carbon::parse($date)->translatedFormat('l') }}</span>
    </button>
    @endforeach
  </div>


  <section class="day-content">
    @foreach($groupedEvents as $date => $events)
    <div class="day-pane {{ $loop->first ? 'active' : 'd-none' }}" id="dayPane{{ $loop->index + 1 }}">
      <h4 class="section-title">Agenda Tanggal {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</h4>

      @foreach($events as $event)
      <article class="accordion-item mb-2">
        <header class="accordion-header" role="button" tabindex="0" aria-expanded="false" aria-controls="detail{{ $loop->parent->index + 1 }}_{{ $loop->index }}" id="detail{{ $loop->parent->index + 1 }}_{{ $loop->index }}header">
          {{ $event['event_name'] }}
        </header>

          <div class="accordion-content" id="detail{{ $loop->parent->index + 1 }}_{{ $loop->index }}" role="region" aria-labelledby="detail{{ $loop->parent->index + 1 }}_{{ $loop->index }}header">
            <ul class="text-black">
              <li><strong>Tempat:</strong> {{ $event['venue'] }}</li>
              <li><strong>Peserta:</strong> {{ $event['attendees'] }}</li>
              <li><strong>Dresscode:</strong> {{ $event['dresscode'] }}</li>
              <div class="d-flex flex-column flex-md-row">
                <div class="col-md-8 mb-3 mb-md-0">{!! $event['map'] !!}</div>
                <div class="col-md-4">
                  <img src="{{ asset('assets/images/banner/' . $event['image']) }}" alt="" class="w-100">
                </div>
              </div>
            </ul>

          <div class="nested-detail">Jadwal Kegiatan</div>
          <div class="nested-detail-content">
            <ul>
              @foreach($event['schedule'] as $item)
              <li><strong>{{ $item['time'] }}:</strong> {{ $item['activity'] }}</li>
              @endforeach
            </ul>
          </div>
          <div class="nested-detail">Dokumentasi Kegiatan</div>
          <div>
            <div class="d-flex gap-3 pt-3 ps-5">
              <div class="d-flex">
                <i class="bi bi-image-fill fs-2 text-primary"></i>
                <div class="small mt-2 ms-2 text-black">Galeri Foto</div>
              </div>
              <div class="d-flex">
                <i class="bi bi-camera-reels-fill fs-2 text-primary"></i>
                <div class="small mt-2 ms-2 text-black">Video</div>
              </div>
              <a href="" class="btn btn-gradient-green" target="_blank">
                  Lihat Selengkapnya
              </a>
            </div>    
          </div>
        </div>
      </article>
      @endforeach

    </div>
    @endforeach
  </section>


  <script>
    // Date navigation logic (To highlight selected date and update content title)
    const dateItems = document.querySelectorAll('.date-item');
    const sectionTitle = document.querySelector('.section-title');
    const dayContent = document.querySelector('.day-content');

    // Dummy content titles for days
    const dayTitles = {
      day1: "Agenda Tanggal 16 April 2025",
      day2: "Hari Ke Dua",
      day3: "Hari Ke Tiga",
      day4: "Hari Ke Empat",
      day5: "Hari Ke Lima",
      day6: "Hari Ke Enam"
    };

    dateItems.forEach(item => {
      item.addEventListener('click', () => {
        if (item.classList.contains('active')) return;

        // Reset tab state
        dateItems.forEach(i => {
          i.classList.remove('active');
          i.classList.add('inactive');
          i.setAttribute('aria-selected', 'false');
          i.setAttribute('tabindex', '-1');
        });

        // Set active tab
        item.classList.remove('inactive');
        item.classList.add('active');
        item.setAttribute('aria-selected', 'true');
        item.setAttribute('tabindex', '0');
        item.focus();

        const dayId = item.getAttribute('aria-controls');
        sectionTitle.textContent = dayTitles[dayId] || "Hari";
        sectionTitle.setAttribute('id', dayId);
        dayContent.setAttribute('aria-labelledby', dayId);

        // Tampilkan konten yang sesuai
        document.querySelectorAll('.day-pane').forEach(pane => {
          pane.classList.add('d-none');
          pane.classList.remove('active');
        });

        const targetPane = document.querySelector(`#dayPane${dayId.replace('day', '')}`);
        if (targetPane) {
          targetPane.classList.remove('d-none');
          targetPane.classList.add('active');
        }

        // Reset accordion & nested detail
        closeAllAccordions();
        closeAllNestedDetails();
      });
    });


    // Accordion toggles
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
      header.addEventListener('click', () => {
        const expanded = header.getAttribute('aria-expanded') === 'true';
        if (expanded) {
          collapseAccordion(header);
        } else {
          // Close others
          accordionHeaders.forEach(h => collapseAccordion(h));
          expandAccordion(header);
        }
      });
      // Keyboard accessibility enter/space
      header.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          header.click();
        }
      });
    });

    function expandAccordion(header) {
      header.setAttribute('aria-expanded', 'true');
      header.classList.add('open');
      const content = document.getElementById(header.getAttribute('aria-controls'));
      if (content) {
        content.classList.add('open');
        // Automatically open the nested detail
        const nestedDetail = content.querySelector('.nested-detail');
        if (nestedDetail) {
          expandNested(nestedDetail);
        }
      }
    }

    function collapseAccordion(header) {
      header.setAttribute('aria-expanded', 'false');
      header.classList.remove('open');
      const content = document.getElementById(header.getAttribute('aria-controls'));
      if (content) {
        content.classList.remove('open');
        // Also collapse the nested detail
        const nestedDetail = content.querySelector('.nested-detail');
        if (nestedDetail) {
          collapseNested(nestedDetail);
        }
      }
    }

    function closeAllAccordions() {
      accordionHeaders.forEach(h => collapseAccordion(h));
    }

    function expandNested(detail) {
      detail.setAttribute('aria-expanded', 'true');
      detail.classList.add('open');
      const content = detail.nextElementSibling; // Mendapatkan elemen berikutnya, yaitu nested-detail-content
      if (content) {
        content.classList.add('open');
      }
    }

    function collapseNested(detail) {
      detail.setAttribute('aria-expanded', 'false');
      detail.classList.remove('open');
      const content = detail.nextElementSibling;
      if (content) {
        content.classList.remove('open');
      }
    }
  </script>

</div>
