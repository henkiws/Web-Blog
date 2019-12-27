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
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  name="name" value="{{ isset($data) ? $data->name : '' }}">
                                @if ($errors->has('name'))
                                    <div class="form-text text-danger">{{ $errors->first('name') }}</div>
                                @endif
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