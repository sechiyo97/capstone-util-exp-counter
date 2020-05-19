<?php
    include 'functions.php';

    $exp_num = $_POST['exp_num'];
    $case_num = $_POST['case_num'];

    updateExp($exp_num, $case_num);
?>