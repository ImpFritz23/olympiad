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
		
    <div class="login-box-body" id="id_div_container">
    
      <h4 class="login-box-msg" >Login Here</h4>

      <form method="post" action="<?php //echo base_url('c_login/process') ;?>">

      	<!--
      	<div class="alert alert-danger alert-dismissible divLoginError" id="id_login_error">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Error! Please contact your adminsitrator!
        </div>
    	-->
    	
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username or ID Number ..." required>
          
        </div>
        
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="passwordx" name="passwordx" placeholder="Password ..." required>
         
        </div>
        
        <div class="social-auth-links text-center">
          
            <button type="button" id="login_user" onclick="loginUser()" class="btn btn-block btn-social btn-success btn-flat">Sign-In</button>

        </div>

        <!--
        <div class="social-auth-links text-center">          

          <button type="submit" class="btn btn-block btn-social btn-success btn-flat">
            <i class="fa fa-facebook"></i>Sign-in
          </button>
     
        </div>
        -->

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


<script type="text/javascript">
	
function loginUser(){

	var username = $("#username").val();
    var passwordx = $("#passwordx").val();

    if(username.length == '' || passwordx.length == ''){

          alert("All fields are required!");
    }

    else {

    	$.ajax({
              type : "POST",
              dataType: "JSON",
              data : {username:username, passwordx:passwordx},
              url  : "test_login",
              success: function(data){

                  if(data == true){

                       //$('#id_login_error').hide(500);

                       //window.location.href = "router";

                       alert("Success Login!");

                  }

                  else {

                      //$('#id_login_error').show(500);

                      alert("Login Failed!");
                  }

              },
              error: function(data){

                  alert("Login Error!");
              }
        });
    }
}


</script>

</html>