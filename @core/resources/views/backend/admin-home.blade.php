@extends('backend.admin-master')
@section('site-title')
    {{__('Dashboard')}}
@endsection

@section('content')
@php
    $statistics = [
        ['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user'],
        ['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
        ['title' => 'Total Blogs','value' => $all_blogs, 'icon' => 'write'],
        ['title' => 'Total Testimonial','value' => $total_testimonial, 'icon' => 'control-forward'],
        ['title' => 'Total Team Member','value' => $total_team_member, 'icon' => 'control-forward'],
        ['title' => 'Total Counterup','value' => $total_counterup, 'icon' => 'control-forward'],
        ['title' => 'Total Jobs','value' => $total_jobs, 'icon' => 'package'],
        ['title' => 'Total Events','value' => $total_events, 'icon' => 'timer'],
        ['title' => 'Total Causes','value' => $total_causes, 'icon' => 'agenda'],
        ['title' => 'Total Causes Logs','value' => $total_cause_logs, 'icon' => 'medall'],
        ['title' => 'Total Event Attendence','value' => $total_event_attendance, 'icon' => 'hand-open'],
        ['title' => 'Total Campaign Withdraws','value' => $campaign_withdraw, 'icon' => 'package'],
    ];
@endphp

     <div class="main-content-inner">
        <div class="row">
                
            </div>
        </div>
                     <script>
                            // Fungsi untuk mengubah ukuran font ketika lebar layar kurang dari 300px
                            function updateFontSize() {
                                var screenWidth = window.innerWidth;
                                var fontSize = "1rem"; // Ukuran font default

                                if (screenWidth < 400) {
                                    fontSize = "0.5rem"; // Ubah ukuran font jika lebar layar kurang dari 300px
                                }

                                document.querySelectorAll('a').forEach(function(link) {
                                    link.style.fontSize = fontSize;
                                });
                            }

                            // Panggil fungsi saat halaman dimuat dan saat jendela diubah ukurannya
                            window.addEventListener('load', updateFontSize);
                            window.addEventListener('resize', updateFontSize);
                        </script>
                <div class="main-content-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-primary btn-block mb-3">
                                <i class="fas fa-user"></i> Kelola Admin
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-success btn-block mb-3">
                                <i class="fas fa-users"></i> Kelola Anggota
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-danger btn-block mb-3">
                                <i class="fas fa-building"></i> Kelola Cabang
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-warning btn-block mb-3">
                                <i class="fas fa-envelope"></i> Kelola Surat
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-info btn-block mb-3">
                                <i class="fas fa-users"></i> Kelola Organisasi
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-primary btn-block mb-3">
                                <i class="fas fa-calendar"></i> Kelola Event
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-success btn-block mb-3">
                                <i class="fas fa-money-bill"></i> Kelola Donasi
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-danger btn-block mb-3">
                                <i class="fas fa-credit-card"></i> Kelola Pembayaran
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-warning btn-block mb-3">
                                <i class="fas fa-cogs"></i> Pengaturan Sistem
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-2 col-6">
                            <a href="#" class="btn btn-info btn-block mb-3">
                                <i class="fas fa-file-alt"></i> Pengaturan Halaman
                            </a>
                        </div>
                    </div>
                </div>

<!--     <div class="main-content-inner"> -->
<!--         <div class="row"> -->
            <!-- seo fact area start -->
           <!--  <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title">{{__("Raised Per Month In")}} {{date('Y')}}</h2>
                            <canvas id="monthlyRaised"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title">{{__("Raised Per Day In Last 30Days")}}</h2>
                           <div>
                               <canvas id="monthlyRaisedPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                    @foreach ($statistics as $data)
                    <div class="col-lg-3 col-md-4 mt-5 mb-3">
                        <div class="card card-hover">
                            <div class="dash-box text-white">
                                <h1 class="dash-icon">
                                    <i class="ti-{{ $data['icon'] }} mb-1 font-16"></i>
                                </h1>
                                <div class="dash-content">
                                    <h5 class="mb-0 mt-1">{{ $data['value'] }}</h5>
                                    <small class="font-light">{{ __($data['title']) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> -->
 <!--            </div>
        </div> -->
    <!-- </div> -->

    <div class="main-content-inner">
        <div class="row">

          <div class="col-lg-6">
            <div class="card margin-top-40">
                <div class="smart-card">
                    <h4 class="title">{{__('Surat Masuk Terkini')}}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="clickable-table">
    <thead>
        <th>{{ __('Req ID') }}</th>
        <th>{{ __('Informasi') }}</th>
        <th>{{ __('Tanggal Input') }}</th>
        <th>{{ __('Status') }}</th>
    </thead>
    <tbody>
        @foreach($letters_recent as $data)
        <tr style="cursor: pointer;" data-href="{{ route('admin.letter.detail', $data->id) }}">
            <td>#REQ-{{ $data->id }}</td>
            <td>
                <p>Judul : {{ str_replace('_', ' ', $data->title) }}</p>
                <p>Pemohon : {{ $data->user_id }}</p>
            </td>
            <td>
                @php $status = $data->status; @endphp
                @if($status == 'complete')
                <span class="alert alert-success">{{ __($status) }}</span>
                @elseif($status == 'pending')
                <span class="alert alert-warning">{{ __($status) }}</span>
                @endif
            </td>
            <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const rows = document.querySelectorAll("#clickable-table tbody tr");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                const href = row.getAttribute("data-href");
                if (href) {
                    window.location.href = href;
                }
            });
        });
    });
