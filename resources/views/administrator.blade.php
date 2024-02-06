<!DOCTYPE html>

<html>

 <head>
  <title>Administrator Page</title>

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
          
          <!-- <a href="#" class="navbar-brand"><b>Naga College Foundation</b> v2.0</a> -->

          <img src="{{ asset('images/logo.png')}}" class="user-image" alt="User Image">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

            <ul class="nav navbar-nav">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showManagementTable">User Accounts</a></li>
                <li><a href="#" class="showItemTable">Events</a></li>
                <li><a href="#" class="showUserTable">Contestants</a></li>
                <li><a href="#" class="showUserTable">Criteria</a></li>
              </ul>
            </li>

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

              <div class="box box-success" id="id_user_hide_show">

                  <div class="box-header with-border">


                  </div>

                  <div class="modal-body box-body" id="id_user_list">


                  </div>

              </div>

              <div class="box box-success">

                  <div class="box-header with-border">

                  </div>

                  <div class="modal-body box-body" id="id_event_list">


                  </div>

              </div>

              <div class="box box-success">

                  <div class="box-header with-border">

                  </div>

                  <div class="modal-body box-body" id="id_contestant_list">
                  

                  </div>

                </div>

                <div class="box box-success">

                  <div class="box-header with-border">

                  </div>

                  <div class="modal-body box-body" id="id_category_list">
                  

                  </div>

                </div>

                <div class="box box-success">

                  <div class="box-header with-border">

                  </div>

                  <div class="modal-body box-body" id="id_criteria_list">
                  

                  </div>

                </div>

<!--                 <div class="box box-success">

                  <div class="box-header with-border">
                    
                  </div>

                  <div class="modal-body box-body">
                    
                      <div class="col-md-6">

                        <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Tab 1</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tab 3</a></li>

                      
                        </ul>

                        <div class="tab-content">

                          <div class="tab-pane active" id="tab_1">

                            First

                          </div>

                          <div class="tab-pane" id="tab_2">

                            Second

                          </div>

                          <div class="tab-pane" id="tab_3">

                            Third

                          </div>

                        </div>

                        </div>

                      </div>
                  
                </div>
            
                </div> -->

      </section>

  </div>

</div>

  <div class="modal fade" id="modal_add_user" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">

          <form id="saveUser" action="post">

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="name" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
              <label>Role:</label>
               <select class="form-control select2" id="role_id" name="role_id" required>
                  <option value="">--- Select Role ---</option>
                  @foreach ($role as $key => $value)
                  <option id="{{ $key }}" value="{{ $key }}">{{ $value }}</option>
                  @endforeach
            </select>

            </div>

            <button type="submit" class="btn btn-default">Submit</button>
          
          </form>

        </div>

      </div>
      
    </div>

  </div>

  <div class="modal fade" id="modal_read_user" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Read User</h4>
        </div>
        <div class="modal-body">

          <form id="" action="post">

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="name" class="form-control" id="namex" name="namex" readonly>
            </div>

            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="emailx" name="emailx" readonly>
            </div>
            
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="passwordx" name="passwordx" readonly>
            </div>
            
            <div class="form-group">
              <label>Role:</label>
               <select class="form-control select2" id="role_idx" name="role_idx" readonly>
                  <option value="">--- Select Role ---</option>
                  @foreach ($role as $key => $value)
                  <option id="{{ $key }}" value="{{ $key }}">{{ $value }}</option>
                  @endforeach
            </select>

            </div>

            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
          
          </form>

        </div>

      </div>
      
    </div>

  </div>


  <div class="modal fade" id="modal_update_user" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Read User</h4>
        </div>
        <div class="modal-body">

          <form id="updateUser" action="post">

            <div class="form-group">
              <label for="id">ID:</label>
              <input type="text" class="form-control" id="id" name="id">
            </div>

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="name" class="form-control" id="namexx" name="namexx">
            </div>

            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="emailxx" name="emailxx">
            </div>
            
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="passwordxx" name="passwordxx">
            </div>
            
            <div class="form-group">
              <label>Role:</label>
               <select class="form-control select2" id="role_idxx" name="role_idxx">
                  <option value="">--- Select Role ---</option>
                  @foreach ($role as $key => $value)
                  <option id="{{ $key }}" value="{{ $key }}">{{ $value }}</option>
                  @endforeach
            </select>

            </div>

            <button type="submit" class="btn btn-warning">Update</button>
          
          </form>

        </div>

      </div>
      
    </div>

  </div>

