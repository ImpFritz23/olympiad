<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/* Built-in User Authentication */
use Validator;
use Auth;

class ISModel extends Model {

    use HasFactory;

    public function DisplayAllUserAccounts(){

        //echo "Login API Model";

        $result = DB::select('SELECT * FROM users');

        return $result;
    }

    public function DisplayAllUserList(){

       $output = '';

       $query = DB::select('SELECT * FROM users, role WHERE users.role_id = role.role_id');

       $output .= '<h4>';

       $output .= '<center>User Account Listing<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modal_add_user">Create User</button></center>';

       $output .= '</h4>';

       $output .= '<div class="table-responsive">';
       
       $output .= '<table id="id_user_table_data" class="table table-striped table-bordered table-hover">';

       $output .= '<thead>';
       $output .= '<th>ID</th>';
       $output .= '<th>Name</th>';
       $output .= '<th>Email</th>';
       $output .= '<th>Role</th>';
       $output .= '<th>';

       //$output .= '<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_add_user">Create User</button>';

       $output .= '</th>';

       $output .= '</thead>';

       $output .= '<tbody>';

       foreach ($query as $query) {

           $output .= '<tr>'; 

           $id = $query->id;
           $name = $query->name;
           $email = $query->email;
           $role_id = $query->role_id;
           $role_name = $query->role_name;

           $output .= '<td>'.$id.'</td>';
           $output .= '<td>'.$name.'</td>';
           $output .= '<td>'.$email.'</td>';
           $output .= '<td>'.$role_name.'</td>';
         
           $output .= '<td>';

           $output .= '<a href="#" class="btn btn-info btn-xs" onclick="ReadUserData(\'' .$name. '\', \'' .$email. '\', '.$id.', '.$role_id.');">Read</a>';
           $output .= '<a href="#" class="btn btn-warning btn-xs" onclick="UpdateUserData(\'' .$name. '\', \'' .$email. '\', '.$id.', '.$role_id.');">Update</a>';
           $output .= '<a href="#" class="btn btn-danger btn-xs" onclick="DeleteUserData('.$id.');">Delete</a>';

           $output .= '</td>';

           $output .= '</tr>'; 

       }

       $output .= '</tbody>';

       $output .= '</table>';

       $output .= '</div>';

       return $output;
    }

    public function scoperetrieveRole(){

        $role = DB::table('role')->pluck("role_name","role_id");
        return  $role;
    }

    public function InsertUserXXX($request){

        //echo "This is the model";

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role_id = $request->input('role_id');

        $hash_password = PASSWORD_HASH($password, PASSWORD_DEFAULT); 
        //$creator_id = Auth::id();

        $result = DB::insert('INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)', [$name, $email, $hash_password, $role_id]);

        return $result;
    }




    public function scopeRetrieveUserData($request){

        $id = $request->input('id');

        //$id = 2;

        $result = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
                        
        return $result;
    }

    public function DeleteUserXXX($request){

        $id = $request->input('id');

        $result = DB::insert('DELETE FROM users WHERE id = ?', [$id]);

        return $result;
    }

