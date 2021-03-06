@extends('layouts.app')
@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            
            <div class="panel-body">
                <form method="post" action="index.html" role="form" class="text-center">
                    <div class="user-thumb">
                        <img src="assets/images/users/avatar-1.jpg" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                    </div>
                    <div class="form-group">
                        <h3>Chadengle</h3>
                        <p class="text-muted">
                            Enter your password to access the admin.
                        </p>
                        <div class="input-group m-t-30">
                            <input type="password" class="form-control" placeholder="Password" required="">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default w-sm waves-effect waves-light">
                                    Log In
                                </button> 
                            </span>
                        </div>
                    </div>
                    
                </form>
    

            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    Not Chadengle?<a href="page-login.html" class="text-primary m-l-5"><b>Sign In</b></a>
                </p>
            </div>
        </div>

    </div>
@endsection