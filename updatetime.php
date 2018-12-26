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
<table class="w3-table-all">
    <thead>
   <tr class="w3-red">
      <th>เวลาเริ่มลดน้ำ</th>
      <th>เวลาหยุดลดน้ำ</th>
       <th>ลบเวลา</th>
   </tr>   
    </thead>
   <tr ng-repeat = "value in time">
      <td>{{ value.startTime }}</td>
      <td>{{ value.endTime }}</td>
       <td><input type="image" src="ttps://onedrive.live.com/embed?cid=25D5CE47EAA8E001&resid=25D5CE47EAA8E001%21410&authkey=AIyPqmOuc_euZG8" alt="Submit" width="48" height="48"></td>
       
     </tr>
</table>
<form action="https://golfais.herokuapp.com/updatetime.html" style="" method="POST">
</form>
</div>
    
 
  
</body>
</html>

<script>
    
     var str = '<?php echo $_POST["time"]; ?>';
  var res = str.split(",");

 

var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[
        { startTime: res[0],endTime:res[1]},
        {startTime: res[2],endTime:res[3]},
        {startTime: res[4],endTime:res[5]}
    ]
    
});
</script>