    public function UpdateUserXXX($request){

        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $role_id = $request->input('role_id');

        $result = DB::insert('UPDATE users SET name = ?, email = ?, role_id = ? 
            WHERE id = ?', [$name, $email, $role_id, $id]);

        return $result;
    }


    public function SearchUserXXX($request){

        //$search_item = $_GET['q'];
        $search_item = 1;
        $_percent_sign = "%";
        $item = $search_item.$_percent_sign;

        echo item;

        //$result = DB::select('SELECT * FROM users WHERE name LIKE ?', [$item]);

        $output = '';

        $output .= '<h4>';

       $output .= '<center>UserX Account Listing<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modal_add_user">Create User</button></center>';

       $output .= '</h4>';

       // $output .= '<div class="table-responsive">';
       
       // $output .= '<table id="id_user_table_data" class="table table-striped table-bordered table-hover">';

       // $output .= '<thead>';
       // $output .= '<th>ID</th>';
       // $output .= '<th>Name</th>';
       // $output .= '<th>Email</th>';
       // $output .= '<th>Role</th>';
       // $output .= '<th>';

       // $output .= '</th>';

       // $output .= '</thead>';

       // $output .= '<tbody>';

       // foreach ($query as $query) {

       //     $output .= '<tr>'; 

       //     $id = $query->id;
       //     $name = $query->name;
       //     $email = $query->email;
       //     $role_id = $query->role_id;
       //     $role_name = $query->role_name;

       //     $output .= '<td>'.$id.'</td>';
       //     $output .= '<td>'.$name.'</td>';
       //     $output .= '<td>'.$email.'</td>';
       //     $output .= '<td>'.$role_name.'</td>';
         
       //     $output .= '<td>';

       //     $output .= '<a href="#" class="btn btn-info btn-xs" onclick="ReadUserData(\'' .$name. '\', \'' .$email. '\', '.$id.', '.$role_id.');">Read</a>';
       //     $output .= '<a href="#" class="btn btn-warning btn-xs" onclick="UpdateUserData(\'' .$name. '\', \'' .$email. '\', '.$id.', '.$role_id.');">Update</a>';
       //     $output .= '<a href="#" class="btn btn-danger btn-xs" onclick="DeleteUserData('.$id.');">Delete</a>';

       //     $output .= '</td>';

       //     $output .= '</tr>'; 

       // }

       // $output .= '</tbody>';

       // $output .= '</table>';

       // $output .= '</div>';


        return $output;

    }


    public function InsertParticipatingTeam($request){

        $team_id = $request->input('team_id');
        $round_id = $request->input('round_id');
        $creator_id = Auth::id();

        $query = DB::select('SELECT * FROM participant WHERE team_id = ? AND round_id = ?', [$team_id, $round_id]);

        if (count($query) === 0) {

            $result = DB::insert('INSERT INTO participant (team_id, round_id, id) VALUES (?, ?, ?)', [$team_id, $round_id, $creator_id]);
        }

        return $result;
    }


    public function RemoveParticipatingTeam($request){

        $participant_id = $request->input('participant_id');

        $result = DB::delete('DELETE FROM score WHERE participant_id = ?', [$participant_id]);

        $result = DB::delete('DELETE FROM participant WHERE participant_id = ?', [$participant_id]);

        return $result;
    }


    public function RemoveQuestion($request){

        $question_id = $request->input('question_id');

        $result = DB::delete('DELETE FROM score WHERE question_id = ?', [$question_id]);

        $result = DB::delete('DELETE FROM question WHERE question_id = ?', [$question_id]);

        return $result;
    }







    public function InsertQuestion($request){

        $creator_id = Auth::id();
        $question_code = $request->input('question_code');
        $question_name = $request->input('question_name');
        $round_id = $request->input('round_id');


        $result = DB::insert('INSERT INTO question (question_code, question_name, round_id, id) VALUES (?, ?, ?, ?)', [$question_code, $question_name, $round_id, $creator_id]);

        return $result;
    }





    public function InsertTeam($request){


        $creator_id = Auth::id();
        $team_code = $request->input('team_code');
        $team_name = $request->input('team_name');


        $result = DB::insert('INSERT INTO team (team_code, team_name, id) VALUES (?, ?, ?)', [$team_code, $team_name, $creator_id]);

        return $result;
    }

    public function DeleteTeam($request){

        $team_id = $request->input('team_id');

        $result = DB::insert('DELETE FROM team WHERE team_id = ?', [$team_id]);

        return $result;
    }











    /* Start Here */
    // public function scoperetrieveRole(){

    //     $role = DB::table('role')->pluck("role_name","role_id");
    //     return  $role;
    // }

    public function scopeRetrieveUserAccount(){

        $result = DB::select('SELECT users.id, users.first_name, users.last_name, users.email, role.role_name,
            users.creator_id AS encoded_by
            FROM users, role
            WHERE users.role_id = role.role_id');
                        
        return $result;
    }

    public function InsertUserX($request){

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role_id = $request->input('role_id');
        $hash_password = PASSWORD_HASH($password, PASSWORD_DEFAULT); 
        $creator_id = Auth::id();

        $result = DB::insert('insert into users (first_name, last_name, email, password, role_id, creator_id) values (?, ?, ?, ?, ?, ?)', [$first_name, $last_name, $email, $hash_password, $role_id, $creator_id]);

        return $result;
    }






    public function scopeRetrieveUser(){

        $result = DB::select('SELECT * FROM user');
            
        return $result;
    }

    public function InsertUser($request){

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        //$password = $request->input('password');

        //$hash_password = PASSWORD_HASH($password, PASSWORD_DEFAULT); 
       
       $result = DB::insert('insert into user (first_name, last_name, email) values (?, ?, ?)', [$first_name, $last_name, $email]);

        return $result;
    }

    public function DeletetUser($request){

        $user_id = $request->input('user_id');
        
        $result = DB::delete('DELETE FROM user WHERE user_id = ?', [$user_id]);

        return $result;
    }

    public function UpdateUser($request){

        $user_id = $request->input('user_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
            
        $result = DB::update('UPDATE user SET first_name = ?, last_name = ?, email = ? WHERE user_id = ?', [$first_name, $last_name, $email, $user_id]);

        return $result;
    }

    /* For Flutter Tutorials*/

    public function scopeRetrieveStudent(){

        $result = DB::select('SELECT * FROM student WHERE id_student = 1');
                        
        return $result;
    }


    public function scopeCountTransaction(){

        /*
        $result = DB::select('SELECT transaction.trans_id, transaction.trans_code, transaction.trans_name,
            (SELECT COUNT(*) FROM transaction) AS counter
            FROM transaction');
        */
        
                       
        $result = DB::select('SELECT COUNT(*) AS counter FROM transaction');

        return $result;
    }

    public function scopeDisplayTransaction(){

                   
        $result = DB::select('SELECT * FROM transaction');

        return $result;
    }


    /*
    public function DisplayQueue($request){

        $trans_id = $request->input('trans_id');
        //$trans_id = 4;
                   
        $result = DB::select('SELECT * FROM queue WHERE trans_id = ?', [$trans_id]);

        return $result;
    }
    */


    public function scopeDisplayAllQueue(){

        //$trans_id = $request->input('trans_idx');
        //$trans_id = 1;

                    
        $result = DB::select('SELECT * FROM queue');

        //$result = DB::select('SELECT * FROM queue WHERE queue_id = ?', [$trans_id]);

        //return $result;

        $output = '';

        //$output .= '<td>';


        $output .= '<td>Test</td>';

        //$output .= '</td>';

        return $output;

        
    }


    public function DisplayQueue($request){

        $trans_id = $request->input('trans_id');
        //$trans_id = 1;

        $result = DB::select('SELECT * FROM queue WHERE trans_id = ?', [$trans_id]);
        return $result;
    }


    public function scopeUpdateTableData(){

        $output = '';

        $output .= 'Table Data TD';

        return $output;
    }

    function scopeShowTallyPerEvent($request){

        $event_id = $_GET['event_id'];

        //$output = ''.$event_id.'';

        $output = '';

        $output .= '<table class="table table-bordered">';

        $query = DB::select('SELECT COUNT(*) AS counter FROM round WHERE event_id = ?', [$event_id]);

        $divider = 100;
        $counter = 0;

        foreach ($query as $query) {

            $counter = $query->counter;
            // $divider = 100/$counter;
        }


        $query1 = DB::select('SELECT * FROM round WHERE event_id = ?', [$event_id]);

        $output .= '<thead>';

        $counter = $counter + 1;

        $new_divider = 0;

        foreach ($query1 as $query1) {

            $round_id = $query1->round_id;
            $round_code = $query1->round_code;
            $round_name = $query1->round_name;

            $output .= '<th width="'.$divider/$counter.'%"><center>'.$round_id.') '.$round_name.'</center></th>';

            $new_divider = $divider/$counter;

        }

        $output .= '<th width="'.$new_divider.'%"><center>Ranking</center></th>';

        $output .= '</thead>';

        /**/

        $query2 = DB::select('SELECT * FROM round WHERE event_id = ?', [$event_id]);

        $output .= '<tbody>';

        foreach ($query2 as $query2) {

            $round_idx = $query2->round_id;
            $round_codex = $query2->round_code;
            $round_namex = $query2->round_name;

            $output .= '<td>';

            $query3 = DB::select('SELECT DISTINCT participant.participant_id AS participants_id, team.team_code, team.team_name, round.round_id, event.event_id,
                (SELECT SUM(score) AS score FROM score WHERE score.participant_id = participants_id) AS sum
                FROM score, question, participant, users, team, round, event
                WHERE score.question_id = question.question_id
                AND score.participant_id = participant.participant_id
                AND score.id = users.id
                AND participant.team_id = team.team_id
                AND round.event_id = event.event_id
                AND question.round_id = round.round_id
                AND round.round_id = ? ORDER BY sum DESC', [$round_idx]);

                $output .= '<table class="table table-bordered">';

                $output .= '<tbody>';

                foreach ($query3 as $query3) {

                    $team_code = $query3->team_code;
                    $team_name = $query3->team_name;
                    $sum = $query3->sum;

                    $output .= '<tr>';

                    $output .= '<td><center>'.$team_name.' = '.$sum.'</center></td>';

                    $output .= '</tr>';
                }

                $output .= '</tbody>';

                $output .= '</table>';

            $output .= '</td>';
        }

        $output .= '<td>';

        $query4 = DB::select('SELECT team.team_id AS teams_id, team.team_name,
                (SELECT SUM(score) AS score 
                    FROM score, participant, team, round, event
                    WHERE score.participant_id = participant.participant_id
                    AND participant.team_id = team.team_id
                    AND participant.team_id = teams_id
                    AND participant.round_id = round.round_id
                    AND round.event_id = event.event_id
                    AND event.event_id = ?) AS sum
                FROM team ORDER BY sum DESC', [$event_id]);

        $output .= '<table class="table table-bordered">';

        $output .= '<tbody>';

        foreach ($query4 as $query4) {

            $team_id = $query4->teams_id;
            $team_name = $query4->team_name;
            $sum = $query4->sum;

            $output .= '<tr>';

            if($sum>-1){
                
                //$output .= '<td>IGWA</td>';
                $output .= '<td><center>'.$team_name.' = '.$sum.'</center></td>';
            }

            // else {

            //     $output .= '<td>NULL</td>';   
            // }

            //$output .= '<td><center>'.$team_name.' = '.$sum.'</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';



        $output .= '</td>';

        $output .= '</tbody>';

        /**/        

        $output .= '</table>';

        return $output;
    }


    public function scopeShowTbodyList(){

        //$cand_id = $_GET['q'];

        $output = '';

        $output .= 'Hello World';

        return $output;

    }

    public function scopeShowParticipatingTeamData(){

        $output = '';

        $query = DB::select('SELECT * FROM team ORDER BY team_id ASC');

        foreach ($query as $query) {

            $team_id = $query->team_id;
            $team_code = $query->team_code;
            $team_name = $query->team_name;

            $output .= '<tr>';

            $output .= '<td>'.$team_id.'</td>';
            // $output .= '<td>'.$team_code.'</td>';
            $output .= '<td>'.$team_name.'</td>';

            $output .= '<td>';

            $output .= '<a href="#" onclick="enlist_participating_team('.$team_id.')" class="btn btn-block btn-info btn-xs">Enlist</a>';

            $output .= '</td>';

            $output .= '</tr>';

        }

        

        return $output;

    }

    public function scopeShowTeamList(){

        $output = '';

        $query = DB::select('SELECT * FROM team ORDER BY team_id ASC');

        foreach ($query as $query) {

            $team_id = $query->team_id;
            $team_code = $query->team_code;
            $team_name = $query->team_name;

            $output .= '<tr>';

            $output .= '<td>'.$team_id.'</td>';
            $output .= '<td>'.$team_code.'</td>';
            $output .= '<td>'.$team_name.'</td>';

            // $output .= '<td>';

            // $output .= '<a href="javascript:void(0);" title="Double Click" class="btn btn-block btn-warning btn-xs UpdateTeam" data-team_id="'.$team_id.'" data-team_code="'.$team_code.'" data-team_name="'.$team_name.'">Update</a>';

            // $output .= '</td>';

            $output .= '<td>';

            $output .= '<a href="#" ondblclick="delete_team('.$team_id.')" class="btn btn-block btn-danger btn-xs">Delete</a>';

            $output .= '</td>';

            $output .= '</tr>';

        }

        

        return $output;
    }


    //public function scopeShowParticipantTeamList(){

        //$round_id = $_GET['q'];

        //$output = '';

        //$output .= ''.$round_id.'';


        // $query = DB::select('SELECT * FROM participant');

        // foreach ($query as $query) {

        //     $participant_id = $query->participant_id;
        //     $team_id = $query->team_id;
        //     $round_id = $query->round_id;

        //     $output .= '<tr>';

        //     $output .= '<td>Hello Globe</td>';

        //     $output .= '</tr>';

        // }


        //return $output;
    //}




    public function scopeShowNavigationList(){

        $output = '';

        $output .= '<ul class="nav nav-tabs nav-justified">';

        $query = DB::select('SELECT * FROM event WHERE event_status = 1');

        foreach ($query as $query) {

            $event_id = $query->event_id;
            $event_code = $query->event_code;
            $event_description = $query->event_description;
            $event_status = $query->event_status;

            $output .= '<li><a ondblclick="viewOverAllTally('.$event_id.')" title="Double Click" data-toggle="tab" href="#'.$event_id.'">'.$event_id.') '.$event_description.'</a></li>';

        }

        $output .= '</ul>';

        $quer = DB::select('SELECT * FROM event');

        $output .= '<div class="tab-content">';

        foreach ($quer as $quer) {

            $event_id = $quer->event_id;
            $event_code = $quer->event_code;
            $event_description = $quer->event_description;
            $event_status = $quer->event_status;

            $output .= '<div id="'.$event_id.'" class="tab-pane fade">';

            /* START */

            $query0 = DB::select('SELECT * FROM round WHERE event_id = ?', [$event_id]);

            $output .= '<ul class="nav nav-tabs nav-justified">';

            foreach ($query0 as $query0) {

                $round_id = $query0->round_id;
                $round_code = $query0->round_code;
                $round_name = $query0->round_name;
                $scoring = $query0->scoring;
   
                $output .= '<li><a ondblclick="encodeTeamQuestion('.$event_id.', '.$round_id.')" data-toggle="tab" href="#'.$round_id.''.$round_code.'">'.$round_id.') '.$round_name.' ['.$scoring.']</a></li>';

            }

            // $output .= '<li></li>';

            $output .= '</ul>';

            /* END */


            /* START */

            $query1 = DB::select('SELECT * FROM round WHERE event_id = ?', [$event_id]);

            $output .= '<div class="tab-content">';

            foreach ($query1 as $query1) {

                $round_id = $query1->round_id;
                $round_code = $query1->round_code;
                $round_name = $query1->round_name;
                $scoring = $query1->scoring;

                $output .= '<div id="'.$round_id.''.$round_code.'" class="tab-pane fade">';

                $output .= '</br>';

                // $data = '_id';

                $id_tbl = ''.$event_id.'_'.$round_id.'';

                $output .= '<table class="table table-bordered table-hover">';

                //$output .= '<table class="table table-bordered table-hover" id="'.$event_id.'_'.$round_id.'">';

                $query2 = DB::select('SELECT question.question_id, question.question_code, question.question_name,
                        (SELECT COUNT(*) FROM question WHERE round_id = ?) AS counterx
                        FROM question WHERE round_id = ?', [$round_id, $round_id]);

                $output .= '<thead>';

                $output .= '<th with="20%">Team</th>';

                foreach ($query2 as $query2) {

                    $question_id = $query2->question_id;
                    $question_code = $query2->question_code;
                    $question_name = $query2->question_name;
                    $counterx = $query2->counterx;

                    $new_width = 80/$counterx;

                    // $output .= '<th width="'.$new_width.'%"><center>'.$question_id.') '.$question_name.'</center></th>';
                    $output .= '<th width="'.$new_width.'%"><center>'.$question_code.'</center></th>';
                }

                $output .= '<th hidden="true"><center>Total</center></th>';

                $output .= '</thead>';

                $query3 = DB::select('SELECT * 
                        FROM participant, team, round
                        WHERE participant.team_id = team.team_id
                        AND participant.round_id = round.round_id
                        AND participant.round_id = ?', [$round_id]);

                $output .= '<tbody id="'.$id_tbl.'">';

                foreach ($query3 as $query3) {

                    $participant_id = $query3->participant_id;
                    $participant_team_id = $query3->team_id;
                    $participant_code = $query3->team_code;
                    $participant_name = $query3->team_name;

                    $output .= '<tr>';

                    //$query4 = DB::select('SELECT * FROM question WHERE round_id = ?', [$round_id]);

                    $query4 = DB::select('SELECT question.question_id, question.question_code, question.question_name,
                        (SELECT COUNT(*) FROM question WHERE round_id = ?) AS counter
                         FROM question WHERE round_id = ?', [$round_id, $round_id]);

                    // $output .= '<td style="padding: 0; margin: 0;">'.$participant_id.' '.$participant_code.'</td>';
                    $output .= '<td style="padding: 0; margin: 0;">'.$participant_name.'</td>';

                    foreach ($query4 as $query4) {

                        $question_id = $query4->question_id;
                        $question_code = $query4->question_code;
                        $question_name = $query4->question_name;
                        $counter = $query4->counter;

                        //$output .= '<td><center>'.$participant_id.') '.$question_id.'</center></td>';

                        $query5 = DB::select('SELECT * 
                            FROM score, participant, question
                            WHERE score.participant_id = participant.participant_id
                            AND score.question_id = question.question_id
                            AND score.participant_id = ?
                            AND score.question_id = ?', [$participant_id, $question_id]);

                        $initial_score = 0;


                        /* If No Data in Score Table, Insert */
                        if (count($query5) === 0) {

                            $id = Auth::id();

                            $result = DB::insert('INSERT INTO score (participant_id, question_id, score, id) VALUES (?, ?, ?, ?)', [$participant_id, $question_id, $initial_score, $id]);

                            // $output .= '<td>Mayo</td>';

                            $output .= '<td data-toggle="tooltip" title="'.$question_name.'" id="td_'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'" style="padding: 0; margin: 0;"><center id="'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'"><a type="button" class="btn btn-block btn-default btn-flat" onclick="UpdateScore('.$event_id.', '.$round_id.', '.$participant_id.', '.$question_id.', '.$scoring.', '.$score_id.', '.$score.')">'.$initial_score.'</a></center></td>';
                        }


                        /* If There Is Data in Score Table, Update */
                        else {

                            foreach ($query5 as $query5) {

                                $score_id = $query5->score_id;
                                $participant_idx = $query5->participant_id;
                                $question_idx = $query5->question_id;
                                $score = $query5->score;


                                if($score==0){
                                    $output .= '<td data-toggle="tooltip" title="'.$question_name.'" id="td_'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'" style="padding: 0; margin: 0;"><center id="'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'"><a type="button" class="btn btn-block btn-default btn-flat" onclick="UpdateScore('.$event_id.', '.$round_id.', '.$participant_id.', '.$question_id.', '.$scoring.', '.$score_id.', '.$score.')">'.$score.'</a></center></td>';
                                }
                                else {
                                    $output .= '<td data-toggle="tooltip" title="'.$question_name.'" id="td_'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'" style="padding: 0; margin: 0;"><center id="'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'"><a type="button" class="btn btn-block btn-warning btn-flat" onclick="UpdateScore('.$event_id.', '.$round_id.', '.$participant_id.', '.$question_id.', '.$scoring.', '.$score_id.', '.$score.')">'.$score.'</a></center></td>';
                                }

                            }
                            
                        }



                        // foreach ($query5 as $query5) {

                        //     $score_id = $query5->score_id;
                        //     $participant_idx = $query5->participant_id;
                        //     $question_idx = $query5->question_id;
                        //     $score = $query5->score;


                        //     if($score==0){
                        //         $output .= '<td data-toggle="tooltip" title="'.$question_name.'" id="td_'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'" style="padding: 0; margin: 0;"><center id="'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'"><a type="button" class="btn btn-block btn-default btn-flat" onclick="UpdateScore('.$event_id.', '.$round_id.', '.$participant_id.', '.$question_id.', '.$scoring.', '.$score_id.', '.$score.')">'.$score.'</a></center></td>';
                        //     }
                        //     else {
                        //         $output .= '<td data-toggle="tooltip" title="'.$question_name.'" id="td_'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'" style="padding: 0; margin: 0;"><center id="'.$event_id.'_'.$round_id.'_'.$participant_id.'_'.$question_id.'_'.$score_id.'"><a type="button" class="btn btn-block btn-warning btn-flat" onclick="UpdateScore('.$event_id.', '.$round_id.', '.$participant_id.', '.$question_id.', '.$scoring.', '.$score_id.', '.$score.')">'.$score.'</a></center></td>';
                        //     }

                        // }
                    }

                    $query6 = DB::select('SELECT SUM(score) AS score FROM score WHERE score.participant_id = ?', [$participant_id]);

                    foreach ($query6 as $query6) {

                        $score = $query6->score;

                        $output .= '<td hidden="true" id="sum_'.$event_id.'_'.$round_id.'_'.$participant_id.'" style="padding: 0; margin: 0;"><center id="id_participant_'.$participant_id.'">'.$score.'</center></td>';
                    }

                    $output .= '</tr>';

                }

                $output .= '</tbody>';

                $output .= '</table>';

                /* TALLY TABLE START */
                $output .= '<table id="id_tally_table_'.$event_id.'_'.$round_id.'" class="table table-bordered table-hover">';

                // $output .= '<thead>';

                // $output .= '<th>ParticipantID</th>';
                // $output .= '<th>Team</th>';
                // $output .= '<th>Round</th>';
                // $output .= '<th>Event</th>';
                // $output .= '<th>Total</th>';

                // $output .= '</thead>';

                $query7 = DB::select('SELECT DISTINCT participant.participant_id AS participants_id, team.team_name, round.round_id, event.event_id,
                        (SELECT SUM(score) AS score FROM score WHERE score.participant_id = participants_id) AS sum
                        FROM score, question, participant, users, team, round, event
                        WHERE score.question_id = question.question_id
                        AND score.participant_id = participant.participant_id
                        AND score.id = users.id
                        AND participant.team_id = team.team_id
                        AND round.event_id = event.event_id
                        AND question.round_id = round.round_id
                        AND round.round_id = ?
                        AND event.event_id = ? ORDER BY sum DESC',  [$round_id, $event_id]);

                $output .= '<tbody>';

                foreach ($query7 as $query7) {

                    $counter = 1;

                    $participant_idx = $query7->participants_id;
                    $team_codex = $query7->team_name;
                    $round_idx = $query7->round_id;
                    $event_idx = $query7->event_id;
                    $sumx = $query7->sum;

                    // $output .= '<td id="total_score_id_'.$event_idx.'_'.$round_idx.'_'.$participant_idx.'"><center><h4 class="text-danger">'.$team_codex.' <br/> '.$sumx.'</h4></center></td>';

                    $counter = $counter + 1;
                }

                $output .= '</tbody>';

                $output .= '</table>';
                /* TALLY TABLE END */

                $output .= '</div>';
            }

            $output .= '</div>';

            $output .= '</div>';
        }

        $output .= '</div>';

        return $output;
    }

    public function UpdateScore($request){

        $score_id = $request->input('score_id');
        $new_score = $request->input('new_score');
        
        $result = DB::update('UPDATE score SET score = ? WHERE score_id = ?', [$new_score, $score_id]);

        return $result;
    }

    public function GetSpecificScore($request){

        //$score_id = $request->input('score_id');

        //echo "Specific Score";
        
        $participant_id = 1;

        $result = DB::get('SELECT SUM(score) AS score FROM score WHERE score.participant_id = ?', [$participant_id]);

        return $result;
    }

     public function scopeGetEventTally(){

        $result = DB::select('');

        return $result;
     }


    public function scopeGetSumScore(){

        $result = DB::select('SELECT DISTINCT participant.participant_id AS participants_id, team.team_code, team.team_name, round.round_id, event.event_id,
                (SELECT SUM(score) AS score FROM score WHERE score.participant_id = participants_id) AS sum
                FROM score, question, participant, users, team, round, event
                WHERE score.question_id = question.question_id
                AND score.participant_id = participant.participant_id
                AND score.id = users.id
                AND participant.team_id = team.team_id
                AND round.event_id = event.event_id
                AND question.round_id = round.round_id
                ORDER BY sum DESC');
                        
        return $result;
    }


    public function scopeGetParticipatingTeamsPerEnlisted(){

        $result = DB::select('SELECT * FROM participant, team WHERE participant.team_id = team.team_id');
                        
        return $result;
    }

    public function scopeGetQuestionPerRound(){

        $result = DB::select('SELECT * FROM question');
                        
        return $result;
    }











    public function scopeShowTabulationList(){

        $output = '';

        $query0 = DB::select('SELECT COUNT(*) AS counter 
            FROM category, event
            WHERE category.event_id = event.event_id
            AND event.event_status = "T"');

        foreach ($query0 as $query0) {

            $counter = $query0->counter + 2;
            $divider = 100/$counter;

            $query1 = DB::select('SELECT *
                FROM category, event
                WHERE category.event_id = event.event_id
                AND event.event_status = "T"');

                //$output .= '<td width="'.$divider.'%">';

                $output .= '<table class="table table-bordered table-hover">';

                $output .= '<thead>';

                $output .= '<th width="'.$divider.'%">Contestant</th>';

                foreach ($query1 as $query1) {

                    $category_id = $query1->category_id;
                    $category_codex = $query1->category_code;
                    $category_namex = $query1->category_name;
                    $percentagex = $query1->percentage;

                    $output .= '<th width="'.$divider.'%"><center>'.$category_id.' '.$category_namex.' '.$percentagex.'%</center></th>';

                }

                $output .= '<th width="'.$divider.'%"><center>Final Score</center></th>';

                $output .= '</thead>';

                $output .= '<tbody>';

                $query2 = DB::select('SELECT * FROM contestant, event WHERE contestant.event_id = event.event_id AND event.event_status = "T"');

                foreach ($query2 as $query2) {

                    $contestant_id = $query2->contestant_id;
                    $con_image = $query2->con_image;
                    $contestant_name = $query2->contestant_name;

                    $query3 = DB::select('SELECT * FROM category, event WHERE category.event_id = event.event_id AND event.event_status = "T"');

                    $output .= '<tr>';

                    $output .= '<td>'.$contestant_name.'</td>';
                    
                    $ranking_value = 0;

                    foreach ($query3 as $query3) {

                        $cat_id = $query3->category_id;
                        $num_of_cri;
                        $percentage_value = $query3->percentage;

                        // $query4 = DB::select('SELECT criteria.criteria_id, criteria.criteria_code
                        //     FROM criteria, category, event
                        //     WHERE criteria.category_id = category.category_id
                        //     AND category.event_id = event.event_id
                        //     AND event.event_status = "T"
                        //     AND criteria.category_id = ?', [$cat_id]);


                        $query4 = DB::select('SELECT criteria.criteria_id, criteria.criteria_code, (SELECT count(*) as num_of_cri
                            FROM criteria, category, event
                            WHERE criteria.category_id = category.category_id
                            AND category.event_id = event.event_id
                            AND event.event_status = "T"
                            AND criteria.category_id = ?) AS num_of_cri
                            FROM criteria, category, event
                            WHERE criteria.category_id = category.category_id
                            AND category.event_id = event.event_id
                            AND event.event_status = "T"
                            AND criteria.category_id = ?', [$cat_id, $cat_id]);

                            $output .= '<td step="0.01" value="0.00"><center>';

                            $average_score = 0;
                            $number_of_judge;
                            $number_of_criteria;
     
                            foreach ($query4 as $query4) {

                                $cri_id = $query4->criteria_id;
                                $number_of_criteria = $query4->num_of_cri;

                                $query5 = DB::select('SELECT DISTINCT SUM(score) AS average_score
                                        FROM score, contestant, criteria, category
                                        WHERE score.contestant_id = contestant.contestant_id
                                        AND score.criteria_id = criteria.criteria_id
                                        AND criteria.category_id = category.category_id
                                        AND score.contestant_id = ?
                                        AND criteria.category_id = ?', [$contestant_id, $cat_id]);

                                    foreach ($query5 as $query5) {

                                        $average_score = $query5->average_score;
                                        

                                        $query6 = DB::select('SELECT COUNT(*) AS number_of_judge
                                            FROM users, event
                                            WHERE users.event_id = event.event_id
                                            AND event.event_id = (SELECT DISTINCT (event.event_id)
                                                FROM score, contestant, criteria, category, event
                                                WHERE score.contestant_id = contestant.contestant_id
                                                AND score.criteria_id = criteria.criteria_id
                                                AND criteria.category_id = category.category_id
                                                AND category.event_id = event.event_id
                                                AND score.contestant_id = ?
                                                AND criteria.category_id = ?)', [$contestant_id, $cat_id]);

                                        foreach ($query6 as $query6) {

                                            $number_of_judge = $query6->number_of_judge;
                                        }

                                    }


                            }

                            $average = ($average_score / ($number_of_judge * $number_of_criteria));

                            $rounded_average = number_format($average, 2);

                            $weighted_average = number_format(($rounded_average * ($percentage_value)/100), 2);

                            $ranking_value = number_format(($ranking_value + $weighted_average), 2);

                            $output .= ''.$average_score.' / ('.$number_of_criteria.' * '.$number_of_judge.') = '.$rounded_average.' ('.$weighted_average.')';

                            //$output .= ''.$rounded_average.' ('.$weighted_average.')';

                            $output .= '</center></td>';

                    }

                    $output .= '<td><center>'.$ranking_value.'</center></td>';

                    $output .= '</tr>';

                }

                $output .= '</tbody>';

                $output .= '</table>';

        }

        return $output;
    }


    public function scopeShowCategoryCriteriaList(){

        $cand_id = $_GET['q'];

        //$cand_id = 10;

        //echo $cand_id;

        $output = '';

        $query0 = DB::select('SELECT COUNT(*) AS counter 
            FROM category, event
            WHERE category.event_id = event.event_id
            AND event.event_status = "T"');

        foreach ($query0 as $query0) {

            $counter = $query0->counter;
            $divider = 100/$counter;

            $query1 = DB::select('SELECT *
                FROM category, event
                WHERE category.event_id = event.event_id
                AND event.event_status = "T"');

            foreach ($query1 as $query1) {

                $category_id = $query1->category_id;
                $category_codex = $query1->category_code;
                $category_namex = $query1->category_name;
                $percentagex = $query1->percentage;

                $output .= '<td width="'.$divider.'%">';

                $output .= '<table class="table table-bordered table-hover">';

                $output .= '<thead>';

                $output .= '<th><center>'.$category_namex.' '.$percentagex.'%</center></th>';

                $output .= '</thead>';

                $query2 = DB::select('SELECT criteria.criteria_id AS cri_id, 
                    criteria.criteria_code AS cri_code, criteria.criteria_desc AS cri_desc,
                    criteria.percentage AS cri_percentage
                    FROM criteria, category, event
                    WHERE criteria.category_id = category.category_id
                    AND criteria.category_id = ?
                    AND category.event_id = event.event_id
                    AND event.event_status = "T"', [$category_id]);
                
                $output .= '<tbody>';

                foreach ($query2 as $query2) {

                    $cri_id = $query2->cri_id;
                    $cri_code = $query2->cri_code;
                    $cri_desc = $query2->cri_desc;
                    $cri_percentage = $query2->cri_percentage;
                    // $category_id = $query2->category_id;
                    // $category_code = $query2->category_code;
                    // $category_name = $query2->category_name;

                    $output .= '<tr>';

                    $output .= '<td width="100%" style="padding: 0; margin: 0;">';

                    $output .= '<table>';

                    $output .= '<tbody>';

                    $id = Auth::id();

                    $output .= '<td width="60%">'.$cri_desc.'</td>';
                    //$output .= '<td width="60%">'.$cri_desc.'-'.$id.'-'.$cri_id.'-'.$cand_id.'</td>';
                    //$output .= '<td width="60%">'.$id.'-'.$cri_id.'-'.$cand_id.'</td>';
                    

                    $query3 = DB::select('SELECT score.score AS cri_score
                        FROM score, users, criteria, contestant
                        WHERE score.id = users.id
                        AND score.criteria_id = criteria.criteria_id
                        AND score.contestant_id = contestant.contestant_id
                        AND score.id = ?
                        AND score.criteria_id = ?
                        AND score.contestant_id = ?', [$id, $cri_id, $cand_id]);

                    if (!$query3){

                        //$output .= '<td>Empty</td>';
                        $output .= '<td width="40%"><input class="form-control" id="criteria_score" type="text" onkeydown="insert_score(this.value, '.$cri_id.')" data-toggle="tooltip" title="70 - 100" style="text-align:right;" autocomplete="off" required></td>';
                    }

                    else {

                        foreach ($query3 as $query3) {

                            $cri_score = $query3->cri_score;

                            $output .= '<td width="40%"><input class="form-control" id="criteria_score" type="text" value="'.$cri_score.'" onkeydown="insert_score(this.value, '.$cri_id.')" data-toggle="tooltip" title="70 - 100" style="text-align:right;" autocomplete="off" required></td>';

                        }

                        //$output .= '<td>Has Rows</td>';
                        
                    }

                    foreach ($query3 as $query3) {


                    }

                    //$output .= '<td width="40%"><input class="form-control" id="criteria_score" type="text" value="" onkeydown="insert_score(this.value, '.$cri_id.')" data-toggle="tooltip" title="Hooray!" style="text-align:right;" autocomplete="off" placeholder="Input 70 to 100" required></td>';

                    $output .= '</tbody>';

                    $output .= '</table>';

                    $output .= '</td>';

                    $output .= '</tr>';
                }        

                $output .= '</tbody>';

                $output .= '</table>';

                $output .= '</td>';
            }
        }

        return $output;

    }





























    public function InsertScore($request){

        //echo "This is the model";

        $score = $request->input('score');
        $id = Auth::id();
        $cri_id = $request->input('cri_id');
        $cand_id = $request->input('cand_id');
        
        //$query0 = DB::select('SELECT COUNT(*) AS counter FROM transaction');


        $delete = DB::delete('DELETE FROM score WHERE id = ? AND criteria_id = ? AND contestant_id = ?', [$id, $cri_id, $cand_id]);



        $result = DB::insert('INSERT INTO score (score, id, criteria_id, contestant_id) VALUES (?, ?, ?, ?)', [$score, $id, $cri_id, $cand_id]);

        return $result;
    }

    public function scopeDisplayAllData(){

        $output = '';

        $query0 = DB::select('SELECT COUNT(*) AS counter FROM transaction');

        foreach ($query0 as $query0) {

            $counter = $query0->counter;
            $divider = 100/$counter;

            $query1 = DB::select('SELECT * FROM transaction');

            foreach ($query1 as $query1) {

                $trans_id = $query1->trans_id;

                $output .= '<td width="'.$divider.'%">';

                $query2 = DB::select('SELECT * FROM queue WHERE statusx = "P" ORDER BY time_stamp ASC');

                // Inner Table Starting Point
                $output .= '<table class="table table-bordered table-hover">';
                $output .= '<tbody>';

                foreach ($query2 as $query2) {

                    $queue_id = $query2->queue_id;
                    $fullname = $query2->fullname;
                    $queue_trans_id = $query2->trans_id;

                    if($queue_trans_id == $trans_id){
                        
                        $output .= '<tr>';

                        $output .= '<td width="100%" style="padding: 0; margin: 0;"><a href="javascript:void(0);" class="btn btn-block btn-success btn-flat RemoveQueue">'.$queue_id.''.$trans_id.''.$fullname.'</a></td>';
                    
                        $output .= '</tr>';
                    }
                }

                $output .= '</tbody>';
                $output .= '</table>';

                $output .= '</td>';



            }      
        }

        $output .= '<table>';

        $output .= '<tbody>';

        $output .= '<tr>';

        $query3 = DB::select('SELECT COUNT(*) AS counter FROM transaction');

        foreach ($query3 as $query3) {

            $counter1 = $query3->counter;
            $divider1 = 100/$counter1;

            $query4 = DB::select('SELECT * FROM transaction');

            foreach ($query4 as $query4) {

                $trans_id1 = $query4->trans_id;
                $trans_code1 = $query4->trans_code;
                $trans_name1 = $query4->trans_name;

                $output .= '<td width="'.$divider1.'%">';

                $query5 = DB::select('SELECT * FROM queue, transaction
                        WHERE queue.trans_id = transaction.trans_id
                        AND statusx = "P"
                        AND queue.trans_id = ? ORDER BY queue.time_stamp ASC limit 1', [$trans_id1]);

                foreach ($query5 as $query5) {

                    $queue_id = $query5->queue_id;

                    $output .= '<a href="#" class="btn btn-block btn-success btn-flat" ondblclick="Trigger('.$trans_id1.', '.$queue_id.')">Window: '.$trans_name1.'</a>';

                }

                $output .= '</td>';
            }

        }

        $output .= '</tr>';

        $output .= '</tbody>';

        $output .= '</table>';

        return $output;        
    }


    public function scopeDisplayAllData1(){

        $output = '';

        $query0 = DB::select('SELECT COUNT(*) AS counter FROM transaction');

        foreach ($query0 as $query0) {

           $counter = $query0->counter;
           $divider = 100/$counter;

            $query1 = DB::select('SELECT * FROM transaction');

            foreach ($query1 as $query1) {

                $trans_id = $query1->trans_id;

                $output .= '<td width="'.$divider.'%" valign="top">';

                $query2 = DB::select('SELECT * FROM queue WHERE statusx = "P" ORDER BY time_stamp ASC');

                // Inner Table Starting Point
                //$output .= '<table class="table table-hover">';


                $output .= '<table class="table-bordered" style="width:100%;">';

                $output .= '<tbody>';

                foreach ($query2 as $query2) {

                    $queue_id = $query2->queue_id;
                    $fullname = $query2->fullname;
                    $queue_trans_id = $query2->trans_id;

                    if($queue_trans_id == $trans_id){
                        
                        $output .= '<tr>';

                        $output .= '<td width="100%"><a href="javascript:void(0);" class="btn btn-block btn-default btn-flat" id="id_btn_'.$queue_id.'" onclick="GetID('.$queue_id.')">'.$queue_id.''.$trans_id.''.$fullname.'</a></td>';
                    
                        $output .= '</tr>';
                    }
                }
                
                $output .= '</tbody>';

                $output .= '</table>';
      
                $output .= '</td>';
                

            }

        }

        $output .= '<table>';

        $output .= '<tbody>';

        $output .= '<tr>';

        $query3 = DB::select('SELECT COUNT(*) AS counter FROM transaction');

        foreach ($query3 as $query3) {

            $counter1 = $query3->counter;
            $divider1 = 100/$counter1;

            $query4 = DB::select('SELECT * FROM transaction');

            foreach ($query4 as $query4) {

                $trans_id1 = $query4->trans_id;
                $trans_code1 = $query4->trans_code;
                $trans_name1 = $query4->trans_name;

                $output .= '<td width="'.$divider1.'%">';

                $query5 = DB::select('SELECT * FROM queue, transaction
                        WHERE queue.trans_id = transaction.trans_id
                        AND statusx = "P"
                        AND queue.trans_id = ? ORDER BY queue.time_stamp ASC limit 1', [$trans_id1]);

                foreach ($query5 as $query5) {

                    $queue_id = $query5->queue_id;

                    $output .= '<a href="#" class="btn btn-block btn-success btn-flat" ondblclick="Trigger('.$trans_id1.', '.$queue_id.')">Window: '.$trans_name1.'</a>';

                }

                $output .= '</td>';
            }

        }

        $output .= '</tr>';

        $output .= '</tbody>';

        $output .= '</table>';
        
        return $output;
    }

    public function scopeDisplayAllQueueList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM queue');

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Name</th>';
        $output .= '<th>Transaction</th>';
        $output .= '<th>Timestamp</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->queue_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->fullname.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->trans_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->time_stamp.'</td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        return $output;
    }




    public function DisplayAllEventList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM event WHERE event_id NOT IN (1)');

        $output .= '<h4>';

        $output .= '<center>Event Listing<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modal_add_event">Create Event</button></center>';

        $output .= '</h4>';

        $output .= '<div class="table-responsive">';

        $output .= '<table class="table table-striped table-bordered table-hover">';

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Code</th>';
        $output .= '<th>Description</th>';
        $output .= '<th>Mininum Score</th>';
        $output .= '<th>Maximum Score</th>';
        $output .= '<th>Status</th>';
        $output .= '<th>Date</th>';
        $output .= '<th>Action</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_description.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->min_score.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->max_score.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_status.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->time_stamp.'</td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>Action</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';

        $output .= '</div>';

        return $output;
    }

    public function DisplayAllContestantList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM contestant, event WHERE contestant.event_id = event.event_id');

        $output .= '<h4>';

        $output .= '<center>Contestant Listing<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modal_add_event">Create Event</button></center>';

        $output .= '</h4>';

        $output .= '<div class="table-responsive">';

        $output .= '<table class="table table-striped table-bordered table-hover">';

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Image</th>';
        $output .= '<th>Name</th>';
        $output .= '<th>Event Code</th>';
        $output .= '<th>Event Description</th>';
        $output .= '<th>Min Score</th>';
        $output .= '<th>Max Score</th>';
        $output .= '<th>Status</th>';
        $output .= '<th>Action</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->contestant_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->con_image.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->contestant_name.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_description.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->min_score.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->max_score.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_status.'</td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>Action</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';

        $output .= '</div>';

        return $output;
    }


    public function DisplayAllCategoryList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM category, event WHERE category.event_id = event.event_id');

        $output .= '<h4><center>Category Listing</center></h4>';

        $output .= '<div class="table-responsive">';

        $output .= '<table class="table table-striped table-bordered table-hover">';

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Category Code</th>';
        $output .= '<th>Category Name</th>';
        $output .= '<th>Event Code</th>';
        $output .= '<th>Event Description</th>';
        $output .= '<th>Percentage</th>';
        $output .= '<th>Action</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->category_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->category_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->category_name.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->event_description.'</td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>'.$query5->percentage.'%</center></td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>Action</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';

        $output .= '</div>';

        return $output;
    }

    public function DisplayAllCriteriaList(){

        $output = '';

        $query5 = DB::select('SELECT criteria.criteria_id, criteria.criteria_code, criteria.criteria_desc, criteria.percentage, category.category_code FROM criteria, category WHERE criteria.category_id = category.category_id');

        $output .= '<h4><center>Criteria Listing</center></h4>';

        $output .= '<div class="table-responsive">';

        $output .= '<table class="table table-striped table-bordered table-hover">';

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Criteria Code</th>';
        $output .= '<th>Criteria Name</th>';
        $output .= '<th>Percentage</th>';
        $output .= '<th>Category</th>';
        $output .= '<th>Action</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->criteria_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->criteria_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->criteria_desc.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->percentage.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->category_code.'</td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>Action</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';

        $output .= '</div>';

        return $output;
    }



    public function DisplayAllSocketList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM socket');

        $output .= '<h4><center>Socket Listing</center></h4>';

        $output .= '<div class="table-responsive">';

        $output .= '<table class="table table-striped table-bordered table-hover">';

        $output .= '<thead>';

        $output .= '<th>ID</th>';
        $output .= '<th>Socket Data</th>';
        $output .= '<th>Action</th>';

        $output .= '</thead>';

        $output .= '<tbody>';
                
        foreach ($query5 as $query5) {

            $output .= '<tr>';

            $output .= '<td style="padding: 0; margin: 0;">'.$query5->socket_id.'</td>';
            $output .= '<td style="padding: 0; margin: 0;">'.$query5->data.'</td>';
            $output .= '<td style="padding: 0; margin: 0;"><center>Action</center></td>';

            $output .= '</tr>';
        }

        $output .= '</tbody>';

        $output .= '</table>';

        $output .= '</div>';

        return $output;
    }

    public function InsertSocketData($request){

        $data = $request->input('data');

        $result = DB::insert('insert into socket (data) values (?)', [$data]);

        return $result;
    }






    public function scopeShowAllCandidateList(){

        $output = '';

        $query5 = DB::select('SELECT * FROM contestant, event WHERE contestant.event_id = event.event_id AND event.event_status = "T"');

        foreach ($query5 as $query5) {

            $output .= '<li onclick="Trigger(\'' .$query5->contestant_name. '\', '.$query5->contestant_id.')" >'.$query5->contestant_id.'<br>'.$query5->contestant_name.'</li>';

            // $output .= '<li onclick="Trigger('.$query5->contestant_id.')" >'.$query5->contestant_id.'<br>'.$query5->contestant_name.'</li>';

            //$output .= '<li></li>';
        }

        


        return $output;        
    }

    // public function ShowSpecificCandidateList(){

    //     $output = '';

    //     $query5 = DB::select('');


        


    //     return $output;        
    // }






    public function InsertData($request){

        //$temperature = $request->input('temperature');
        //$humidity = $request->input('humidity');

        $temperature = "50";
        $humidity = "70";

        $result = DB::insert('insert into air_data (temperature, humidity) values (?, ?)', [$temperature, $humidity]);

        //echo "Model";

        return $result;
    }


    public function GetAllContacts(){

        //echo "Test Model";

        $result = DB::select('SELECT * FROM contacts');
                        
        return $result;
    }




}