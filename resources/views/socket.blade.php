<!DOCTYPE html>

<html>

 <head>
  <title>Socket Page</title>

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

  <!-- <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script> -->

  <script src="{{ asset('dist/socket.io.min.js') }}" crossorigin="anonymous"></script>

</head>

<body class="hold-transition skin-green layout-top-nav">


    <!-- START -->
    <div class="container">

        <button class="btn btn-primary" onclick="insert_data()">Click</button>

        <section class="content">

            <div class="row">

                <div class="box box-success">

                    <div class="box-header with-border">

                    </div>

                      <div class="modal-body box-body" id="id_socket_list">
                      


                      </div>

                </div>

            </div>

        </section>

    </div>

    <!-- END -->


</body>

<script type="text/javascript">
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

</script>

<script type="text/javascript">

display_all_socket_list();

function display_all_socket_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_socket_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_socket_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_socket_list", true);
  xhttp.send();
}


function insert_data(){

    var data = "Fritz Imperial";

    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: {data:data},
        url: "insert_socket",
        success: function(data){

            //alert("yes");
            //display_all_socket_list();
            load();
        }
    });

    return false;
}

load();

function load(){

    let ip_address = '10.0.0.106';
    let socket_port = '3000';
    let socket = io(ip_address + ':' + socket_port);

    let message = "Message";
    console.log(message);

    socket.emit('sendChatToServer', message);

    socket.on('sendChatToClient', (message) => {
        
        //insert_data();

        display_all_socket_list();
    });
}

</script>


<!-- <script type="text/javascript">
  
    $(function(){
        let ip_address = '10.10.65.238';
        let socket_port = '3000';
        let socket = io(ip_address + ':' + socket_port);

        let chatInput = $('#chatInput');

        chatInput.keypress(function(e) {

            let message = $(this).html();
            console.log(message);
            if(e.which === 13 && !e.shiftKey){
                socket.emit('sendChatToServer', message);
                chatInput.html('');
                return false;
            }
        });

        socket.on('sendChatToClient', (message) => {
            $('.chat-content ul').append(`<li>${message}</li>`);
        });

    });

</script> -->

</html>