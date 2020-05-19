<?php
header("Content-Type: application/json");
//header("Content-Type: text/plain");
    include 'functions.php';

    $data = getExpData();

    $exp_num = $data[0];
    $case_num = $data[1];//json_encode($data)[1];

    $response_array['exp_num'] = $exp_num;
    $response_array['case_num'] = $case_num;
    echo json_encode($response_array);
    //echo(json_encode(array("exp_num" => $exp_num, "case_num" => $case_num)));
?>