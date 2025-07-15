<style>
    .event-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
        /* height: 600px; */
    }

    .event-card .card-img-top {
        height: 520px;
        overflow: hidden;
    }

    .event-card .card-img-top img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .event-card:hover .card-img-top img {
        transform: scale(1.05);
    }

    .event-date {
        position: absolute;
        top: 15px;
        left: 15px;
        background-color: rgba(44, 62, 80, 0.8);
        color: #ffffff;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        line-height: 1;
    }

    .event-date .day {
        display: block;
        font-size: 20px;
        font-weight: bold;
    }

    .event-date .month {
        display: block;
        font-size: 14px;
    }

    .event-card .card-title {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .event-info {
        color: #7f8c8d;
        font-size: 14px;
        margin-top: 15px;
    }
</style>

<a href="{{ $url }}" onclick="{{ $url == '' ? 'return false' : 'return true' }}" target="_blank" class="text-decoration-none">
    <div class="event-card h-100 shadow-sm">
        <div class="card-img-top position-relative">
            <img src="{{ $image }}" class="img-fluid" alt="{{ $title }}">
            <div class="event-date">
                <span class="day">{{ $day }}</span>
                <span class="month">{{ $month }}</span>
            </div>
        </div>
    </div>
</a>
