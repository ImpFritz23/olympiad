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

<style type="text/css">

    .table_height_main {
        
        height: 400px;
    }

</style>

<style type="text/css">
    

</style>

 </head>

<body class="hold-transition skin-green layout-top-nav">

<div class="wrapper">

  <header class="main-header">
  
    <nav class="navbar navbar-fixed-top">
    
      <div class="container">

        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Tigers Queuing Systems</b> v2.0</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

            <ul class="nav navbar-nav">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Accounts</a>
              <!--
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showManagementTable">Data Management</a></li>
                <li><a href="#" class="showItemTable">Product Item</a></li>
                <li><a href="#" class="showUserTable">User Account</a></li>
              </ul>
                -->
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions</a>
              <!--
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showProductItemQuantity">Product Item Quantity</a></li>
              </ul>
              -->
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" onclick="QueueManage()" data-toggle="dropdown">Queue List</a>
              <!--
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" class="showCashiering">Sales Income</a></li>
              </ul>
              -->
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

<div class="content-wrapper">

    <br><br><br>

    <div class="container">

        <section class="content">

            <div class="row">
                
                <div class="box box-success">

                    <div class="box-body" id="id_div_table_data">

                        <table id="id_table_data" class="table-bordered table_height_main" style="width:100%;">

                       
                            <thead id="id_thead_data">

                            </thead>
                     
                            <!--
                            <tbody id="id_tbody_data">
 

                            </tbody>
                            -->
             
                            <!-- Working Tbody -->
                            
                            
                            <tbody id="id_tbody_data_1">
 

                            </tbody>
                            
                            
                            
                            <!--
                            <tbody>

                                <td valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                                <td valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                                <td valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td >One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                            <tr>
                                                <td>One</td>
                                                <td>Two</td>
                                                <td>Three</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                            </tbody>
                            -->

                        </table>

                    </div>

                </div>

            </div>
       
         </section> <!-- End of Content -->

    </div>
        

</div>

</div><!-- WRAPPER -->

<div class="modal fade" id="modal_queue_manage">

    <div class="modal-dialog modal-lg">

          <div class="modal-content">
              
              <div class="modal-header btn-success">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  Manage Queue

              </div>
      
              <div class="modal-body box-body">
              
                  <div class="table-responsive">

                      <table id="id_queue_list" class="table table-striped table-bordered table-hover">
                        

                      
                      </table>

                  </div>

              </div>

          </div>

      
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

function QueueManage(){

    $('#modal_queue_manage').modal({backdrop: 'static', keyboard: false, show: true}); 

    return false;
}

function GetID(queue_id){

    alert(queue_id);

    //let text1 = "id_btn_";
    //let text2 = queue_id
    //let result = text1.concat(text2);

    //$('#'+result+'').removeClass("btn btn-block btn-default");
    //$('#'+result+'').addClass("btn btn-block btn-success");

    return false;
}

function Trigger(trans_id, queue_id){

    //alert(trans_id);
    //alert(queue_id);

    let text1 = "id_btn_";
    let text2 = queue_id
    let result = text1.concat(text2);

    $('#'+result+'').removeClass("btn-default");
    $('#'+result+'').addClass("btn btn-success");

    $('#'+result+'').focus();

    /*
    for(m=1; m<=10; m++){

        var interval    =   0;

        start();

        function start(){

            setTimeout( function(){

                interval    =   120;
                setInterval( function(){


                   
                }, interval * 1000);
            }, interval * 1000);    
        }
    }
    */    

    return false;
}



display_all_queue_list();

function display_all_queue_list(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_queue_list").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_queue_list").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_queue_list", true);
  xhttp.send();
}

function display_all_data(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_tbody_data").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_tbody_data").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_data", true);
  xhttp.send();
}

display_all_data_1();

function display_all_data_1(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("id_tbody_data_1").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_tbody_data_1").innerHTML = this.responseText;
    }
  };
  //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "display_all_data_1", true);
  xhttp.send();
}

</script>


<script type="text/javascript">

var global_divider;

count_transaction();

