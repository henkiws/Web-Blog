@extends('_Administrator.layouts.main')
@section('content')
{{-- <div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ url('administrator/management/post/create') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> Add Post</a>
        </div>

        <h4 class="page-title">List Post</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Post</a>
            </li>
            <li class="active">
                All
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Basic example</b></h4>
            <div class="p-20">
                <table class="table m-0" id="data-table" data-url="{{ url('administrator/management/post/source') }}" data-column="[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'title', name: 'title'},
                    {data: 'author', name: 'author'},
                    {data: 'category', name: 'category'},
                    {data: 'tag', name: 'tag'},       
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Post</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Post</a>
                </li>
                <li class="active">
                    All
                </li>
            </ol>
        </div>
    </div>

    <!-- SECTION FILTER
    ================================================== -->
    <div class="row m-t-10 m-b-10">

        <div class="col-sm-12">
            <div class="btn-group pull-right m-b-15">
                <a href="{{ url('administrator/management/post/create') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> Add Post</a>
            </div>
        </div>

        <div class="col-sm-6">
            <form role="form">
                <div class="form-group contact-search m-b-0">
                    <input type="text" id="search" class="form-control product-search" placeholder="Search here...">
                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                </div> <!-- form-group -->
            </form>
        </div>

        <div class="col-sm-6">
            <div class="h5 m-0 text-right">
                <label class="vertical-middle m-r-10">Sort By:</label>
                <div class="btn-group vertical-middle" data-toggle="buttons">
                     <label class="btn btn-default btn-md waves-effect active">
                        <input type="radio" autocomplete="off" checked=""> Status
                     </label>
                     <label class="btn btn-default btn-md waves-effect">
                        <input type="radio" autocomplete="off"> Type
                     </label>
                     <label class="btn btn-default btn-md waves-effect">
                        <input type="radio" autocomplete="off"> Name
                     </label>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        @if( !$post->isEmpty() )
        <div class="m-b-15">
            @foreach($post as $item)
                <div class="col-sm-6 col-lg-3 col-md-4 desktops">
                    <div class="product-list-box thumb">
                        <a href="javascript:void(0);" class="image-popup" title="Screenshot-1">
                            <img src="{{ env('APP_IMG').$item->image->media_path }}" class="thumb-img" alt="work-thumbnail">
                        </a>

                        <div class="product-action">
                            <a href="{{ url('administrator/management/post/'.$item->id.'/edit') }}" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm del-data" data="{{ $item->id }}"><i class="md md-close"></i></a>
                        </div>

                        <div class="price-tag">
                            {{ $item->comment_count }} 
                        </div>
                        <div class="detail">
                            <h4 class="m-t-0"><a href="" class="text-dark">{{ $item->post_title }}</a> </h4>
                            <div class="rating">
                                <ul class="list-inline">
                                    {{ $item->comment_count }} Comments
                                </ul>
                            </div>
                            <h5 class="m-0"> <span class="text-muted">Writer : {{ $item->user->name }}</span></h5>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <span class="label label-success">{{ $item->post_status }}</span>
                            </div>
                            <div class="col-sm-6">
                                <span class="label label-primary">comment {{ $item->comment_status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $post->links() }}
        </div>
        @else
        <div class="col-sm-12 m-t-40">
            <div class="text-center">
                Data Tidak Ditemukan
            </div>
        </div>
        @endif
    </div> <!-- End row -->


</div> <!-- container -->
@endsection