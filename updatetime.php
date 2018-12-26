<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body ng-app="myApp">
<div ng-controller="customersCtrl"> 
<table >
   <tr>
      <th>S</th>
      <th>E</th>
   </tr>   
   <tr ng-repeat = "value in time">
      <td>{{ value.startTime }}</td>
      <td>{{ value.endTime }}</td>
   </tr>
</table>
<form action="https://golfais.herokuapp.com/updatetime.html" style="" method="POST">
</form>
</div>
Welcome <?php echo $_POST["time"]; ?>
    
</body>
</html>

<script>
    
     var str = '<?php echo $_POST["time"]; ?>';
  var res = str.split(",");
 // document.getElementById("demo").innerHTML = res[1];

 

var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $scope.time=[
        {startTime:'<?php echo $_POST["time"]; ?>',endTime:"18:12"},
        {startTime: "18:12",endTime:"18:12"}
    ]
    
});
</script>
