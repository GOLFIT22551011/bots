 <?php
  
function send_LINEBOT($msg){
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
      echo $result . "\r\n"; 
      echo '<script type="text/javascript">
  		  var method = "post";
		   var path = "https://golfais.herokuapp.com/updatetime.php"
    	var form = document.createElement("form");
    	form.setAttribute("method", method);
    	form.setAttribute("action", path);
		   var hiddenField = document.createElement("input");
		   hiddenField.setAttribute("type", "hidden");
		   hiddenField.setAttribute("name", "time");
		   hiddenField.setAttribute("value","12.99,12.34,12.99,14.34,99.99,12.23");	
		
		
     form.appendChild(hiddenField);
    		document.body.appendChild(form);
    		form.submit();
		</script>';	
 
 
}
?>
