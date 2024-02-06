<!DOCTYPE html>

<html>

 <head>
  <title>Judge Page</title>

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


<style type="text/css">
  
@media screen and (min-width: 1000px) {

  .modal-lg{
      width:1000px;
  }

  .modal-sm{
      width:300px;
  }


}

</style>

<style>
    /* FROM HTTP://WWW.GETBOOTSTRAP.COM
     * Glyphicons
     *
     * Special styles for displaying the icons and their classes in the docs.
     */

    .bs-glyphicons {
      padding-left: 0;
      padding-bottom: 1px;
      margin-bottom: 20px;
      list-style: none;
      overflow: hidden;
    }

    .bs-glyphicons li {
      float: left;
      width: 25%;
      height: 115px;
      padding: 10px;
      margin: 0 -1px -1px 0;
      font-size: 12px;
      line-height: 1.4;
      text-align: center;
      border: 1px solid #ddd;
    }

    .bs-glyphicons .glyphicon {
      margin-top: 5px;
      margin-bottom: 10px;
      font-size: 24px;
    }

    .bs-glyphicons .glyphicon-class {
      display: block;
      text-align: center;
      word-wrap: break-word; /* Help out IE10+ with class names */
    }

    .bs-glyphicons li:hover {
      background-color: rgba(86, 61, 124, .1);
    }

    @media (min-width: 768px) {
      .bs-glyphicons li {
        width: 12.5%;
      }
    }
  </style>

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

<!--             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showManagementTable">User Accounts</a></li>
                <li><a href="#" class="showItemTable">Events</a></li>
                <li><a href="#" class="showUserTable">Contestants</a></li>
                <li><a href="#" class="showUserTable">Criteria</a></li>
              </ul>
            </li> -->

            </ul>

        </div>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">
                             @if(isset(Auth::user()->email))
                                
                              {{ Auth::user()->email }}
                                <?php 
                                    $id = Auth::id();
                                    echo "";
                                    echo $id;
                                    echo ""
                                ?>
                                
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


                        <div class="box-header">

                            <center><h3 class="box-title">List of Candidates</h3></center>
                        
                        </div>
                    
                        <!-- Working Code -->
                        <div class="box-body">

                           <div class="tab-content">

                                <div class="tab-pane active" id="glyphicons">

                                    <ul class="bs-glyphicons" id="id_show_candidate">

                                    </ul>

                                </div>

                           </div>

                        </div>
              
                </div>

            </div>
     
            <div class="row">

<!--                 <div class="box box-success">

                    <div class="box-header with-border">

                        <center><h3 class="box-title">Tabulation Result</h3></center>

                    </div>

                    <div class="modal-body box-body" id="id_show_result_array">


                    </div>

                </div> -->

                <div class="box box-success">

                    <div class="box-header with-border">

                        <center><h3 class="box-title">Working Tabulation Result</h3></center>

                    </div>

                    <!-- Working Code -->
                    <div class="modal-body box-body" id="id_show_result">


                    </div>

                </div>

            </div>

        </section>

    </div>

</div>

</div><!-- WRAPPER -->

</body>

<div class="modal fade" id="modal_candidate">

    <div class="modal-dialog modal-lg">

          <div class="modal-content">
              
              <div class="modal-header btn-success">
                
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->

                  <a href="javascript:void(0);" class="close" onclick="close_modal()" title="Click"><span aria-hidden="true">&times;</span></a>


                  Candidate: <label id="cand_id_label">ID</label> <label class="pull-right" id="cand_name_label">Name</label>

<!--                     <div class="form-group col-xs-10">
                        <input type="text" id="cand_id" name="cand_id" autocomplete="off" class="form-control" readonly>
                    </div> -->

              </div>
      
            <div class="modal-body">
    
                <table id="id_refund_table" class="table table-bordered table_height_refund" style="width:100%">
                    
                  <tbody>

                      <tr>
                          <td width="20%">

                              <table id="id_order_table_data" class="table table-bordered table-hover" style="width:100%">

                                  <!-- Candidate -->

                                  <tbody id="id_candidate_left_data">

                                      <td>ID</td>
                                      <td><input type="name" class="form-control" id="cand_id" name="cand_id" readonly></td>

                                      <tr></tr>

                                      <td>Name</td>
                                      <td><input type="name" class="form-control" id="cand_name" name="cand_name" readonly></td>


                                  </tbody>
                                  
                              </table>

                          </td>

                          <td width="80%">
                              
                              <table id="id_category_right_data" class="table table-bordered table-hover" style="width:100%">

                                <!-- Criteria Per Category -->

                              </table>
                              
                          </td>                        
                      </tr>

                  </tbody>

                </table>

            </div>
       
        </div>
      
    </div>

</div>

<script type="text/javascript">
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

</script>

<script type="text/javascript">

/* Disabled Socket */
//update_via_socket();

function update_via_socket(){

    let ip_address = 'http://192.168.82.97/';
    let socket_port = '3000';
    let socket = io(ip_address + ':' + socket_port);

    let message = "Message";
    console.log(message);

    socket.emit('sendChatToServer', message);

    socket.on('sendChatToClient', (message) => {
        
        //alert("Successful!");

        show_all_tabulation_list();
    });
}






show_all_tabulation_list();

function show_all_tabulation_list(str) {

  var xhttp;
  if (str == "") {
    document.getElementById("id_show_result").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_show_result").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "show_all_tabulation_list", true);
  xhttp.send();
}

function close_modal(){

    $('#criteria_score').val('');

    $('#modal_candidate').modal('hide');

    return false;
}

function insert_score(str, criteria_id){

    var score = str;
    var cri_id = criteria_id;
    var cand_id = $('#cand_id').val();

    if (score >=70 && score <=100){

        $.ajax({
          type: "POST",
          dataType: "JSON",
          data: {score:score, cri_id:cri_id, cand_id:cand_id},
          url: "insert_score",
          success: function(data){

              console.log("Successful Insertion!");

              //$('#criteria_score').val('');

              show_all_tabulation_list();

              //update_via_socket();
          }

        });

        //console.log(cri_id);

    }
    else {

        // score = 70;
        // default_score = 70;

        // $.ajax({
        //   type: "POST",
        //   dataType: "JSON",
        //   data: {score:score, cri_id:cri_id, cand_id:cand_id},
        //   url: "insert_score",
        //   success: function(data){

        //       console.log("Default Invalid Input");
        //   }

        // });

        console.log("Invalid Input");
    }

    return false;
}

function Trigger(contestant_name, contestant_id){

    var cand_id = contestant_id;
    var cand_name = contestant_name;

    $('#cand_id').val(cand_id);
    $('#cand_name').val(cand_name);

    $('#cand_id_label').text(cand_id);
    $('#cand_name_label').text(cand_name);

    $('#modal_candidate').modal({backdrop: 'static', keyboard: false, show: true});

    show_category_criteria_list(cand_id);

    console.log(cand_id);
    console.log(cand_name);

    return false;
}

</script>

<script type="text/javascript">

//show_category_criteria_list();

function show_category_criteria_list(str) {

  var cand_id = str;

  var xhttp;
  if (str == "") {
    document.getElementById("id_category_right_data").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_category_right_data").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "show_category_criteria_list?q="+cand_id, true);
  //xhttp.open("GET", "show_category_criteria_list", true);
  xhttp.send();
}
    
show_all_candidate_list();

function show_all_candidate_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_show_candidate").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_show_candidate").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "show_all_candidate_list", true);
  xhttp.send();
}

</script>

</html>