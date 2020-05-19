<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no">
<title>소종 Default팀</title>
<?php
  include 'functions.php';
?>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script type = "text/javascript">
    var experimentee = 0;

    var experiments = ["BT", "BC", "LT", "RT", "LC", "RC"];
    var expcounts = [18,20,18,18,20,20]

    var expNum, caseNum;
    getData();

    function case_reset(){
        var upload = confirm("초기화하시겠습니까?");
        if (upload) {
            caseNum = 0; expNum = 0; 
            dataSave();
        } 
    }
    function getData(){
        $.ajax ({
            type : "POST",
            url : "expDataPage.php",
            data: {action: 'test'},
            dataType : "json",
            cache : false,
            success : function (data) {
            console.log(data);
            expNum = Number(data['exp_num']);
            caseNum = Number(data['case_num']);
            },
            error: function(xhr, status, error) {
            console.log(xhr + status + " : " + error)
            }
        });
    }
    function case_up(){
        getData();
      if (caseNum<expcounts[expNum]-1) caseNum++; 
      else if (expNum<5) {caseNum=0;expNum++;}
      dataSave();
    }
    function case_down(){
        getData();
      if (caseNum>0) caseNum--; 
      else if (expNum>0) {expNum--; caseNum=expcounts[expNum]-1;}
      dataSave();
    }
    function dataSave(){
        var dataForm = document.getElementById('dataForm');
        var inputExpNum = document.getElementById('input_exp_num');
        var inputCaseNum = document.getElementById('input_case_num');

        inputExpNum.value = expNum
        inputCaseNum.value = caseNum;
        dataForm.target="ifrm";
        console.log(inputCaseNum.value);
        dataForm.submit();
    }
  </script>
  <input type="button" style="background-color:#DEB247;width:100vw; height:30vh; font-size:6em;" id="case_up" onclick="case_up()" value="UP"></input>
  <input type="button" style="background-color:#B7A98E;width:100vw; height:30vh; font-size:6em;" id="case_down" onclick="case_down()" value="DOWN"></input>
  <input type="button" style="background-color:#DED8DA;width:100vw; height:18vh; font-size:4em;" id="reset" onclick="case_reset()" value="RESET"></input>

  <form id="dataForm" action="changeExpData.php" method="post">
    <iframe name="ifrm" width="0" height="0" frameborder="0"></iframe> 
    <input id="input_exp_num" type="hidden" name="exp_num" value=0>
    <input id="input_case_num" type="hidden" name="case_num" value=0>
    <input type="submit" style="visibility:hidden">
  </form>

  <script type="text/javascript">
  
  </script>
  
<body>
</html>