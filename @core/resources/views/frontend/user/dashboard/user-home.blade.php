@extends('frontend.user.dashboard.user-master')
@section('site-title')
{{ __('User Dashboard') }}
@endsection

@section('section')
    <div class="row">
        @if(!empty(get_static_option('events_module_status')))
            <div class="col-lg-6">
                <div class="user-dashboard-card margin-bottom-30">
                    <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                    <div class="content">
                        <h4 class="title">{{get_static_option('events_page_name')}} {{__('Yang Dibooking')}}</h4>
                        <span class="number">{{$event_attendances}}</span>
                    </div>
                </div>
            </div>
        @endif


        <!-- @if(get_static_option('donations_module_status'))
            <div class="col-lg-6">
                <div class="user-dashboard-card style-01">
                    <div class="icon"><i class="fas fa-donate"></i></div>
                    <div class="content">
                        <h4 class="title">{{__('Total')}} {{get_static_option('donation_page_name')}}</h4>
                        <span class="number">{{$donation}}</span>
                    </div>
                </div>
            </div>
        @endif
 -->
        <div class="col-lg-6">
            <div class="user-dashboard-card style-01">
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="content">
                    <h4 class="title">{{__('Total')}} {{ __('Surat') }}</h4>
                    <span class="number">{{$letters}}</span>
                </div>
            </div>
        </div>

           <!--  <div class="col-lg-6">
                <div class="user-dashboard-card style-01">
                    <div class="icon"><i class="fas fa-solid fa-gift"></i></div>
                    <div class="content">
                        <h4 class="title">{{__('Total')}} {{ __('Reward Point') }}</h4>
                        <span class="number">{{$donation_reward}}</span>
                    </div>
                </div>
            </div> -->

    </div>
@endsection
