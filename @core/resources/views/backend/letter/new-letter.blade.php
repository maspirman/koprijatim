@extends('backend.admin-master')
@section('site-title')
    {{__('New Letters')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="headerbtn-wrap">
                          <div class="row">
                              <div class="col-md-12">
                                  <h4 class="header-title">{{__('Add New Letters')}}
                                      <a href="{{route('admin.events.all')}}" class="btn btn-info pull-right mb-4">{{__('All Letters')}}</a>
                                  </h4>
                              </div>
                          </div>

                        </div>
                        <form action="{{route('admin.letter.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}">
                                    </div>



                                    <div class="form-group permalink_label">
                                        <label class="text-dark">{{__('Permalink / Slug * : ')}}
                                            <span id="slug_show" class="display-inline"></span>
                                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm ml-1 px-2 py-1 slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                        <input type="text" name="slug" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 px-2 py-1" style="display: none">{{__('Update')}}</button>
                                    </span>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone">{{__('Nama Event')}}</label>
                                                <input type="text" class="form-control"  id="event_name" name="event_name" value="{{old('event_name')}}" placeholder="{{__('nama event')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category">{{__('Kategori Event')}}</label>
                                                 <select name="category_event_id" class="form-control" id="category_event">
                                            <option value="">{{__("Pilih Kategori ")}}</option>
                                            @foreach($all_categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                                
                                            </div>
                                
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="category">{{__('Jenis Surat')}}</label>
                                                <select name="category_letter_id" class="form-control" id="category_letter">
                                                    <option value="">{{__("Pilih Jenis")}}</option>
                                                    @foreach($all_temp as $templates)
                                                    <option value="{{$templates->id}}">{{$templates->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $dataToSend = json_encode($all_temp); ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer">{{__('No Surat')}}</label>
                                                <input type="text" class="form-control"  id="letter_no" name="letter_no" value="{{old('letter_no')}}" placeholder="{{__('Nomor Surat')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer_email">{{__('Kepada')}}</label>
                                                <input type="text" class="form-control"  id="target" name="letter_target" value="{{old('letter_target')}}" placeholder="{{__('Kepada Yth')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone">{{__('Materi')}}</label>
                                                <input type="text" class="form-control"  id="letter_materi" name="letter_materi" value="{{old('letter_materi')}}" placeholder="{{__('materi')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('Pembuka')}}</label>
                                        <input type="hidden" name="letter_opening" value="" >
                                        <div class="summernote" id="opener-summernote" data-content=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Isi Surat')}}</label>
                                        <input type="hidden" name="letter_content" value="" >
                                        <div class="summernote" id="content-summernote" data-content=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Penutup')}}</label>
                                        <input type="hidden" name="letter_closing" value="" >
                                        <div class="summernote" id="closing-summernote" data-content=""></div>
                                    </div>
                                    <div id="all-temp-data" data-json="{{ $dataToSend }}"></div>
                                    <script>
                                        $(document).ready(function () {
    $('#category_letter').change(function () {
        var selectedCategoryId = $(this).val(); // Mendapatkan ID kategori yang dipilih
        var allTempData = $('#all-temp-data').data('json'); // Mendapatkan data JSON
        
        // Cari data yang sesuai berdasarkan ID yang dipilih
        var selectedCategoryData = allTempData.find(function(item) {
            return item.id == selectedCategoryId;
        });
        
        if (selectedCategoryData) {
            // Set nilai data-content di dalam elemen summernote sesuai dengan data yang dipilih
            $('#opener-summernote').summernote('code', selectedCategoryData.opener);
            $('#content-summernote').summernote('code', selectedCategoryData.value);
            $('#closing-summernote').summernote('code', selectedCategoryData.closing);
        }
    });
});


                                    </script>

                                    <div class="form-group">
                                        <label>{{__('Deskripsi Event')}}</label>
                                        <input type="hidden" name="event_content" >
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="time">{{__('Time')}}</label>
                                                <input type="text" class="form-control"  id="time" name="time" placeholder="{{__('time')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">{{__('Tanggal Mulai')}}</label>
                                                <input type="date" date-format="dd-mm-yyy" class="form-control datepicker"  id="date" name="date" placeholder="{{__('Date')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">{{__('Tanggal Selesai')}}</label>
                                                <input type="date" class="form-control datepicker"  id="date_end" name="date_end" placeholder="{{__('Date')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cost">{{__('Biaya')}}<small class="info-text">{{__(' (Masukkan angka 0 jika gratis)')}}</small></label>
                                                <input type="number" class="form-control"  id="cost" name="cost" placeholder="{{__('cost')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="available_tickets">{{__('Jumlah Kursi')}}</label>
                                                <input type="number" class="form-control"  id="available_tickets" name="available_tickets" placeholder="{{__('available tickets')}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer">{{__('Organizer/Penyelenggara')}}</label>
                                                <input type="text" class="form-control"  id="organizer" name="organizer" value="{{old('organizer')}}" placeholder="{{__('Event Organizer')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer_email">{{__('Organizer Email')}}</label>
                                                <input type="text" class="form-control"  id="organizer_email" name="organizer_email" value="{{old('organizer_email')}}" placeholder="{{__('Organizer Email')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone">{{__('Organizer Phone')}}</label>
                                                <input type="text" class="form-control"  id="organizer_phone" name="organizer_phone" value="{{old('organizer_phone')}}" placeholder="{{__('Organizer Phone')}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="venue">{{__('Tempat')}}</label>
                                                <input type="text" class="form-control"  id="venue" name="venue" value="{{old('venue')}}" placeholder="{{__('Tempat Event')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="venue_location">{{__('Maps Location')}}</label>
                                                <input type="text" class="form-control"  id="venue_location" name="venue_location" value="{{old('venue_location')}}" placeholder="{{__('Maps Location')}}">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group"><label>Lampiran</label></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">{{__('Image')}} <small>{{__('Recommended image size 1920x1280')}}</small></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input type="hidden" name="image">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Event Image')}}" data-modaltitle="{{__('Upload Event Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                        {{__('Upload Image')}}
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="image">{{__('Lampiran ToR')}} <small>{{__('Pdf File Only')}}</small></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_title">{{__('Meta Title')}}</label>
                                                <input type="text" name="meta_title"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="meta_tags">{{__('Meta Tags')}}<small> (pisahkan dengan koma (,))</small></label>
                                                <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" id="meta_tags">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Event')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
    <script>

    $(document).ready(function () {
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy" // Format tanggal "dd-mm-yyyy"
        });
    });

        (function($){
            "use strict";
            $(document).ready(function () {

                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = converToSlug($(this).val());
                    var url = `{{url('/events/')}}/` + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);

                });

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.blog_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `{{url('/events/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });


             <x-btn.submit/>
                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $.ajax({
                        url: "{{route('admin.events.category.by.lang')}}",
                        type: "POST",
                        data: {
                            _token : "{{csrf_token()}}",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $('#category').html('<option value="">Select Category</option>');
                            $.each(data,function(index,value){
                                $('#category').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });
                $('.summernote').summernote({
                    height: 400,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
            });
        })(jQuery)
    </script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
