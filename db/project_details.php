<?php
require('mysql_connect.php');

$_POST = json_decode(file_get_contents('php://input'), true);

$pid = $_POST['pid'];
//
$project_info = "
SELECT *
FROM `projects` AS `p`
JOIN `users` AS `u`
  ON u.user_id = p.author_id
WHERE p.project_id = $pid
";

//get the tools for a specific project id
$tools_pid = "
SELECT t.tool_name AS `name`
FROM `map_tp` AS `map`
JOIN `projects` AS `p`
	ON p.project_id = map.project_id
JOIN `tools` AS `t`
	ON t.tool_id = map.tool_id
WHERE p.project_id = " . $pid;

//get the steps for a specific project id
$steps_pid = "
SELECT i.step_number, i.step_text AS `description`, i.step_photo
FROM `p_instructions` AS `i`
JOIN `projects` AS `p`
	ON i.project_id = p.project_id
WHERE p.project_id = " . $pid ."
ORDER BY i.step_number ASC"
;

//get comments for a specific project id -VL
//$comments_pid = "
//SELECT `comment_text`, `comment_date`
//FROM `p_comments`
//WHERE project_id= " . $pid;

$output = [];

$query = $project_info;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    while( $row = mysqli_fetch_assoc($result) ) {
        $output['info'] = $row;
    }
}

$query = $tools_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    while( $row = mysqli_fetch_assoc($result) ) {
        $output['tools'][] = $row;
    }
}

$query = $steps_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    while( $row = mysqli_fetch_assoc($result) ) {
        $output['steps'][] = $row;
    }
}

// new query added by VL
//$query = $comments_pid;
//$result = mysqli_query($conn, $query);
//if( mysqli_num_rows($result) ) {
//    while( $row = mysqli_fetch_assoc($result) ) {
//        print("comment: ");
//        $output['comments'][] = $row;
//    }
//}

echo json_encode($output);
?>