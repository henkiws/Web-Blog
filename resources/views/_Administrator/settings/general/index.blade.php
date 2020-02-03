@extends('_Administrator.layouts.main')
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            @if($data == null)
            <a href="{{ url('administrator/settings/general/create') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> Add</a>
            @else
            <a href="{{ url('administrator/settings/general/'.$data["slug"].'/edit') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> Edit</a>
            @endif
        </div>

        <h4 class="page-title">Setting</h4>
        <ol class="breadcrumb">
            <li>
                Settings
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
            <div class="p-20">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tagline</th>
                            <th>Sub Tagline</th>
                            <th>Social Media</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data == null)
                        <tr>
                            <td colspan="5" align="center">Data Tidak Ditemukan</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['tagline'] }}</td>
                            <td>{!! $data['sub_tagline'] !!}</td>
                            <td>
                                <p>Facebook : {{ $data['facebook'] }}</p>
                                <p>Twitter : {{ $data['twitter'] }}</p>
                                <p>Instagram : {{ $data['instagram'] }}</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <hr>
            <h4 class="m-t-0 header-title"><b>About Us</b></h4>
            <div class="p-20">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>About Us</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data == null)
                        <tr>
                            <td align="center">Data Tidak Ditemukan</td>
                        </tr>
                        @else
                        <tr>
                            <td>{!! $data['about_us'] !!}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <hr>
            <h4 class="m-t-0 header-title"><b>SEO</b></h4>
            <div class="p-20">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Meta Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data == null)
                        <tr>
                            <td colspan="3" align="center">Data Tidak Ditemukan</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $data['meta_title'] }}</td>
                            <td>{{ $data['meta_description'] }}</td>
                            <td>
                                <img src="{{ url('/').$data['meta_image'] }}" class="img-responsive">
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection