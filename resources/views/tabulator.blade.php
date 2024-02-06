<!DOCTYPE html>

<html>

 <head>
  <title>Tabulator Page - Math Olympiad</title>

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
                <a href="#" onclick="manage_team()">Team</a>
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<span class="caret"></span></a> -->
              <!-- <ul class="dropdown-menu" role="menu"> -->
                
<!--                 <li><a href="#" class="showItemTable">Events</a></li>
                <li><a href="#" class="showUserTable">Contestants</a></li>
                <li><a href="#" class="showUserTable">Criteria</a></li> -->
              <!-- </ul> -->
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

                <div class="box box-success">

                    <div class="box-header with-border" id="id_show_navigation">

<!--                         <ul class="nav nav-tabs nav-justified">
                          <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                          <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        </ul>

                        <div class="tab-content">
                          
                          <div id="menu1" class="tab-pane fade">
                              
                          </div>

                          <div id="menu2" class="tab-pane fade">
                              
                          </div>

                        </div> -->

                    </div>

                </div>

            </div>
     
        </section>

    </div>

</div>

</div><!-- WRAPPER -->


<div id="modal_team_administration" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Team Management:</h4>
      </div>
      <div class="modal-body">
        
        <table class="table table-bordered table-hover">

            <thead>

                <td width="30%">
                   <form id="saveTeam" method="post">

                    @csrf
                    <div class="form-group">
                        <label for="team_code">Team Code:</label>
                        <input type="text" id="team_code" name="team_code" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="team_name">Team Name:</label>
                        <input type="text" id="team_name" name="team_name" class="form-control" required>
                    </div>


                    <div class="form-group">
                    
                      <button type="submit" class="btn btn-flat btn-success text-center">Submit</button>
                    </div>
                    
                    </form>                 
                </td>

                <td width="70%">

                    <table class="table table-bordered table-hover" id="id_team_table_data">

                        <thead>
                            <th>Team ID</th>
                            <th>Team Code</th>
                            <th>Team Name</th>
                            <th colspan="2"><center>Action</center></th>
                        </thead>

                        <tbody id="id_team_data">

                        </tbody>

                    </table>
                    
                </td>

            </thead>

        </table>

      </div>

    </div>

  </div>

</div>


<div class="modal fade" id="modal_show_tally">

    <div class="modal-dialog modal-lg">

          <div class="modal-content">
              
              <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  Overall Tally <input type="hidden" id="id_event_id_data" name="id_event_id_data" class="form-control" readonly>

              </div>
      
          <div class="modal-body">

                <div id="id_tally_per_event">
                    
                </div>

          </div>
       
        </div>
      
    </div>

</div>


<div class="modal fade" id="modal_encode_team_question">

    <div class="modal-dialog modal-lg">

          <div class="modal-content">
              
                <div class="modal-header btn-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Team & Question Management: <input type="hidden" id="id_round_id_data" name="id_round_id_data" class="form-control" readonly>

                </div>
      
                <div class="modal-body">

                    <table class="table table-bordered table-hover">

                        <tbody>

                            <tr>

                            <td width="25%">SELECT TEAMS</td>

                            <td width="25%"><center>PARTICIPATING TEAMS</center></div></td>

                            <td width="25%">INPUT QUESTION</td>

                            <td width="25%"><center>ENCODED QUESTIONS</center></td>

                            </tr>

                            <tr>
                                
                            <td>
                                <table class="table table-bordered table-hover">
                                    <tbody id="id_participating_teams_data">
                                        
                                    </tbody>
                                </table>
                            </td>
                                
                            <td>
                                <table class="table table-bordered table-hover">
                                    <tbody id="id_participating_teams_enlisted_per_round">
                                        
                                    </tbody>
                                </table>  
                            </td>

                            <td>
                                <form id="saveQuestion" method="post">

                                    @csrf
                                    <div class="form-group">
                                        <label for="question_code">Question Code:</label>
                                        <input type="text" id="question_code" name="question_code" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="question_name">Question Name:</label>
                                        <input type="text" id="question_name" name="question_name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <!-- <label for="id_round_id_field">Round Category:</label> -->
                                        <input type="hidden" id="id_round_id_field" name="id_round_id_field" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                    
                                      <button type="submit" class="btn btn-flat btn-success text-center">Submit</button>
                                    </div>
                                    
                                </form>
                            </td>

                            <td>
                                <table class="table table-bordered table-hover">
                                    <tbody id="id_question_per_round">
                                        
                                    </tbody>
                                </table>  
                            </td>

                            </tr>

                        </tbody>

                    </table>    

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


//id_tally_per_event();

function id_tally_per_event(str) {

  //var event_id = $('#id_event_id_data').val();

  if (str.length == 0) {
    document.getElementById("id_tally_per_event").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("id_tally_per_event").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "id_tally_per_event?event_id=" + str, true);
    xmlhttp.send();
  }
}


function viewOverAllTally(event_id){

    console.log(event_id);

    $('#id_event_id_data').val(event_id);

    id_tally_per_event(event_id);

    $('#modal_show_tally').modal({backdrop: 'static', keyboard: false, show: true});
    //$('#modal_show_tally').modal('hide');

    return false;
}

// function id_tally_per_event(str) {

//   var xhttp;
//   if (str == "") {
//     document.getElementById("id_tally_per_event").innerHTML = "";
//     return;
//   }
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//     document.getElementById("id_tally_per_event").innerHTML = this.responseText;
//     }
//   };

//    //xhttp.open("GET", "id_tally_per_event?q="+str, true);
//   xhttp.open("GET", "id_tally_per_event", true);
//   xhttp.send();
// }


function remove_question(question_id, round_id){

    // console.log(question_id);
    // console.log(round_id);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {question_id:question_id},
      url: "remove_question",
      success: function(data){

          id_question_per_round(round_id);

      }

    });  


    return false;
}


function id_question_per_round(round_id){

    $.ajax({
        url: "get_question_enlisted",
        type: 'GET',
        dataType: "JSON",
        success: function(data) {

            var html = '';
            var counter = 1;

            for(i=0; i<data.length; i++){

                var question_id = data[i].question_id;
                var round_id_data = data[i].round_id;

                if(round_id_data==round_id){

                    html += '<tr>';

                    html += '<td>'+data[i].question_code+'</td>';
                    html += '<td>'+data[i].question_name+'</td>';
                    html += '<td><a><a href="#" ondblclick="remove_question('+question_id+', '+round_id+')" class="btn btn-block btn-danger btn-xs">Remove</a></td>';

                    html += '</tr>';
                }
            }

            $('#id_question_per_round').html(html); 
        }
        
    });

    return false;
}


function remove_participating_team(participant_id, round_id){

    // console.log(participant_id);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {participant_id:participant_id},
      url: "remove_participating_team",
      success: function(data){

          id_participating_teams_enlisted_per_round(round_id);

      }

    });  

    return false;
}


function id_participating_teams_enlisted_per_round(round_id){

    //console.log(round_id);

    $.ajax({
        url: "get_participating_teame_enlisted",
        type: 'GET',
        dataType: "JSON",
        success: function(data) {

            var html = '';
            var counter = 1;

            for(i=0; i<data.length; i++){

                var participant_id = data[i].participant_id;
                var round_id_data = data[i].round_id;

                if(round_id_data==round_id){

                    html += '<tr>';

                    // html += '<td>'+counter+'</td>';
                    html += '<td>'+data[i].team_name+'</td>';
                    html += '<td><a><a href="#" ondblclick="remove_participating_team('+participant_id+', '+round_id+')" class="btn btn-block btn-danger btn-xs">Remove</a></td>';

                    html += '</tr>';

                }

                counter++;
            }

            $('#id_participating_teams_enlisted_per_round').html(html); 
        }
        
    });


    return false;
}

</script>


<script type="text/javascript">
    
id_team_data();

function id_team_data(str) {

  var xhttp;
  if (str == "") {
    document.getElementById("id_team_data").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_team_data").innerHTML = this.responseText;
    }
  };

   //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "id_team_data", true);
  xhttp.send();
}

</script>


<script type="text/javascript">


function enlist_participating_team(team_id){

    var round_id = $('#id_round_id_data').val();

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {team_id:team_id, round_id:round_id},
      url: "insert_participating_team",
      success: function(data){

          //alert("Participating Team Insertion Success");
          //id_team_data();

          // $('#team_code').val('');
          // $('#team_name').val('');

          //id_participating_teams_data(round_id);

          id_participating_teams_enlisted_per_round(round_id);

      }

    });  

    return false;
}


id_participating_teams_data();

function id_participating_teams_data(str) {

  var xhttp;
  if (str == "") {
    document.getElementById("id_participating_teams_data").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_participating_teams_data").innerHTML = this.responseText;
    }
  };

   //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "id_participating_teams_data", true);
  xhttp.send();
}





function encodeTeamQuestion(event_id, round_id){

    var round_idabc = round_id;

    // console.log("Encode Team & Question");
    // console.log(event_id);
    // console.log(round_id);

    //$('#id_role_id_data').val(round_id);
    //var id_itemx = $('#id_item').val();

    $('#id_round_id_data').val(round_idabc);

    $('#id_round_id_field').val(round_idabc);

    id_participating_teams_enlisted_per_round(round_id);

    id_question_per_round(round_id);  

    $('#modal_encode_team_question').modal({backdrop: 'static', keyboard: false, show: true});

    return false;
}

$('#saveQuestion').submit('click',function(){

    var question_code = $('#question_code').val();
    var question_name = $('#question_name').val();
    var round_id = $('#id_round_id_field').val();

    // console.log(question_code);
    // console.log(question_name);
    // console.log(round_id);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {question_code:question_code, question_name:question_name, round_id:round_id},
      url: "insert_question",
      success: function(data){

          console.log("Insert Question Success!");
          // id_team_data();

          $('#question_code').val('');
          $('#question_name').val('');

          id_question_per_round(round_id);

      }

    });

    return false;
});


$('#saveTeam').submit('click',function(){

    var team_code = $('#team_code').val();
    var team_name = $('#team_name').val();

    //console.log(team_code);
    //console.log(team_name);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {team_code:team_code, team_name:team_name},
      url: "insert_team",
      success: function(data){

          // alert("Success");
          id_team_data();

          $('#team_code').val('');
          $('#team_name').val('');

      }

    });

    return false;
});

function delete_team(team_id){

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: {team_id:team_id},
      url: "delete_team",
      success: function(data){

          alert("Success");
          id_team_data();

      }

    });


    return false;
}

$('#id_team_table_data').on('dblclick','.UpdateTeam',function(){

    var txt;

    if(confirm("Are you sure you want to update?")){

        // var brand_id = $(this).data('brand_id');
        // var brand_code = $(this).data('brand_code');
        // var brand_name = $(this).data('brand_name');
          
        // $('#brand_idx').val(brand_id);
        // $('#brand_codex').val(brand_code);
        // $('#brand_namex').val(brand_name);

        console.log("Update Operations NOT YET DONE!");

    }
        
    return false;

});


// function update_team(team_id){

//     console.log(team_id);
    //console.log(team_code);
    // console.log(team_name);

   

    // $.ajax({
    //   type: "POST",
    //   dataType: "JSON",
    //   data: {team_id:team_id, team_code:team_code, team_name:team_name},
    //   url: "update_team",
    //   success: function(data){

    //       alert("Success");
    //       id_team_data();

    //   }

    // });


//     return false;
// }


function manage_team(){

    //console.log("Team");

    $('#modal_team_administration').modal({backdrop: 'static', keyboard: false, show: true});

    return false;
}


id_show_navigation();

function id_show_navigation(str) {

  var xhttp;
  if (str == "") {
    document.getElementById("id_show_navigation").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("id_show_navigation").innerHTML = this.responseText;
    }
  };

   //xhttp.open("GET", "display_all_data?q="+str, true);
  xhttp.open("GET", "id_show_navigation", true);
  xhttp.send();
}

</script>

