@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('All Letters')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.error/>
                <x-msg.success/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Letters')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('letters-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('donation-create')
                                <div class="btn-wrapper pull-right mb-3">
                                    <a href="{{route('admin.letter.new')}}"
                                       class="btn btn-info">{{__('Add New Letters')}}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Info')}}</th>
                                <th>{{__('Jenis Surat')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                     @foreach($all_letters as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>
                                            <div class="img-wrap">
                                                {!! render_attachment_preview_for_admin($data->image) !!}
                                            </div>
                                        </td>
                                        <td>
                                            <p><b>{{__('Title')}}</b> : {{$data->title}}</p>
                                            <p><b>{{__('Event Name')}}</b> : {{$data->title}}</p>
                                             <p><b>{{__('Due')}}</b> : {{$data->time}}, {{$data->date_begin}} - {{$data->date_end}}</p>
                                        </td>
                                        <td>{{$data->temp_id}}</td>
                                        <td>
                                           @if ($data->status == 'Approved')
                                                <span class="btn btn-success"><i class="fas fa-check-circle"></i> Approved</span>
                                            @else
                                                
                                                 <span class="btn btn-danger"><i class="fas fa-info-circle"></i></span>
                                                 <span><a href="{{ route('admin.letter.approve',$data->id) }}"
                                           class="btn btn-success"><i class="fas fa-check-circle"></i></a></span>
                                            @endif

                                        </td>
                                        <td>
                                            @can('event-delete')
                                                <x-delete-popover :url="route('admin.letter.delete',$data->id)"/>
                                            @endcan
                                            @can('event-edit')
                                                <x-edit-icon :url="route('admin.letter.edit',$data->id)"/>
                                            @endcan
                                            
                                         
                                        <p>
                                           <!-- <a href="{{ route('admin.letter.approve',$data->id) }}"
                                           class="btn btn-success"><i class="fas fa-check-circle"></i></a> -->
                                            <a href="{{route('admin.letter.download',$data->id)}}"
                                           class="btn btn-success"><i class="fas fa-download"></i></a>
                                            <a href="{{route('admin.letter.detail',$data->id)}}"
                                       class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                          </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.bulk.action')"/>
            })
        })(jQuery)
    </script>
    @include('backend.partials.datatable.script-enqueue',['only_js' => true])

    @include('backend.partials.media-upload.media-js')

   
@endsection
