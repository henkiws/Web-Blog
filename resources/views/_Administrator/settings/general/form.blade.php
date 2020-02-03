@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">

        <h4 class="page-title">Add</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Setting</a>
            </li>
            <li class="active">
                General
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>General</b></h4>
            <form class="form-horizontal" role="form" method="POST" action="{{ isset($data) ? url('administrator/settings/general/'.$data['slug']) : url('administrator/settings/general') }}">    
                <div class="p-20">
                        @csrf
                        @if(isset($data))
                            <input type="hidden" name="_method" value="PUT" />
                        @endif                                
                        <div class="form-group">
                            <label class="col-md-1 control-label">Website Name</label>
                            <div class="col-md-11">
                                <input type="text" name="name" class="form-control" value="{{ isset($data) ? $data['name'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Tagline</label>
                            <div class="col-md-11">
                                <input type="text" name="tagline" class="form-control" value="{{ isset($data) ? $data['tagline'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Sub Tagline</label>
                            <div class="col-md-11">
                                <textarea name="sub_tagline" class="form-control">
                                    {{ isset($data) ? $data['sub_tagline'] : '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">About Us</label>
                            <div class="col-md-11">
                                <textarea name="about_us" class="textEditor" cols="80" rows="25">
                                    {{ isset($data) ? $data['about_us'] : '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Facebook</label>
                            <div class="col-md-11">
                                <input type="text" name="facebook" class="form-control" placeholder="example: https://instagram.com/username" value="{{ isset($data) ? $data['facebook'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Twitter</label>
                            <div class="col-md-11">
                                <input type="text" name="twitter" class="form-control" placeholder="example: https://instagram.com/username" value="{{ isset($data) ? $data['twitter'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Instagram</label>
                            <div class="col-md-11">
                                <input type="text" name="instagram" class="form-control" placeholder="example: https://instagram.com/username" value="{{ isset($data) ? $data['instagram'] : '' }}">
                            </div>
                        </div>
                        <hr>
                        <h4 class="m-t-0 header-title"><b>SEO</b></h4>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Meta Title</label>
                            <div class="col-md-11">
                                <input type="text" name="meta[]" class="form-control" value="{{ isset($data) ? $data['meta_title'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Meta Description</label>
                            <div class="col-md-11">
                                <textarea name="meta[]" class="form-control">
                                    {{ isset($data) ? $data['meta_description'] : '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Meta Image</label>
                            <div class="col-md-11">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="meta[]" value="{{ isset($data) ? $data['meta_image'] : '' }}">
                                  </div>
                                  <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ isset($data) ? env('APP_IMG').$data['meta_image'] : '' }}">
                            </div>
                        </div>
                    <div align="right">
                        <button type="submit" class="btn btn-default btn-custom btn-rounded waves-effect waves-light">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('css')
<link href="{{ asset('/') }}assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
@endpush

@push('js')
{{-- <script src="{{ asset('assets/plugins') }}/tinymce/tinymce.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    var url_img = "{{ url('administrator/management/post/create/images') }}"
</script>
<script src="{{ asset('/') }}assets/js/custom/post.js"></script>
@endpush

@push('script')
<script>
    $(function(){
        $('#lfm').filemanager('image');
    })
</script>
@endpush