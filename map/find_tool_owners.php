
<?php
    require('../db/mysql_connect.php');

    /* following line is to make $_POST as php expects when using $http (angular way of AJAX) -VL */
//    $_POST = json_decode(file_get_contents('php://input'), true);

//    print("GET - tool: "); print_r($_GET["tool"]);

    $tool_name = addslashes( $_POST["tool_name"] );
//    print("tool name: " . $tool_name);

//    $tool_name = addslashes( $_GET["tool"] );

    if ($tool_name === "") {
        print("Tool name is blank.  Not selecting.");
    } else {
        /* Join 3 tables together and get data from each */
        $query = "
                SELECT u.street_address, u.city, u.zip_code, u.state, u.user_name, u.email, u.user_photo
                FROM map_tu AS m
                JOIN users AS u ON m.user_id = u.user_id
                JOIN tools AS t ON m.tool_id = t.tool_id
                WHERE t.tool_name = '$tool_name'
                    " ;

        $output = [];

        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
        }
    }

    $output_json = json_encode($output);
    echo ($output_json);
?>