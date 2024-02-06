<!DOCTYPE html>
<html>
<head>

  <title>2.0 Web Application Using Laravel</title>

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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>


</head>

<body>

<br>



<div class="container">
  
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modal_add_user">Create User</button>

  <table class="table" id="id_user_table">
  
  <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Action</th>
  </thead>

  <tbody id="id_user_data">
    
  </tbody>

</table>

</div>


<div id="modal_add_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New User:</h4>
      </div>
      <div class="modal-body">
        
        <form id="saveUser" method="POST">
          @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div>

        <!--
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" class="form-control" required>
        </div>
        -->

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

<div id="modal_read_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Read User:</h4>
      </div>
      <div class="modal-body">
        
        <form id="saveUserXXX" method="post">

        <div class="form-group">
            <label for="user_idx">User ID:</label>
            <input type="text" id="user_idx" name="user_idx" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_namex" name="first_namex" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_namex" name="last_namex" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="emailx" name="emailx" class="form-control" readonly>
        </div>

        <!--
        <div class="form-group">
        
          <button type="submit" class="btn btn-flat btn-success text-center">Submit</button>
        </div>
        -->

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

<div id="modal_update_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update User:</h4>
      </div>
      <div class="modal-body">
        
        <form id="updateUser" method="post">

        <div class="form-group">
            <label for="user_idxx">User ID:</label>
            <input type="text" id="user_idxx" name="user_idxx" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="first_namexx">First Name:</label>
            <input type="text" id="first_namexx" name="first_namexx" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_namexx">Last Name:</label>
            <input type="text" id="last_namexx" name="last_namexx" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="emailxx">Email:</label>
            <input type="text" id="emailxx" name="emailxx" class="form-control" required>
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

$('#saveUser').submit('click',function(){

    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    //var password = $('#password').val();

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {first_name:first_name, last_name:last_name, email:email},
      url: "insert_user",
      success: function(data){

          alert("Success");
          retrieve_user_data();

          $('#first_name').val('');
          $('#last_name').val('');
          $('#email').val('');
      }

    });

    return false;
});
  
retrieve_user_data();

function retrieve_user_data(){

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "user_data_2",
    success: function(data){

      var html;
      var i;

      for(i=0; i<data.length; i++){

        html += '<tr>';

        html += '<td>'+data[i].user_id+'</td>';
        html += '<td>'+data[i].first_name+'</td>';
        html += '<td>'+data[i].last_name+'</td>';
        html += '<td>'+data[i].email+'</td>';
        //html += '<td>Action</td>';

        html += '<td>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-primary ReadUser" data-user_id="'+data[i].user_id+'" data-first_name ="'+data[i].first_name+'" data-last_name ="'+data[i].last_name+'" data-email ="'+data[i].email+'">Read</a>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-warning UpdateUser" data-user_id="'+data[i].user_id+'" data-first_name ="'+data[i].first_name+'" data-last_name ="'+data[i].last_name+'" data-email ="'+data[i].email+'">Edit</a>';

        html += '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-danger DeleteUser" data-user_id="'+data[i].user_id+'">Delete</a>';

        html += '</td>';

        html += '</tr>';
      }

      $('#id_user_data').html(html);
    }

  });

  return false;
}

</script>

<script type="text/javascript">
  
  $('#id_user_table').on('dblclick','.DeleteUser',function(){

    
    var user_id = $(this).data('user_id');

    //alert(user_id);
    
    if(confirm("Are you sure you want to delete?")){

      $.ajax({
        type: "POST",
        dataType: "JSON",
        data: {user_id:user_id},
        url: "delete_user",
        success: function(data){

          alert("Data Successfully Deleted!");

          retrieve_user_data();;
        }
      });
    }

    return false;
  });


  $('#id_user_table').on('click','.ReadUser',function(){
    
    var user_id = $(this).data('user_id');
    var first_name = $(this).data('first_name');
    var last_name = $(this).data('last_name');
    var email = $(this).data('email');
    
    $('#user_idx').val(user_id);
    $('#first_namex').val(first_name);
    $('#last_namex').val(last_name);
    $('#emailx').val(email);

    if(confirm("Are you sure you want to view record?")){

        $('#modal_read_user').modal('show');  
    }

    return false;
  });


    $('#id_user_table').on('click','.UpdateUser',function(){
    
    var user_id = $(this).data('user_id');
    var first_name = $(this).data('first_name');
    var last_name = $(this).data('last_name');
    var email = $(this).data('email');
    
    $('#user_idxx').val(user_id);
    $('#first_namexx').val(first_name);
    $('#last_namexx').val(last_name);
    $('#emailxx').val(email);
    
    if(confirm("Are you sure you want to update record?")){

        $('#modal_update_user').modal('show');  
    }
    
    return false;
  });


$('#updateUser').submit('click',function(){

    var user_id = $('#user_idxx').val();
    var first_name = $('#first_namexx').val();
    var last_name = $('#last_namexx').val();
    var email = $('#emailxx').val();

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {user_id:user_id, first_name:first_name, last_name:last_name, email:email},
      url: "update_user",
      success: function(data){

          alert("Success");
          
          retrieve_user_data();

          $('#user_idxx').val('');
          $('#first_namexx').val('');
          $('#last_namexx').val('');
          $('#emailxx').val('');
          
          $('#modal_update_user').modal('hide');
      }

    });
  
    return false;
});

</script>

</html>