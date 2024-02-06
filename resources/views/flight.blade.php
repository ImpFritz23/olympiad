<!DOCTYPE html>
<html>
<head>

  <title>Web Application Using Laravel</title>

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

<div class="container">

  <table class="table" id="id_user_table">
    
    <thead>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Action</th>
    </thead>

    <tbody id="id_user_list_data">
      
    </tbody>

  </table>


</div>

</body>

<script type="text/javascript">
  
display_user_list();

function display_user_list(){

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "user_data",
    success: function(data){

      var html;
      var i;

      for(i=0; i<data.length; i++){

        html += '<tr>';

        html += '<td>'+data[i].user_id+'</td>';
        html += '<td>'+data[i].first_name+'</td>';
        html += '<td>'+data[i].last_name+'</td>';
        html += '<td>'+data[i].email+'</td>';
        html += '<td>Action</td>';

        html += '</tr>';

      }

      $('#id_user_list_data').html(html);

    }

  });


  return false;

}

</script>


</html>