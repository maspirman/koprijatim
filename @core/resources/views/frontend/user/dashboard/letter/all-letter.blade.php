@extends('frontend.user.dashboard.user-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('Semua Surat')}}
@endsection
@section('section')
 <div class="form-header-wrap margin-bottom-50 d-flex justify-content-between">
     <h3 class="mb-3">{{__('List Surat')}}</h3>
     <a href="{{route('user.letter.new')}}"
        class="btn btn-info btn-sm mb-3 campaign-title" >{{__('Buat Surat Baru')}}</a>
 </div>
  <div class="table-wrap table-responsive all-user-campaign-table">
      <table class="table table-defaul" id="all_blog_table">
          
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
                                        <td> <x-status-span :status="$data->status" /></td>
                                        <td>
                                            <p><a href="{{route('user.letter.delete',$data->id)}}"
                                           class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></p>
                                           <p><a href="{{route('user.letter.edit',$data->id)}}"
                                           class="btn btn-warning"><i class="fas fa-edit"></i></a></p>
                                            <p><a href="{{route('user.letter.download',$data->id)}}"
                                           class="btn btn-primary"><i class="fas fa-download"></i></a></p>
                                            
                                          </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            
      </table>
  </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
              $(document).on('click','.swal_delete_button',function(e){
                e.preventDefault();
                  Swal.fire({
                    title: '{{__("Are you sure?")}}',
                    text: '{{__("You would not be able to revert this item!")}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                  });
              });
            })


        })(jQuery)
    </script>

    <x-datatable.js/>
@endsection