</script>

                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-6">
                <div class="card margin-top-40">
                    <div class="smart-card">
                        <h4 class="title">{{__('Registrasi Anggota Terkini')}}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>{{__('Attendance ID')}}</th>
                                <th>{{__('Event Name')}}</th>
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Date')}}</th>
                                </thead>
                                <tbody>
                                @foreach($event_attendance_recent_order as $data)
                                    <tr>
                                        <td>#{{$data->id}}</td>
                                        <td>{{$data->event_name}}</td>

                                        <td>
                                            @php $pay_status = $data->payment_status; @endphp
                                            @if($pay_status == 'complete')
                                                <span class="alert alert-success">{{__($pay_status)}}</span>
                                            @elseif($pay_status == 'pending')
                                                <span class="alert alert-warning">{{__($pay_status)}}</span>
                                            @endif
                                        </td>
                                        <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<!--         <div class="row">

          <div class="col-lg-6">
            <div class="card margin-top-40">
                <div class="smart-card">
                    <h4 class="title">{{__('Recent Donation Logs')}}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>{{__('Donation ID')}}</th>
                            <th>{{__('Amount')}}</th>
                            <th>{{__('Payment Gateway')}}</th>
                            <th>{{__('Payment Status')}}</th>
                            <th>{{__('Date')}}</th>
                            </thead>
                            <tbody>
                            @foreach($causes_recent as $data)
                                <tr>
                                    <td>#{{$data->id}}</td>
                                    <td>{{amount_with_currency_symbol($data->amount)}}</td>
                                    <td>{{str_replace('_',' ',$data->payment_gateway)}}</td>
                                    <td>
                                        @php $pay_status = $data->status; @endphp
                                        @if($pay_status == 'complete')
                                            <span class="alert alert-success">{{__($pay_status)}}</span>
                                        @elseif($pay_status == 'pending')
                                            <span class="alert alert-warning">{{__($pay_status)}}</span>
                                        @endif
                                    </td>
                                    <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-6">
                <div class="card margin-top-40">
                    <div class="smart-card">
                        <h4 class="title">{{__('Recent Event Attendance Order')}}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>{{__('Attendance ID')}}</th>
                                <th>{{__('Event Name')}}</th>
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Date')}}</th>
                                </thead>
                                <tbody>
                                @foreach($event_attendance_recent_order as $data)
                                    <tr>
                                        <td>#{{$data->id}}</td>
                                        <td>{{$data->event_name}}</td>

                                        <td>
                                            @php $pay_status = $data->payment_status; @endphp
                                            @if($pay_status == 'complete')
                                                <span class="alert alert-success">{{__($pay_status)}}</span>
                                            @elseif($pay_status == 'pending')
                                                <span class="alert alert-warning">{{__($pay_status)}}</span>
                                            @endif
                                        </td>
                                        <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/chart.js')}}"></script>
    <script>
        $.ajax({
            url: '{{route('admin.home.chat.data')}}',
            type: 'POST',
            async: false,
            data: {
                _token : "{{csrf_token()}}"
            },
            success: function (data) {
                 labels = data.labels;
                 chartdata = data.data;
                 new Chart(
                    document.getElementById('monthlyRaised'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '{{__('Amount Raised')}}',
                                backgroundColor: '#495262',
                                borderColor: '#495262',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
        $.ajax({
            url: '{{route('admin.home.chat.data.by.day')}}',
            type: 'POST',
            async: false,
            data: {
                _token : "{{csrf_token()}}"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyRaisedPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '{{__('Amount Raised')}}',
                                backgroundColor: '#F86048',
                                borderColor: '#F86048',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
    </script>
@endsection
