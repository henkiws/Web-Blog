@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">

        <h4 class="page-title">List Post</h4>
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
            <h4 class="m-t-0 header-title"><b>Basic example</b></h4>
            <form class="form-horizontal" role="form" method="POST" action="{{ isset($data) ? url('administrator/role/users/'.$data->id) : url('administrator/role/users') }}">    
                <div class="p-20">
                        @csrf
                        @if(isset($data))
                            <input type="hidden" name="_method" value="PUT" />
                        @endif                                
                        <div class="form-group">
                            <label class="col-md-2 control-label">Role Name</label>
                            <div class="col-md-10">
                                <textarea name="" class="textEditor" placeholder="Masukan konten disini..." cols="80" rows="15"></textarea>
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

@push('js')
<script src="{{ asset('assets/plugins') }}/tinymce/tinymce.min.js"></script>
@endpush

@push('script')
<script>
    // tinymce.init({
    //   selector: '.textEditor',
    //   plugins: 'link lists image advlist fullscreen media code table emoticons textcolor codesample hr preview',
    //   menubar: false,
    //   toolbar: [
    //     'undo redo | bold italic underline strikethrough forecolor backcolor bullist numlist | blockquote subscript superscript | alignleft aligncenter alignright alignjustify | image media link',
    //     ' formatselect | cut copy paste selectall | table emoticons hr | removeformat | preview code | fullscreen',
    //   ],
    // });
    tinymce.init({
        selector: '.textEditor',
        plugins: 'image code',
        toolbar: 'undo redo | image code',

        /* without images_upload_url set, Upload tab won't show up*/
        images_upload_url: 'postAcceptor.php',

        /* we override default upload handler to simulate successful upload*/
        images_upload_handler: function (blobInfo, success, failure) {
            setTimeout(function () {
            /* no matter what you upload, we will turn it into TinyMCE logo :)*/
            success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
            }, 2000);
        }
    });
</script>
  
@endpush