<script type="text/javascript">

    
function UpdateScore(event_id, round_id, participant_id, question_id, score, score_id, initial_score){

    var url = ''.concat(event_id, '_', round_id, '_', participant_id, '_', question_id, '_', score_id);

    // console.log(score);
    // console.log(initial_score);

    if(initial_score==score){

        var new_score = 0;

        //console.log('EQUALS');

        var html = '';

        html += '<center><a type="button" class="btn btn-block btn-default btn-flat" onclick="UpdateScore('+event_id+', '+round_id+', '+participant_id+', '+question_id+', '+score+', '+score_id+', '+new_score+')">'+new_score+'</a></center>';

        $('#td_'+url+'').html(html);

            $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    data: {new_score:new_score, score_id:score_id},
                    url: "update_score",
                    success: function(data){

                        console.log("Update Equals Score Successful!!!");

                        // var_score_url = 'sum_'.concat(event_id, '_', round_id, '_', participant_id);

                        // console.log(var_score_url);

                        // var html2 = '';

                        // html2 += '<center>';

                        // html2 += 'Equals';

                        // html2 += '</center>';

                        // $('#'+var_score_url+'').html(html2);

                        //viewTally(event_id, round_id, participant_id);

                    }

                });

            }

    else if (initial_score==0) {

        var html = '';

        var new_score = score;

        html += '<center><a type="button" class="btn btn-block btn-warning btn-flat" onclick="UpdateScore('+event_id+', '+round_id+', '+participant_id+', '+question_id+', '+score+', '+score_id+', '+new_score+')">'+score+'</a></center>';

        $('#td_'+url+'').html(html); 

        // console.log('NOT EQUALS');
        // console.log(initial_score);
        // console.log(score);

            $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    data: {new_score:new_score, score_id:score_id},
                    url: "update_score",
                    success: function(data){

                        console.log("Update NOT Equals Score Successful!!!");

                        // var_score_url = 'sum_'.concat(event_id, '_', round_id, '_', participant_id);

                        // console.log(var_score_url);

                        // var html2 = '';

                        // html2 += '<center>';

                        // html2 += 'Not';

                        // html2 += '</center>';

                        // $('#'+var_score_url+'').html(html2);

                        //viewTally(event_id, round_id, participant_id);
                    }

                });

            
    }


    return false;

}

</script>


<script type="text/javascript">






function viewTally(event_id, round_id, participant_id){

    console.log(event_id);
    console.log(round_id);
    console.log(participant_id);

    $.ajax({
        url: "get_sum_score",
        type: 'GET',
        dataType: "JSON",
        success: function(data) {

            var htmli = '';

            htmli += '<tbody>';

            for(i=0; i<data.length; i++){

                

                var counter = 1;

                var participant_idx = ''+data[i].participants_id+'';
                var team_codex = ''+data[i].team_code+'';
                var team_namex = ''+data[i].team_name+'';
                var event_idx = ''+data[i].event_id+'';
                var round_idx = ''+data[i].round_id+'';
                var sumx = ''+data[i].sum+'';

                var urlx = ''.concat(event_idx, '_', round_idx, '_', participant_idx);

                if(event_id==event_idx && round_id==round_idx && participant_id==participant_idx){

                    
                   
                    htmli += '<td id="total_score_id_'+urlx+'"><center><h4 class="text-danger">'+team_namex+' <br/> '+sumx+'</h4></center></td>';
 
                }

                else if(event_id==event_idx && round_id==round_idx){

                    

                    htmli += '<td id="total_score_id_'+urlx+'"><center><h4 class="text-danger">'+team_namex+' <br/> '+sumx+'</h4></center></td>';
 
                }

                // if(event_id==event_idx && round_id==round_idx){

                   
                //     htmli += '<td id="total_score_id_'+urlx+'"><center><h4>'+team_codex+' '+sumx+'</h4></center></td>';
 
                // }

                // else if(event_id==event_idx && round_id==round_idx && participant_id==participant_idx){

                //     htmli += '<td id="total_score_id_'+urlx+'"><center><h1>'+team_codex+' '+sumx+'</h1></center></td>';
                // }

                counter++;
            }


            htmli += '</tbody>';

             $('#id_tally_table_'+event_id+'_'+round_id+'').html(htmli);

        }

       
    });


    return false;
}

</script>

</html>