@extends('backend.admin-master')
@section('style')
    <x-media.css/>
    <x-datatable.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
@endsection
@section('site-title')
    {{__('All Users')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <x-msg.error/>
                                    <x-msg.success/>
                                    <h4 class="header-title">{{__('All Users')}}</h4>
                                    @can('user-delete')
                                    <div class="bulk-delete-wrapper">
                                        <div class="select-box-wrap">
                                            <select name="bulk_option" id="bulk_option">
                                                <option value="">{{{__('Bulk Action')}}}</option>
                                                <option value="delete">{{{__('Delete')}}}</option>
                                            </select>
                                            <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="data-tables datatable-primary">
                                        <table id="all_user_table" class="text-center">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Phone')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{__('User Verify Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_user as $data)
                                                <tr>
                                                    <td>
                                                        <div class="bulk-checkbox-wrapper">
                                                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->name}} ({{$data->username}})</td>
                                                    <td>{{$data->phone}}</td>
                                                    <td>{{$data->email}} @if($data->email_verified == 1) <i class="fas fa-check-circle text-success"></i> @endif</td>
                                                    <td>
                                                        @if($data->user_verify_status == 0)
                                                           <span class="badge badge-danger">{{__('Not Verified')}}</span>
                                                         @elseif($data->user_verify_status == 1)
                                                            <span class="badge badge-warning">{{__('Pending Approval')}}</span>
                                                          @else
                                                            <span class="badge badge-success">{{__('Verified')}}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @can('user-delete')
                                                        <x-delete-popover :url="route('admin.frontend.delete.user',$data->id)"/>
                                                        @endcan
                                                        @can('user-edit')
                                                        <a href="#"
                                                           data-id="{{$data->id}}"
                                                           data-username="{{$data->username}}"
                                                           data-name="{{$data->name}}"
                                                           data-email="{{$data->email}}"
                                                           data-phone="{{$data->phone}}"
                                                           data-address="{{$data->address}}"
                                                           data-state="{{$data->state}}"
                                                           data-city="{{$data->city}}"
                                                           data-zipcode="{{$data->zipcode}}"
                                                           data-country_id="{{$data->country_id}}"
                                                           data-email_verified="{{$data->email_verified}}"
                                                           data-toggle="modal"
                                                           data-target="#user_edit_modal"
                                                           class="btn btn-primary btn-sm mb-3 mr-1 user_edit_btn"
                                                        >
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <a href="#"
                                                           data-id="{{$data->id}}"
                                                           data-toggle="modal"
                                                           data-target="#user_change_password_modal"
                                                           class="btn btn-info btn-sm mb-3 mr-1 user_change_password_btn"
                                                        >
                                                            {{__("Change Password")}}
                                                        </a>

                                                          <a href="{{route('admin.frontend.user.tax.information',$data->id)}}" class="btn btn-warning btn-sm mb-3 mr-1">
                                                                    {{__("Tax Informations")}}
                                                           </a>


                                                        <form action="{{route('admin.all.frontend.user.email.status')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$data->id}}" name="user_id">
                                                            <input type="hidden" value="{{$data->email_verified}}" name="email_verified">
                                                            <button type="submit" class="btn btn-sm @if($data->email_verified == 1)  btn-dark @else btn-warning @endif">
                                                                @if($data->email_verified == 1) {{__('Enable Email Verify')}} @else {{__('Disable Email Verify')}} @endif
                                                            </button>
                                                        </form>
                                                        @endcan


                                                            <a href="{{route('admin.frontend.user.verify.information',$data->id)}}" class="btn btn-success btn-sm mb-2 mr-1">
                                                                {{__("Verify Information")}}
                                                            </a>


                                                            <a href="#"
                                                               data-id="{{$data->id}}"
                                                               data-campaign_permission="{{$data->campaign_permission}}"
                                                               data-toggle="modal"
                                                               data-target="#user_campaign_permission_modal"
                                                               class="btn btn-primary btn-sm mb-3 mr-1 mt-2 permission_change_btn"
                                                            >
                                                                {{__("Campaign Permission")}}
                                                            </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Primary table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('User Details Edit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.frontend.user.update')}}" id="user_edit_modal_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="{{__('Enter name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="text" class="form-control"  id="email" name="email" placeholder="{{__('Email')}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{__('Phone')}}</label>
                            <input type="text" class="form-control"  id="phone" name="phone" placeholder="{{__('Phone')}}">
                        </div>
                        <div class="form-group">
                            <select id="country" class="form-control" name="country_id">
                                @foreach($all_countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">{{__('State')}}</label>
                            <input type="text" class="form-control"  id="state" name="state" placeholder="{{__('State')}}">
                        </div>
                        <div class="form-group">
                            <label for="city">{{__('City')}}</label>
                            <input type="text" class="form-control"  id="city" name="city" placeholder="{{__('City')}}">
                        </div>
                        <div class="form-group">
                            <label for="zipcode">{{__('Zipcode')}}</label>
                            <input type="text" class="form-control"  id="zipcode" name="zipcode" placeholder="{{__('Zipcode')}}">
                        </div>
                        <div class="form-group">
                            <label for="address">{{__('Address')}}</label>
                            <input type="text" class="form-control"  id="address" name="address" placeholder="{{__('Address')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_change_password_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Change Admin Password')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.frontend.user.password.change')}}" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="ch_user_id" id="ch_user_id">
                        <div class="form-group">
                            <label for="password">{{__('Password')}}</label>
                            <input type="password" class="form-control" name="password" placeholder="{{__('Enter Password')}}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{__('Confirm Password')}}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Change Password')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_campaign_permission_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('User Campaign Permission')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.frontend.user.campaign.permission')}}" id="user_campaign_permission_modal_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="campaign_permission_user_id">

                        <div class="form-group">
                            <label for="site_maintenance_mode"><strong>{{__('Give Campaign Permission')}}</strong></label>
                            <label class="switch yes">
                                <input type="checkbox" name="campaign_permission" id="campaign_permission"}}>
                                <span class="slider-yes-no"></span>
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <x-media.markup/>
@endsection

