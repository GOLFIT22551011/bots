<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body ng-app="myApp">
<div ng-controller="customersCtrl">
    <p><b>แก้ไข้เวลาลดน้ำ</b></p>
<table class="w3-table-all">
    <thead>
   <tr class="w3-red">
      <th><h5>เวลาเริ่มลดน้ำ</h5></th>
      <th><h5>เวลาหยุดลดน้ำ</h5></th>
       <th><h5>ลบเวลา</h5></th>
   </tr>   
    </thead>
   <tr ng-repeat = "value in time">
      <td>{{ value.startTime }}</td>
      <td>{{ value.endTime }}</td>
       <td><input type="image" src="https://4svp8a.bn.files.1drv.com/y4mVgFr0lURXzrx5N5zfrxABKNs9Rm7dX-FmyB61pE9dOj9-KWoHU_CBHUOldPwTfICOuZUjGkEI6NTYCmfdwPhUdkjzzpudGq9SkasOLJ338OddTstXbL4QGEMg573BPiXGBeJIyaBntgXRVtlyNVAoN0dEIZYUAFDU76-BimphYfmShsYkuHDzOacZ0o6T8YH62ywhB8rYuN9ssibt4Zdlw?width=256&height=256&cropmode=none" alt="Submit" width="48" height="48"></td>
       
     </tr>
</table>
<form action="https://golfais.herokuapp.com/updatetime.html" style="" method="POST">
</form>
<?php
 require("sゆ249よおうtq.php");
 require("あr23ぐぎゃEAs.php");
 require("send2.php");
$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['settimeSE'])) {   
    send_LINE2($events['settimeSE']);

    echo ">>>";
}
?> 
</div>
</div>
   {{str}}
   {{testTime}}   
</body>

</html>

<script>
    
  var str = '<?php echo $_POST["time"]; ?>';
  $scope.str = str;
  $scope.testTime = "<?php $content = file_get_contents('php://input'); $events = json_decode($content, true); echo $events['settimeSE']?>";
  var res = str.split(",");
  var app = angular.module('myApp', []);
 
if(res[0]==null || res[0]=="99.99"){
    app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[{ startTime: "",endTime:""}];
    });
}
else if(res[2]==null || res[2]=="99.99"){
    app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[{ startTime: res[0],endTime:res[1]}];
    });
}    
else if(res[4]==null || res[4]=="99.99"){
    app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[{ startTime: res[0],endTime:res[1]},{startTime: res[2],endTime:res[3]}];
    });
}    
else{
    
    app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[{ startTime: res[0],endTime:res[1]},{startTime: res[2],endTime:res[3]},{startTime: res[4],endTime:res[5]}];
    });
}


</script>
