 <?php
  
function send_LINE($msg){
  $ini_array = parse_ini_file("sample.ini");
 
   
 
    $content = file_get_contents('php://input');
 // Parse JSON
    $events = json_decode($content, true);
 
 
	$ini_array = parse_ini_file("sample.ini");
    $accessToken=$ini_array['accessToken']; 
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
	
	
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา มีอะไรให้รับใช้ค่ะ";
 
 
 
	  $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
	  echo $result . "\r\n"; 
 
}
?>
