<?php 
include("db.php");
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

$arr = array();

if ($_GET['login'] == "true") {

    $week = $_GET['week'];
    $year = $_GET['year'];
    $userid = $_GET['userid'];

    $sql = "SELECT * FROM week_budget WHERE year = '$year'"; // get all weeks

    $result_set = mysqli_query($mysqli_db, $sql);
    
    echo '<div class="card">';
    

    while ($result = mysqli_fetch_array($result_set)) {

        $wb_id = $result['wb_id'];
        $week_num = $result['week_num'];
        $year = $result['year'];
        $user_1_sum = $result['user_1_sum'];
        $user_2_sum = $result['user_2_sum'];
        $extra_info = $result['extra_info'];

        $formatDate = strtotime($result['last_edited']);
        $last_edited = date('d.m.Y H:i:s', $formatDate);
        
        echo '<ons-row><ons-col width="100%" vertical-align="center" style="text-align: center"><h2 class="card__title">Week: '.$week_num.'</h2></ons-col></ons-row>';
        echo '<div class="card__content">';
            echo '<li class="list-item">';
                echo '<div class="center list-item__center">Week: ' . $week_num . ' / ' . $year . '</div>';
            echo '</li>';
            echo '<li class="list-item">';
                echo '<div class="center list-item__center">' . 
                '<ons-row>' .
                '<ons-col width="100%"><ons-list-title>All</ons-list-title></ons-col>' .
                    '<ons-col width="50%"><ons-list-title>'.$user_1_sum.'</ons-list-title></ons-col>' .
                    '<ons-col width="50%"><ons-list-title>'.$user_2_sum.'</ons-list-title></ons-col>' .
                '<ons-col width="100%"><ons-list-item>Pakolliset menot</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.55.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.55.'</ons-list-item></ons-col>' .
                '<ons-col width="100%"><ons-list-item>PSOV</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.1.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.1.'</ons-list-item></ons-col>' .
                '<ons-col width="100%"><ons-list-item>Taloudellinen vapaus</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.1.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.1.'</ons-list-item></ons-col>' .
                '<ons-col width="100%"><ons-list-item>Opiskelu itseensä panostaminen</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.1.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.1.'</ons-list-item></ons-col>' .
                '<ons-col width="100%"><ons-list-item>Huvi & Hauskanpito</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.1.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.1.'</ons-list-item></ons-col>' .
                '<ons-col width="100%"><ons-list-item>Hyväntekeväisyys</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_1_sum * 0.05.'</ons-list-item></ons-col>' .
                    '<ons-col width="50%"><ons-list-item>'.$user_2_sum * 0.05.'</ons-list-item></ons-col>' .
                '<ons-button onclick="functionHere()" modifier="large">Edit week</ons-button>' .
                '</ons-row>' .
                '</div>';
            echo '</li>';
            echo '<li class="list-item">';
                echo '<div class="center list-item__center">Extra week info: ' .$extra_info . '</div>';
            echo '</li>';
            echo '<li class="list-item">';
                echo '<div class="center list-item__center">Last edited: ' . $last_edited . '</div>';
            echo '</li>';
        echo '</div>';
        echo '<hr>';
      
    }

    
    echo '</div>';

    
}









?>