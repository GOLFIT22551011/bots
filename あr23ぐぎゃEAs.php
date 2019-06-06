 <?php
  
function send_LINE($msg){
  $ini_array = parse_ini_file("sample.ini");
 $access_token =$ini_array['accessToken']; 
 
   
  $messages = [
        'type' => 'text',
        'text' =>  $msg
        //'text' => $text
      ];
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
	  curl_setopt($ch, CURLOPT_URL,$url);
	  curl_setopt($ch, CURLOPT_HEADER, false);
	  curl_setopt($ch, CURLOPT_POST, true);
	  
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	  
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  
	  
      
	  
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
 
 
}
?>
