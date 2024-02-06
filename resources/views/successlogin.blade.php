<!DOCTYPE html>

<html>

 <head>
  <title>Simple Login System in Laravel</title>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/ionicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/AdminLTE.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/_all-skins.css') }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script type="text/javascript" src="{{ asset('dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dist/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dist/jquery.slimscroll.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dist/fastclick.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dist/adminlte.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dist/demo.js') }}"></script>

 </head>

<body class="hold-transition skin-green layout-top-nav">

<div class="wrapper">

  <header class="main-header">
  
    <nav class="navbar navbar-fixed-top">
    
      <div class="container">

        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Thundertech Systems</b> v2.0</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

            <ul class="nav navbar-nav">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showManagementTable">Data Management</a></li>
                <li><a href="#" class="showItemTable">Product Item</a></li>
                <li><a href="#" class="showUserTable">User Account</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showProductItemQuantity">Product Item Quantity</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cashiering<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showCashiering">Sales Income</a></li>
              </ul>
            </li>

            <!--
            <li class="dropdown">
                <button class="dropdown-toggle" id="hide">Hide</button>
                <button class="dropdown-toggle" id="show">Show</button>
            </li>
            -->

            </ul>

        </div>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">
                             @if(isset(Auth::user()->email))
                                <?php 
                                    $id = Auth::id();
                                    echo $id;
                                ?>
                                {{ Auth::user()->email }}
                        </span>
                    </a>

                    <ul class="dropdown-menu">
                        
                        <li class="user-footer">
                            
                          <div class="pull-right">
                            <a href="{{ url('/main/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                           @else
                            <script>window.location = "/main";</script>
                           @endif
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

      </div>

    </nav>

    </header>

<br>

<div class="content-wrapper">

    <br><br>

    <div class="container">

        <section class="content">

            <div class="row">

                <div class="box box-success">

                    <div class="box-header with-border">

                    </div>

                    <div class="box-body">

                        <div class="table-responsive">
                            
                            <table id="id_user_table_x" class="table table-striped table-bordered table-hover" style="width:100%">
                                
                                <thead>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Encoded By</th>
                                    <th>
                                        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modal_add_user_x">Create User</button>
                                    </th>
                                </thead>

                                <tbody id="id_user_data_x">
                                    
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>
                
            </div>

        </section>

    </div>

</div>

</div><!-- WRAPPER -->

<div id="modal_add_user_x" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New User:</h4>
      </div>
      <div class="modal-body">
        
        <form id="saveUserX" method="POST">
          @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name_x" name="first_name_x" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name_x" name="last_name_x" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email_x" name="email_x" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password_x" name="password_x" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="country">Role:</label>
            <select class="form-control select2" id="role_id_x" name="role_id_x" required>
                <option value="">--- Select Role ---</option>
                @foreach ($role as $key => $value)
                <option id="{{ $key }}" value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
        
          <button type="submit" class="btn btn-flat btn-success text-center">Submit</button>
        </div>

        </form>

      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      -->
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
    
retrieve_user_datax();

function retrieve_user_datax(){

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "user_account",
    success: function(data){

      var html;
      var i;

      for(i=0; i<data.length; i++){

        html += '<tr>';

        html += '<td>'+data[i].id+'</td>';
        html += '<td>'+data[i].first_name+'</td>';
        html += '<td>'+data[i].last_name+'</td>';
        html += '<td>'+data[i].email+'</td>';
        html += '<td>'+data[i].role_name+'</td>';
        html += '<td>'+data[i].encoded_by+'</td>';

        //html += '<td>Action</td>';

        html += '<td>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-primary ReadUserX" data-id="'+data[i].id+'" data-first_name ="'+data[i].first_name+'" data-last_name ="'+data[i].last_name+'" data-email ="'+data[i].email+'">Read</a>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-warning UpdateUserX" data-id="'+data[i].id+'" data-first_name ="'+data[i].first_name+'" data-last_name ="'+data[i].last_name+'" data-email ="'+data[i].email+'">Edit</a>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-danger DeleteUserX" data-id="'+data[i].id+'">Delete</a>';

        html += '</td>';

        html += '</tr>';
      }

      $('#id_user_data_x').html(html);
    }

  });

  return false;
}

$('#id_user_table_x').on('click','.ReadUserX',function(){
    
    var id = $(this).data('id');
    var first_name = $(this).data('first_name');
    var last_name = $(this).data('last_name');
    var email = $(this).data('email');

    alert(id);
    alert(first_name);
    alert(last_name);
    alert(email);

    return false;

});

$('#id_user_table_x').on('click','.UpdateUserX',function(){
    
    var id = $(this).data('id');
    var first_name = $(this).data('first_name');
    var last_name = $(this).data('last_name');
    var email = $(this).data('email');

    alert(id);
    alert(first_name);
    alert(last_name);
    alert(email);

    return false;

});

$('#id_user_table_x').on('click','.DeleteUserX',function(){
    
    var id = $(this).data('id');

    alert(id);

    return false;

});

$('#saveUserX').submit('click',function(){

    var first_name = $('#first_name_x').val();
    var last_name = $('#last_name_x').val();
    var email = $('#email_x').val();
    var password = $('#password_x').val();
    var role_id = $('#role_id_x').val();

    //var creator_id = id();

    /*
    alert(first_name);
    alert(last_name);
    alert(email);
    alert(password);
    alert(creator_id);
    */

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {first_name:first_name, last_name:last_name, email:email, password:password, role_id:role_id},
      url: "insert_userx",
      success: function(data){

          alert("Success");

          retrieve_user_datax();

          $('#first_name_x').val('');
          $('#last_name_x').val('');
          $('#email_x').val('');
          $('#password_x').val('');
          $('#role_id_x').val('');
      },
      error: function(data){

          alert("Error!");
      }

    });

    return false;
});

</script>

</html>