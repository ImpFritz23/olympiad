<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/blue.css') }}">
    

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!--
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dist/bootstrap.min.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dist/font-awesome.min.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dist/ionicons.min.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dist/AdminLTE.min.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dist/blue.css') ;?>">
    -->
  

<script type="text/javascript" src="{{ asset('dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('dist/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('dist/icheck.min.js')}}"></script>
  
    <title>Login Interface</title>

</head>
 
<body class="hold-transition login-page">

    <div class="login-box">

    <div class="wrapper">
        
          <br />
          <div class="login-box-body">
           <h4 class="login-box-msg" >Naga College Foundation, Inc.</h4>

           @if(isset(Auth::user()->email))
            <script>window.location="/main/successlogin";</script>
           @endif

           @if ($message = Session::get('error'))
           <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
           </div>
           @endif

           @if (count($errors) > 0)
            <div class="alert alert-danger">
             <ul>
             @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
             </ul>
            </div>
           @endif

           <form method="post" action="{{ url('/main/checklogin') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback">
             <input type="email" name="email" class="form-control" placeholder="Input Email Address" required>
            </div>
            
            <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Input Password" required>
            </div>
            
            <div class="form-group">
             <input type="submit" name="login" class="btn btn-block btn-social btn-success btn-flat" value="Login" />
            </div>
           
           </form>

          </div>
    </div>

</div>

</body>

<script type="text/javascript">
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

</script>

</html>