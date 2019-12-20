@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <button class="btn btn-default waves-effect waves-light" id="btn-modal"><i class="fa fa-plus"></i> Add User</button>
        </div>

        <h4 class="page-title">List Users</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Users</a>
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
                <table class="table m-0" id="data-table" id="data-table" data-url="{{ url('administrator/users/source') }}" data-column="[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},            
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
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

{{-- Modal --}}
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <form id="form-modal">
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><span id="title-status">Add</span> New User</h4> 
            </div> 
            <div class="modal-body" style="display: grid;"> 
                <div class="form-group">
                    <label class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Enter Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Role</label>
                    <div class="col-sm-8">
                        <select name="role" class="form-control" required>
                            <option selected disabled>-- Please Select --</option>
                            @foreach( $role as $key=>$item )
                                <option value="{{ $item }}" {{ (empty($data)) ? '' : ( ($data->name == $item) ? 'selected' : '' ) }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> 
            <div class="modal-footer"> 
                <button type="submit" class="btn btn-default btn-custom btn-rounded waves-effect waves-light">Save</button> 
            </div> 
        </div>
        </form> 
    </div>
</div><!-- /.modal -->
@endsection