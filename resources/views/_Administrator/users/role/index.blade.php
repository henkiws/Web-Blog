@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ url('administrator/role/users/create') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> Add Role</a>
        </div>

        <h4 class="page-title">List Roles</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Roles</a>
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
                <table class="table m-0" id="data-table" data-url="{{ url('administrator/role/users/source') }}" data-column="[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'guard', name: 'guard'},       
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Guard</th>
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