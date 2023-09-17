@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('events_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('events_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('events_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('events_page_meta_tags')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/locales/id.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
@endsection
@section('content')
    <section class="blog-content-area padding-100">
        <div class="container">
            <div class="title margin-bottom-30"><h1>Kalender Event</h1></div>
            <div class="row">
                <div class="col-lg-12">

<div class="container">
    <div id='calendar'></div>
</div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Tampilan awal
                locale: 'id', // Mengatur bahasa ke Bahasa Indonesia
                events: [
                    @foreach($all_events as $data)
                    {
                        title: '{{$data->title}}',
                        start: '{{$data->date}}',
                        end: '{{$data->date_end}}',
                        url: '{{route("frontend.events.single", $data->slug)}}',
                        weton: '{{date("l", strtotime($data->date))}}' // Menambahkan weton
                    },
                    @endforeach
                ],
                eventRender: function (info) {
                    // Menampilkan weton dalam Bahasa Indonesia
                    var weton = info.event.extendedProps.weton;
                    if (weton) {
                        info.el.querySelector('.fc-title').innerHTML += '<br>' + weton;
                    }
                },
                eventClick: function (info) {
                    if (info.event.url) {
                        window.open(info.event.url); // Buka URL detail acara dalam jendela baru
                    }
                },
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                }
            });

            calendar.render();
        });
    </script>
    
    <style>
        #calendar {
            max-width: 1100px;
            margin: 40px auto;
        }
    </style>




             
            </div>
        </div>
    </section>
@endsection
