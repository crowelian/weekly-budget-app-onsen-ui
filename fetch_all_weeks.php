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
    
    echo '<ul class="list">';

    while ($result = mysqli_fetch_array($result_set)) {

        $wb_id = $result['wb_id'];
        $week_num = $result['week_num'];
        $year = $result['year'];
        $user_1_sum = $result['user_1_sum'];
        $user_2_sum = $result['user_2_sum'];
        $extra_info = $result['extra_info'];

        $formatDate = strtotime($result['last_edited']);
        $last_edited = date('d.m.Y H:i:s', $formatDate);
        
        echo '<h2>Week id: '.$wb_id.'</h2>';
        echo '<li class="list-item">';
            echo '<div class="center list-item__center">Week: ' . $week_num . ' / Year: ' . $year . '</div>';
        echo '</li>';
        echo '<li class="list-item">';
            echo '<div class="center list-item__center">User 1 sum to use: ' . $user_1_sum . ' / User 2 sum to use: ' . $user_2_sum . '</div>';
        echo '</li>';
        echo '<li class="list-item">';
            echo '<div class="center list-item__center">Extra week info: ' .$extra_info . '</div>';
        echo '</li>';
        echo '<li class="list-item">';
            echo '<div class="center list-item__center">Last edited: ' . $last_edited . '</div>';
        echo '</li>';
       
      
    }

    echo '</ul>';

    
}









?>