<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\ISModel;

class ISController extends Controller {
    
    public function login_api(){

        //echo "Login API";

        $result = ISModel::DisplayAllUserAccounts();

        return response()->json($result);
    }    


    public function display_all_user_list(){

        //echo "This is a test";

        echo $result = ISModel::DisplayAllUserList();
    }

    public function insert_user_x(Request $request) {

        //echo "This is the insert user";

        $result = new ISModel();
        $result->InsertUserXXX($request);
        return response()->json($result);
    }

    public function delete_user_x(Request $request) {

        $result = new ISModel();
        $result->DeleteUserXXX($request);
        return response()->json($result);
    }

    public function update_user_x(Request $request) {

        $result = new ISModel();
        $result->UpdateUserXXX($request);
        return response()->json($result);
    }

    public function search_user_x(Request $request) {

        $result = new ISModel();
        $result->SearchUserXXX($request);
        return response()->json($result);
    }

    public function insert_score(Request $request) {

        $result = new ISModel();
        $result->InsertScore($request);
        return response()->json($result);
    }





    public function update_score(Request $request) {

        $result = new ISModel();
        $result->UpdateScore($request);
        return response()->json($result);
    }

    public function get_specific_score(Request $request) {

        $result = new ISModel();
        $result->GetSpecificScore($request);
        return response()->json($result);
    }

    public function insert_team(Request $request) {

        $result = new ISModel();
        $result->InsertTeam($request);
        return response()->json($result);
    }

    public function insert_question(Request $request) {

        $result = new ISModel();
        $result->InsertQuestion($request);
        return response()->json($result);
    }



    public function delete_team(Request $request) {

        $result = new ISModel();
        $result->DeleteTeam($request);
        return response()->json($result);
    }


    public function insert_participating_team(Request $request) {

        $result = new ISModel();
        $result->InsertParticipatingTeam($request);
        return response()->json($result);
    }

    public function remove_participating_team(Request $request) {

        $result = new ISModel();
        $result->RemoveParticipatingTeam($request);
        return response()->json($result);
    }

    public function remove_question(Request $request) {

        $result = new ISModel();
        $result->RemoveQuestion($request);
        return response()->json($result);
    }

















    public function user_data_2(){

        $user = ISModel::RetrieveUser();
             
        return response()->json($user);
    }

    public function flight_view_2(){

        return view('flight_2');
    }

    public function insert_user(Request $request) {

        $result = new ISModel();
        $result->InsertUser($request);
        return response()->json($result);
    }

    public function delete_user(Request $request){

        $result = new ISModel();
        $result->DeletetUser($request);
        return response()->json($result);
    }

    public function update_user(Request $request) {

        $result = new ISModel();
        $result->UpdateUser($request);
        return response()->json($result);
    }

    /*
    public function login_user(Request $request) {

        //$result = new ISModel();
        //$result->InsertUser($request);
        //return response()->json($result);

        echo "Login User";
    }
    */

    //public function index(){

        //$role = M_User::retrieveRole();
        //return view('v_user', compact('role'));
    //}

    //public function retrieve_role(){

        //$role = ISModel::RetrieveRole();
             
        //return response()->json($role);
    //}


    public function user_account(){

        $user = ISModel::RetrieveUserAccount();
             
        return response()->json($user);
    }

    public function insert_userx(Request $request) {

        $result = new ISModel();
        $result->InsertUserX($request);
        return response()->json($result);
    }



    public function retrieve_student(){

        $user = ISModel::scopeRetrieveStudent();
             
        return response()->json($user);

        //return response()->json(ISModel::orderBy('id_student', 'ASC')->get());
    }



    public function count_transaction(){

        $transaction = ISModel::CountTransaction();
             
        return response()->json($transaction);
    }

    public function display_transaction(){

        $transaction = ISModel::DisplayTransaction();
             
        return response()->json($transaction);
    }

    /*
    public function display_queue(){

        $transaction = ISModel::DisplayQueue();
             
        return response()->json($transaction);
    }
    */

