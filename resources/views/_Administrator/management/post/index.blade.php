@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
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
</div>
@endsection