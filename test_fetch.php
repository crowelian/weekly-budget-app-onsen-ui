<?php 
include("db.php");
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
//echo $_GET['week'] . $_GET['login'] . $_GET['year'];

$arr = array();


if ($_GET['login'] == "true") {

    $week = $_GET['week'];
    $year = $_GET['year'];
    $userid = $_GET['userid'];

    $sql = "SELECT * FROM week WHERE week_num = '$week' AND year = '$year' /*AND user_ids LIKE '%{$userid}%*/ "; // Testing

    $result_set = mysqli_query($mysqli_db, $sql);
    
    while ($result = mysqli_fetch_array($result_set)) {
        $week_id = $result['week_id'];
        $week_num = $result['week_num'];
        $arr['week_id'] =  $week_id;
        $arr['week_num'] =  $week_num;
        $arr['year'] = $year;
        /*
        $query2 = "SELECT * FROM budget WHERE week_id = '$week_id' AND user_id = '$userid'";
        $result2 = mysqli_query($mysqli_db, $query2);
        while ($ow2 = mysqli_fetch_array($result2)) {
            array_push($arr, $ow2);
        }
        */
    }

    $data = array(
        'week_info' => $arr
    );

    header('Content-Type: application/json');
    echo json_encode($data);

    /*
    $responseJson = json_encode(array('results' => $arr));
    echo $responseJson;
    */
}









?>