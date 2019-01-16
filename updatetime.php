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
  
        <td>  
               <img border="0" onclick="deleteTime()" alt="W3Schools"  src="https://4svp8a.bn.files.1drv.com/y4mVgFr0lURXzrx5N5zfrxABKNs9Rm7dX-FmyB61pE9dOj9-KWoHU_CBHUOldPwTfICOuZUjGkEI6NTYCmfdwPhUdkjzzpudGq9SkasOLJ338OddTstXbL4QGEMg573BPiXGBeJIyaBntgXRVtlyNVAoN0dEIZYUAFDU76-BimphYfmShsYkuHDzOacZ0o6T8YH62ywhB8rYuN9ssibt4Zdlw?width=256&height=256&cropmode=none" alt="Submit" width="48" height="48">
               
                
            </td>
     </tr>
</table>
<form action="https://golfais.herokuapp.com/updatetime.html" style="" method="POST">
    

</form>

 
</div>
 {{testTime}}   
 

</body>
<?php


// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['settimeSE'])) {

	send_LINE2($events['settimeSE']);
	
	 echo "OKESP";
    }



    function send_LINE2($msg){
        $access_token = '+RAgZsXSoIB12rh5ilBLg3BySGaIGHSvVROMcOJ9yw0B96H9VLORNgQs+a6Og5wS/MOplVEgqgYoVs5BosxYieMV5GGaOqnXhNrFje4NnnPhc04X57HVXsYDisV4JycZ2OovPF6jkSq6EHAN6xijpQdB04t89/1O/w1cDnyilFU='; 
        
          
         $messages = [
               'type' => 'text',
               'text' =>  $msg
               //'text' => $text
             ];
             // Make a POST Request to Messaging API to reply to sender
             $url = 'https://api.line.me/v2/bot/message/push';
             $data = [
               'to' => 'U83a5616b8fbc8a46e75065d20f8297ad',
               'messages' => [$messages],
             ];
             $post = json_encode($data);
             $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
             $ch = curl_init($url);
            
       
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
             $result = curl_exec($ch);
             curl_close($ch);
             // $URL = "https://golfais.herokuapp.com/updatetime.php?stime=".$post;
               
            
             echo "88"; 
             //  '<script type="text/javascript">
             // window.location = "'.$URL.'"</script>';
        
        
       }







?>
<script>
  
  var app = angular.module('myApp', []);
  app.controller('customersCtrl', function($scope, $http) {
      var str = "<?php echo $_POST["time"]; ?>";
     // $scope.testTime = "<?php $content = file_get_contents('php://input'); $events = json_decode($content, true);  $events['settimeSE']?>";
     // $scope.testTime = "<?php  $content = file_get_contents('php://input'); $events = json_decode($content, true); send_LINE2($events['settimeSE']);  echo $events['settimeSE'];?>";
     // $testTime =$events['settimeSE'];
        $testTime ="<?php $msg;?>";
     var res = str.split(",");
      var mainInfo = null;
      // $http.get('settimeSE.json').success(function(data) {
      //      = data;
      // });
      if(res[0]==null || res[0]=="99.99"){
          $scope.time=[{ startTime: "",endTime:""}];
          }
      else if(res[2]==null || res[2]=="99.99"){
          $scope.time=[{ startTime: res[0],endTime:res[1]}];
          }
      else if(res[4]==null || res[4]=="99.99"){
          $scope.time=[{ startTime: res[0],endTime:res[1]},{startTime: res[2],endTime:res[3]}];
          }
      else{
        $scope.time=[{ startTime: res[0],endTime:res[1]},{startTime: res[2],endTime:res[3]},{startTime: res[4],endTime:res[5]}];
           }
  
  });

</script>

</html>

