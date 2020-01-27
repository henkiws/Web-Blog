@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">

        <h4 class="page-title">Add Post</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Post</a>
            </li>
            <li class="active">
                {{ isset($data) ? 'Edit' : 'Add' }}
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>General</b></h4>
            <form class="form-horizontal" role="form" method="POST" action="{{ isset($data) ? url('administrator/management/post/'.$data->id) : url('administrator/management/post') }}">    
                <div class="p-20">
                        @csrf
                        @if(isset($data))
                            <input type="hidden" name="_method" value="PUT" />
                        @endif                                
                        <div class="form-group">
                            <label class="col-md-1 control-label">Title</label>
                            <div class="col-md-11">
                                <input type="text" name="post_title" class="form-control" value="{{ isset($data) ? $data->post_title : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Main Image</label>
                            <div class="col-md-11">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image" value="{{ isset($data) ? $data->image->media_path : '' }}">
                                  </div>
                                  <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ isset($data) ? env('APP_IMG').$data->image->media_path : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Category</label>
                            <div class="col-md-11">
                                <div class="row" id="category">
                                    <div class="col-md-4">
                                        <select class="form-control" name="category" id="parent_cat">
                                            <option selected disabled>- Please Select -</option>
                                            
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Content</label>
                            <div class="col-md-11">
                                <textarea name="post_content" class="textEditor" placeholder="Masukan konten disini..." cols="80" rows="25">
                                    {{ isset($data) ? $data->post_content : '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Comment</label>
                            <div class="col-md-11">
                                <div class="radio radio-custom">
                                    <input type="radio" name="comment_status" value="open" {{ empty($data) ? '' : ( ($data->comment_status === "open") ? 'checked' : '' ) }}>
                                    <label for="radio12">Enabled</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="comment_status" value="close" {{ empty($data) ? '' : ( ($data->comment_status === "close") ? 'checked' : '' ) }}>
                                    <label for="radio12">Disabled</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Tags</label>
                            <div class="col-md-11">
                                <div class="tags-default">
                                    <?php $tags = ''; ?>
                                    @if(isset($data)) 
                                        @foreach($data->tags as $key => $val)
                                            <?php $tags .= $data->tags[$key]->tag->name.','; ?>
                                        @endforeach
                                    @endif
                                    <input type="text" data-role="tagsinput" placeholder="add tags" name="tags" value="{{ $tags }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Status</label>
                            <div class="col-md-11">
                                <div class="radio radio-success">
                                    <input type="radio" name="post_status" value="publish" {{ empty($data) ? '' : ( ($data->post_status === "publish") ? 'checked' : '' ) }}>
                                    <label for="radio12">Publish</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="post_status" value="draft"  {{ empty($data) ? '' : ( ($data->post_status === "draft") ? 'checked' : '' ) }}>
                                    <label for="radio12">Draft</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="m-t-0 header-title"><b>SEO</b></h4>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Meta Title</label>
                            <div class="col-md-11">
                                <input type="text" name="meta[]" class="form-control"
                                    @if(isset($data))
                                        @foreach( $data->meta as $val )
                                            @if( $val->meta_key === "title" )
                                                value="{{ $val->meta_value }}"
                                            @endif
                                        @endforeach
                                    @endif
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Meta Description</label>
                            <div class="col-md-11">
                                <textarea name="meta[]" class="form-control">
                                    @if(isset($data))
                                        @foreach( $data->meta as $val )
                                            @if( $val->meta_key === "description" )
                                                {{ $val->meta_value }}
                                            @endif
                                        @endforeach
                                    @endif
                                </textarea>
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