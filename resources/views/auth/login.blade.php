@extends('_Administrator.layouts.login')
@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
        <div class="panel-heading"> 
            <h3 class="text-center"> Sign In to <strong class="text-custom">Blog</strong> </h3>
        </div> 


        <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" required="" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" required="" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox-signup" type="checkbox">
                        <label for="checkbox-signup">
                            Remember me
                        </label>
                    </div>
                    
                </div>
            </div>
            
            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>

        </form> 
        
        </div>   
        </div>                              
        
    </div>
@endsection