function count_transaction(){

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "count_transaction",
    success: function(data){

      var html;
      var i;
      var counter;
      var divider;
      var x;

      for(i=0; i<data.length; i++){

        counter = ''+data[i].counter+'';
        divider = 100/counter;

        global_divider = divider.toFixed(2);

        for(x=1; x<=counter; x++){

            $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "display_transaction",
                    success: function(data){

                      var html;
                      var i;
                      var trans_id;

                      for(i=0; i<data.length; i++){

                        html += '<th width="'+divider+'">';
                            
                            var table_id = "id_table_data_";
                            trans_id = ''+data[i].trans_id+'';
    
                            var res = table_id.concat(trans_id);

                            //html += '<table id="'+table_id+''+trans_id+'">';

                            html += ''+trans_id+'';
                            html += ' - ';
                            html += ''+data[i].trans_name+'';
                            html += ' - ';
                            html += ''+divider.toFixed(2)+'%';


                        html += '</th>';
    
                      }


                      $('#id_thead_data').html(html);
                }

            });

        }
        
      }

    }

  });

  return false;

}

</script>

<script type="text/javascript">
    
//display_tbody();

function display_tbody(){

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "display_transaction",
        success: function(data){

            var html;
            var i;
            var trans_id;

            for(i=0; i<data.length; i++){
                
                var id_tbody_data_ = "id_tbodyx_data_";
                trans_id = ''+data[i].trans_id+'';
                var res_bodyx = id_tbody_data_.concat(trans_id);

                html += '<td>';

                html += '<table>';

                html += '<tbody id="'+res_bodyx+'">';

                

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "display_all_queue",
                    success: function(datax){

                        var m;
                        var chtml;

                        for(m=0; m<datax.length; m++){

                            chtml += '<tr>';
                            chtml += '<td>';
                            chtml += ''+datax[m].fullname+'';
                            chtml += '</td>';
                            chtml += '</tr>';
                        }

                        $('#'+res_bodyx+'').html(chtml);

                    }

                });

                html += '</tbody>';

                html += '</table>';


                html += '</td>';

            }
            

          $('#id_tbody_data').html(html);

        }
    });

    return false;
}


function load_data(){



}


</script>

<script type="text/javascript">
    
//display_transaction_new();

function display_transaction_new(){

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "display_transaction",
        success: function(data){

            var html;
            var i;

            //html += '<tr>';

            for(i=0; i<data.length; i++){

                trans_idx = ''+data[i].trans_id+'';

                    /*
                    $.ajax({
                        type: "GET",
                        dataType: "JSON",
                        url: "display_all_queue",
                        success: function(data){

                            var m;
                            var p;

                            html += '<td>';
                            
                            html += '<table>';
                            html += '<tbody>';

                            for(p=0; p<data.length; p++){

                                trans_idy = ''+data[p].trans_id+'';
                               



                            }

                            html += '</tbody>';
                            html += '</table>';

                            html += '</td>';

                            $('#id_tbody_data').html(html);

                        }
                    });
                    */        

                
                
                html += '<td>';

                html += '<table>';

                html += '<tbody>';

                html += '<tr>';
                html += '<td>'+trans_idx+'</td>';
                html += '<td>Customer 1</td>';
                html += '</tr>';

                html += '<tr>';
                html += '<td>'+trans_idx+'</td>';
                html += '<td>Customer 2</td>';
                html += '</tr>';

                html += '</tbody>';

                html += '</table>';

                html += '</td>';
                
                
                $('#id_tbody_data').html(html);
                
                             
            }

            //html += '</tr>';

            //$('#id_tbody_data').html(html);
        }
    });


    return false;
}

</script>


<script type="text/javascript">
    
/*
function display_queue(trans_id){

    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: {trans_id:trans_id},
        url: "display_queue",
        success: function(data){

            var html;
            var i;

            for(i=0; i<data.length; i++){

                html += '<tr>';
                html += '<td>Customer A</td>';
                html += '</tr>'

                alert("successxz");
            }

            //$('#id_tbody_queue_data').html(html);
                                        
        }
    });

    return false;
}
*/

</script>

</html>