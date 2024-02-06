<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ISFEController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;

use App\Http\Controllers\ISController;

Route::get('main/display_all_user_list', [ISController::class, 'display_all_user_list']);
Route::get('/main', [MainController::class, 'index']);
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('main/successlogin', [MainController::class, 'successlogin']);
Route::get('main/logout', [MainController::class, 'logout']);

Route::get('main/administrator', [MainController::class, 'administrator']);
Route::get('main/tabulator', [MainController::class, 'tabulator']);


Route::get('main/id_show_navigation', [ISController::class, 'id_show_navigation']);
Route::any('main/update_score', [ISController::class, 'update_score']);
// Route::get('main/update_td_data', [ISController::class, 'update_td_data']);
Route::any('main/get_specific_score', [ISController::class, 'get_specific_score']);

Route::get('main/id_show_tbody', [ISController::class, 'id_show_tbody']);

Route::get('main/get_sum_score', [ISController::class, 'get_sum_score']);

Route::any('main/insert_team', [ISController::class, 'insert_team']);
Route::any('main/delete_team', [ISController::class, 'delete_team']);

Route::get('main/id_team_data', [ISController::class, 'id_team_data']);
Route::get('main/id_participating_teams_data', [ISController::class, 'id_participating_teams_data']);

Route::any('main/insert_participating_team', [ISController::class, 'insert_participating_team']);


Route::get('main/id_participating_teams_enlisted', [ISController::class, 'id_participating_teams_enlisted']);


Route::get('main/get_participating_teame_enlisted', [ISController::class, 'get_participating_teame_enlisted']);


Route::any('main/remove_participating_team', [ISController::class, 'remove_participating_team']);


Route::any('main/insert_question', [ISController::class, 'insert_question']);


Route::get('main/get_question_enlisted', [ISController::class, 'get_question_enlisted']);


Route::any('main/remove_question', [ISController::class, 'remove_question']);

Route::get('main/id_tally_per_event', [ISController::class, 'id_tally_per_event']);

Route::get('main/get_event_tally', [ISController::class, 'get_event_tally']);


// Route::get('main/judge', [MainController::class, 'judge']);
// Route::get('main/display_all_event_list', [ISController::class, 'display_all_event_list']);
// Route::get('main/display_all_contestant_list', [ISController::class, 'display_all_contestant_list']);
// Route::get('main/display_all_category_list', [ISController::class, 'display_all_category_list']);
// Route::get('main/display_all_criteria_list', [ISController::class, 'display_all_criteria_list']);
// Route::get('main/show_all_candidate_list', [ISController::class, 'show_all_candidate_list']);
// Route::get('main/show_category_criteria_list', [ISController::class, 'show_category_criteria_list']);
// Route::get('main/show_all_tabulation_list', [ISController::class, 'show_all_tabulation_list']);
// Route::any('main/insert_score', [ISController::class, 'insert_score']);


// Route::any('login_api', [ISController::class, 'login_api']);