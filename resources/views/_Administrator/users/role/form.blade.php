@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">

        <h4 class="page-title">List Roles</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Roles</a>
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
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  name="name" value="{{ isset($data) ? $data->name : '' }}">
                                @if ($errors->has('name'))
                                    <div class="form-text text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-lg-12"> 
                            <ul class="nav nav-tabs tabs" style="width: 100%;">
                                <li class="tab active" style="width: 25%;">
                                    <a href="#read" data-toggle="tab" aria-expanded="true" class="active"> 
                                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                        <span class="hidden-xs">Read</span> 
                                    </a> 
                                </li> 
                                <li class="tab" style="width: 25%;"> 
                                    <a href="#create" data-toggle="tab" aria-expanded="false" class=""> 
                                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                        <span class="hidden-xs">Create</span> 
                                    </a> 
                                </li> 
                                <li class="tab" style="width: 25%;"> 
                                    <a href="#update" data-toggle="tab" aria-expanded="false" class=""> 
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                        <span class="hidden-xs">Update</span> 
                                    </a> 
                                </li> 
                                <li class="tab" style="width: 25%;"> 
                                    <a href="#delete" data-toggle="tab" aria-expanded="false" class=""> 
                                        <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                        <span class="hidden-xs">Delete</span> 
                                    </a> 
                                </li>
                                <li class="tab" style="width: 25%;"> 
                                    <a href="#optional" data-toggle="tab" aria-expanded="false" class=""> 
                                        <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                        <span class="hidden-xs">Optional</span> 
                                    </a> 
                                </li> 
                            <div class="indicator" style="right: 394px; left: 0px;"></div></ul> 
                            <div class="tab-content"> 
                                <div class="tab-pane active" id="read" style="display: block;"> 
                                    <div class="row">
                                        @foreach($permission_read as $item)
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-custom">
                                                @if(isset($rolePermisson))
                                                <input type="checkbox" name="permission[]" value="{{ $item }}" @foreach($rolePermisson as $val) @if($val->name==$item) checked @endif  @endforeach> <label> {{ $item }}</label>
                                                @else
                                                <input type="checkbox" name="permission[]" value="{{ $item }}"> <label>{{ $item }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                                <div class="tab-pane" id="create" style="display: none;">
                                    <div class="row">
                                        @foreach($permission_create as $item)
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-custom">
                                                @if(isset($rolePermisson))
                                                <input type="checkbox" name="permission[]" value="{{ $item }}" @foreach($rolePermisson as $val) @if($val->name==$item) checked @endif  @endforeach> <label>{{ $item }}</label>
                                                @else
                                                <input type="checkbox" name="permission[]" value="{{ $item }}"> <label>{{ $item }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                                <div class="tab-pane" id="update" style="display: none;">
                                    <div class="row">
                                        @foreach($permission_update as $item)
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-custom">
                                                @if(isset($rolePermisson))
                                                <input type="checkbox" name="permission[]" value="{{ $item }}" @foreach($rolePermisson as $val) @if($val->name==$item) checked @endif  @endforeach> <label>{{ $item }}</label>
                                                @else
                                                <input type="checkbox" name="permission[]" value="{{ $item }}"> <label>{{ $item }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                                <div class="tab-pane" id="delete" style="display: none;">
                                    <div class="row">
                                        @foreach($permission_delete as $item)
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-custom">
                                                @if(isset($rolePermisson))
                                                <input type="checkbox" name="permission[]" value="{{ $item }}" @foreach($rolePermisson as $val) @if($val->name==$item) checked @endif  @endforeach> <label>{{ $item }}</label>
                                                @else
                                                <input type="checkbox" name="permission[]" value="{{ $item }}"> <label>{{ $item }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                                <div class="tab-pane" id="optional" style="display: none;">
                                    <div class="row">
                                        @foreach($permission_optional as $item)
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-custom">
                                                @if(isset($rolePermisson))
                                                <input type="checkbox" name="permission[]" value="{{ $item }}" @foreach($rolePermisson as $val) @if($val->name==$item) checked @endif  @endforeach> <label>{{ $item }}</label>
                                                @else
                                                <input type="checkbox" name="permission[]" value="{{ $item }}"> <label>{{ $item }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                            </div> 
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