@section('script')
    <x-datatable.js/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function() {
                <x-btn.submit/>
                <x-btn.update/>
                $(document).on('click','#bulk_delete_btn',function (e) {
                    e.preventDefault();

                    var bulkOption = $('#bulk_option').val();
                    var allCheckbox =  $('.bulk-checkbox:checked');
                    var allIds = [];
                    allCheckbox.each(function(index,value){
                        allIds.push($(this).val());
                    });
                    if(allIds != '' && bulkOption == 'delete'){
                        $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i>{{__("Deleting")}}');
                        $.ajax({
                            'type' : "POST",
                            'url' : "{{route('admin.all.frontend.user.bulk.action')}}",
                            'data' : {
                                _token: "{{csrf_token()}}",
                                ids: allIds
                            },
                            success:function (data) {
                                location.reload();
                            }
                        });
                    }

                });

                $('.all-checkbox').on('change',function (e) {
                    e.preventDefault();
                    var value = $('.all-checkbox').is(':checked');
                    var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                    //have write code here fr
                    if( value == true){
                        allChek.prop('checked',true);
                    }else{
                        allChek.prop('checked',false);
                    }
                });

                $(document).on('click','.user_change_password_btn',function(e){
                    e.preventDefault();
                    var el = $(this);
                    var form = $('#user_password_change_modal_form');
                    form.find('#ch_user_id').val(el.data('id'));
                });
                $('#all_user_table').DataTable( {
                    "order": [[ 1, "desc" ]],
                    'columnDefs' : [{
                        'targets' : 'no-sort',
                        'orderable' : false
                    }]
                } );

                $(document).on('click','.user_edit_btn',function(e){
                    e.preventDefault();
                    var form = $('#user_edit_modal_form');
                    var el = $(this);

                    form.find('#user_id').val(el.data('id'));
                    form.find('#name').val(el.data('name'));
                    form.find('#username').val(el.data('username'));
                    form.find('#email').val(el.data('email'));
                    form.find('#phone').val(el.data('phone'));
                    form.find('#state').val(el.data('state'));
                    form.find('#city').val(el.data('city'));
                    form.find('#zipcode').val(el.data('zipcode'));
                    form.find('#address').val(el.data('address'));
                    form.find('#country option[value="'+el.data('country_id')+'"]').attr('selected',true);
                });

                $(document).on('click','.permission_change_btn',function(e){
                    e.preventDefault();
                    var el = $(this);
                    let id = el.data('id');
                    let cp = el.data('campaign_permission');


                    if(cp === 'on'){
                        $('#campaign_permission').attr('checked',true)
                    }else{
                        $('#campaign_permission').attr('checked',false)
                    }

                    var form = $('#user_campaign_permission_modal_form');
                    form.find('#campaign_permission_user_id').val(id);

                });
            } );
        })(jQuery)
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <x-media.js/>
@endsection