    public function display_all_queue(){

        echo $result = ISModel::DisplayAllQueue();
             
        return response()->json($result);
    }

    public function display_queue(Request $request) {

        $result = new ISModel();
        $result->DisplayQueue($request);
        return response()->json($result);
   
    }

    public function display_all_data(){

        echo $result = ISModel::DisplayAllData();
             
    }

    public function display_all_data_1(){

        echo $result = ISModel::DisplayAllData1();
        
    }

    public function display_all_queue_list(){

        echo $result = ISModel::DisplayAllQueueList();
             
    }

    public function display_all_event_list(){

        echo $result = ISModel::DisplayAllEventList();
    }










    public function display_all_contestant_list(){

        echo $result = ISModel::DisplayAllContestantList();
    }

    public function display_all_category_list(){

        echo $result = ISModel::DisplayAllCategoryList();
    }

    public function display_all_criteria_list(){

        echo $result = ISModel::DisplayAllCriteriaList();
    }

    public function display_all_socket_list(){

        echo $result = ISModel::DisplayAllSocketList();
    }

    public function show_all_candidate_list(){

        echo $result = ISModel::ShowAllCandidateList();
    }

    public function show_category_criteria_list(){

        echo $result = ISModel::ShowCategoryCriteriaList();
    }

    public function show_all_tabulation_list(){

        echo $result = ISModel::ShowTabulationList();
    }













    // public function display_role_per_event(){

    //     echo $result = ISModel::DisplayRolePerEvent();
    // }

    // public function id_participating_teams_enlisted(){

    //     echo $result = ISModel::ShowParticipantTeamList();
    // }


    public function id_show_navigation(){

        echo $result = ISModel::ShowNavigationList();
    }


    public function id_team_data(){

        echo $result = ISModel::ShowTeamList();
    }

    public function id_participating_teams_data(){

        echo $result = ISModel::ShowParticipatingTeamData();
    }


    public function id_show_tbody(){

        echo $result = ISModel::ShowTbodyList();
    }



    public function update_td_data(){

        echo $result = ISModel::UpdateTableData();
    }



    public function id_tally_per_event(){

        echo $result = ISModel::ShowTallyPerEvent();
    }






    public function socket_page(){

        return view('socket');
    }

    public function insert_socket(Request $request) {

        $result = new ISModel();
        $result->InsertSocketData($request);
        return response()->json($result);

        //echo "Controller";
    }




    public function php_curl_source(){

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'http://10.0.0.103:8000/php_curl_receiver');
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_exec($curl);

        //echo "PHP CURL SOURCE";
    }

    public function php_curl_receiver(){

        echo '<script type="text/javascript">';
        
        echo 'alert("Hey");';

        echo '</script>';

    }




    public function insert_data(Request $request) {

        $result = new ISModel();
        $result->InsertData($request);
        return response()->json($result);

        //echo "Controller";
    }

    public function fritz(){

       return view('vue');
    }

    public function get_all_contacts(){

        //echo "Get";

        //echo $result = ISModel::GetAllContacts();

        $result = ISModel::GetAllContacts();
             
        return response()->json($result);
             
    }

    public function laravel_vue(){

        //echo "Test";

        return view('laravel_vue');
    }


    public function wheelx(){

        //echo "test";
        return view('wheel');
    }



    public function get_sum_score(){

            //echo "Get";

            //echo $result = ISModel::GetAllContacts();

        $result = ISModel::GetSumScore();
                 
        return response()->json($result);

    }


    public function get_event_tally(){

            //echo "Get";

            //echo $result = ISModel::GetAllContacts();

        $result = ISModel::GetEventTally();
                 
        return response()->json($result);

    }






    public function get_participating_teame_enlisted(){


        $result = ISModel::GetParticipatingTeamsPerEnlisted();
                 
        return response()->json($result);

    }

    public function get_question_enlisted(){

        $result = ISModel::GetQuestionPerRound();
                 
        return response()->json($result);

    }


}