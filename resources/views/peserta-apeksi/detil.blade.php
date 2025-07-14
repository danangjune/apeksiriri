@extends('layouts.app')

@section('title')

<style>
    .header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
        pointer-events: none; /* Agar tidak mengganggu elemen lain */
        z-index: 1;
    }

    .card-hero {
      position: relative;
     top: -200px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      padding: 30px;
      box-shadow: 0 15px 30px rgb(21, 79, 71);
      border-radius: 10px;
      width: 70%;
      z-index: 10;
    }
    @media(max-width: 756px){
      .card-hero{
        width: 90%
      }
    }
    </style>

@section('content')
<div class="min-vh-50">
    
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-perangkat">
            <!--Content before waves-->
            <div class="inner-header flex"></div>
        
            <!--Waves Container-->
            <div>
                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <!-- Gradasi overlay -->
                        <linearGradient id="gradientOverlay" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0%" stop-color="rgba(0, 0, 0, 0.5)" />
                            <stop offset="100%" stop-color="rgba(0, 0, 0, 0)" />
                        </linearGradient>
        
                        <!-- Path ombak -->
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
        
                    <!-- Gradasi overlay -->
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#gradientOverlay)"></rect>
        
                    <!-- Ombak dengan efek parallax -->
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#f8fafc" />
                    </g>
                </svg>
            </div>
            <!--Waves end-->
        </div>
        <div class="my-5">
            <div class="card-hero">
                <div class="row">
                <div class="col-md-3 py-4">
                    <!-- Tab list -->

                </div>
                <div class="col-md-9">
                </div>
            </div>
        </div>
    </section>
</div>

<script>
   $(document).ready(function(){
        $(".search-opd").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".opd-card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>


@endsection