<!-- <div class="content-wrapper">

    <div class="container">

        <section class="content">

            <div class="row">





            </div>
     
        </section>

    </div>

</div> -->

</div><!-- WRAPPER -->

</body>



<script type="text/javascript">
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

</script>

<script type="text/javascript">
  
$(document).ready(function(){

    $("id_user_hide_show").hide();

    // $("#id_user_hide_show").click(function(){
    //   $("p").hide();
    // });

    // $("#show").click(function(){
    //   $("p").show();
    // });
});

</script>


<script type="text/javascript">

function ReadUserData(name, email, id, role_id){

  // console.log(id);
  // console.log(name);
  // console.log(email);
  // console.log(role_id);

  $('#namex').val(name);
  $('#emailx').val(email);
  $('#passwordx').val(name);
  $('#role_idx').val(role_id);


  $('#modal_read_user').modal('show');

  return false;
}


function UpdateUserData(name, email, id, role_id){

  //console.log(id);
  // console.log(name);
  // console.log(email);
  // console.log(role_id);

  $('#id').val(id);
  $('#namexx').val(name);
  $('#emailxx').val(email);
  //$('#passwordxx').val(name);
  $('#role_idxx').val(role_id);



  $('#modal_update_user').modal('show');

  return false;
}


$('#updateUser').submit('click',function(){

    var id = $('#id').val();
    var name = $('#namexx').val();
    var email = $('#emailxx').val();
    var password = $('#passwordxx').val();
    var role_id = $('#role_idxx').val();

      $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {id:id, name:name, email:email, role_id:role_id},
      url: "update_user_x",
      success: function(data){

          alert("Update Success");

          display_all_user_list();
      }

    });

      return false;
});


function DeleteUserData(id){

  //console.log(id);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {id:id},
      url: "delete_user_x",
      success: function(data){

          alert("Delete Success");

          display_all_user_list();
      }

    });

  return false;
}

function show_item(str){

    var xhttp;
        
    if (str == "") {
        document.getElementById("show_item").innerHTML = "";
        return;
    }
            
    xhttp = new XMLHttpRequest();
           
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("id_user_list").innerHTML = this.responseText;
        }
    };
         
    xhttp.open("GET", "search_user_x?q="+str, true);
    xhttp.send();
}

display_all_user_list();

function display_all_user_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_user_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_user_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_user_list", true);
  xhttp.send();
}

$('#saveUser').submit('click',function(){

    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role_id = $('#role_id').val();

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {name:name, email:email, password:password, role_id:role_id},
      url: "insert_user_x",
      success: function(data){

          alert("Success");

          $('#name').val('');
          $('#email').val('');
          $('#password').val('');
          $('#role_id').val('');

          display_all_user_list();
      }

    });


    return false;
});


</script>



<script type="text/javascript">

display_all_event_list();

function display_all_event_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_event_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_event_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_event_list", true);
  xhttp.send();
}


display_all_contestant_list();

function display_all_contestant_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_contestant_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_contestant_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_contestant_list", true);
  xhttp.send();
}

display_all_category_list();

function display_all_category_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_category_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_category_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_category_list", true);
  xhttp.send();
}

display_all_criteria_list();

function display_all_criteria_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_criteria_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_criteria_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_criteria_list", true);
  xhttp.send();
}

</script>


</html>