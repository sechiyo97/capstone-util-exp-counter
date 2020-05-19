<?php
header("Content-Type: application/json");
$exp_num = $_POST['exp_num'];
$case_num = $_POST['case_num'];
// 자바스크립트 객체 또는 serialize() 로 전달
echo(json_encode(array("exp_num" => $exp_num, "case_num" => $case_num)));
?>