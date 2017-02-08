<?php
    require('mysql_connect.php');

    /* following line is to make $_POST as php expects when using $http (angular way of AJAX) -VL */
    $_POST = json_decode(file_get_contents('php://input'), true);

//    print("post: "); print_r($_POST);

    $proj_id = addslashes($_POST["proj_id"]);

    if ($proj_id === "") {
        print("There is no project id passed in.  Not selecting from database.");
    } else {
        $query = "
        SELECT `comment_text`, `comment_date`
        FROM `p_comments`
        WHERE project_id=$proj_id 
        ORDER BY `comment_date` DESC
        LIMIT 10";

        $output = [];
        $result = mysqli_query($conn, $query);

//    print("result: "); print_r($result);

        if( mysqli_num_rows($result) ) {
            while( $row = mysqli_fetch_assoc($result) ) {
                $row["user_id"] = 8;
                $output[] = $row;
            }
        }

        $output_json = json_encode($output);
        echo ($output_json);
    }
?>