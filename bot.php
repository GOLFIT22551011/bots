<?php
 require("pub.php");
 require("line.php");
// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

if (!is_null($events['ESP'])) {
	
	send_LINE($events['ESP']);
		
	echo "OK";
	}
if (!is_null($events['events'])) {
	echo "line bot";
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$Topic = "NodeMCU1" ;
			//getMqttfromlineMsg($Topic,$text);
			   
			
		}
	}
}
$Topic = "NodeMCU1" ;
//$text = "Test";
//  getMqttfromlineMsg($Topic,$text);
echo "OK3";

    $accessToken = "+RAgZsXSoIB12rh5ilBLg3BySGaIGHSvVROMcOJ9yw0B96H9VLORNgQs+a6Og5wS/MOplVEgqgYoVs5BosxYieMV5GGaOqnXhNrFje4NnnPhc04X57HVXsYDisV4JycZ2OovPF6jkSq6EHAN6xijpQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";

if($text == "สวัสดีต้นข้าว"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }

   else if($text == "ต้นข้าว"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	 
    }

////////////////////////////////////////////////////
    else if($text == "ดูพื้นที่ลดน้ำ"){
        $image_url = "https://vdp9jg.bn.files.1drv.com/y4mKerg48xUmjhD0xK7QLgfKWu5B5S6LfQv3-L7s7FJMvgZ_6WZ-KQBiP27oM3P4Pf2Pkcx6_cls9cEqZsxoF7E03Oou7VO9ASEVi7u9yH9QlgMp2DDispSmdpDyoPoCuMWzAGDHaxuv18YkYVTY2T47o1rYOR5_RgC_jEg78QZZawMtHYmMW8dcwONmdeV8uohrQAtcfFjfN22PlyS_WvZ5g?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
  
////////////////////////////////////////////////////
////////////////////////////////////////////////////
    else if($text == "ลดน้ำ1"){
        $image_url = "https://umruka.bn.files.1drv.com/y4mA41Cp8TuDWolARkgMzNbDr9ZjBWXVX44LXuvLGAjtZQvXCDR9__tamiInDaslOor6ojZl8TcN1CJNYh3ya6yFymc_THNLK16CF680o3ghvbRZ1eSa_bFblOmEttHkcLF_J_P0vdrE3cIkNsqC4FpVaTAUHvj45uDzp2kWz3uU1IZtYLNbP1mGsN6_spMAfObT4_zf2i_6jXsJSnKBX5TnQ?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
	 
    }

    else if($text == "ลดน้ำ2"){
        $image_url = "https://umqjbq.bn.files.1drv.com/y4mtaVjRQeslYl-6zBO6lWjLGB40C9G0uDBA9xrfpX44Hpxj5sgt2KXHDN5gjYf1OYZayNBHZvy7_CJlsmHvye1ofxKvhzOsnmCPKA_-E0lgLYX2z2SENaBhIqeF4d3GLdXDHxNcjShKzZz-EhTtpBBy_nIOHg0hfvzAPMZMHbt-LbRZ9ISRJro_ZGMLAbXsaQ6EGe5dqcGG7GEOaBR7HVXPw?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	      getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ3"){
        $image_url = "https://umptha.bn.files.1drv.com/y4mDEZjNYOFD2RR8kHF10P-B-Oc5xelWGbiskH-krPwYGI_OL2qy25FJrb5O7lE6IXLQQ6KSmJGzmRHWS6bCYs9WinhMaO3RJ6tH35nToHoW8MV9mmyH-Q1Oq3miI6U0ZWI7xDb_3-ol-M0QHQo5sA03FAOtFWI66Xtr49p23lL-oX9jZjHpp4p7gB6MF50YjX9HT4xO6QLwFbvg4Miat0RVw?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ4"){
        $image_url = "https://umqcvg.bn.files.1drv.com/y4mLLhxlinGjZUdU75RkbqMACvN22AL2HKJi2Mn3HMyxE3b0oh56iQ5qhDgGakOB38CKr1aBplH63d-48DknxJCGl78etjWJX8bNbzeTq7p9kbcKDTt4Q8Z6gXPAmasa-FTMGNuxXfqUKRowcAQEr-3eCw4TtUFzHtNy7VsqFx5TSpfDWHpzjIc0h33x6B4pPO4Yd_H3Y0v_x--5vYijgRG0w?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ5"){
        $image_url = "https://umodmw.bn.files.1drv.com/y4meeDXcgTAIEuhCY5sRPI5HZRtbuvtL1BSqFtiE4xwSiHiUA2Pnr_McS5jaIJ_91EpK4_PomeXgARugjoCkwe4L0knuA0AGcCQgLOmxrSCUsUJ9zCacIwJS6V9CL03VdNvCVEdhcKaBGm7edqXbmuTmkuDdBknzG22PNF_1ODaVAN5vD8Adh9aIqQT481dke8JRAUztopJYnFtbRKz3A-rrg?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ6"){
        $image_url = "https://umq4pw.bn.files.1drv.com/y4mKo9HhaTQ4DNOKmS2RWd_br7BR61WBqQxF4xUsRhdWnDWaiYPzeZxPiT4-CKDcavONceEdLJDhZV0FDevWaXxFuW0Kuf2mVWF6F-TV4Jey4JqdZ8quN97o1ukz4QadQw_B4uRI5RRyyD0aUjvzzgqSKEkfOROtblS_HAtxUYltqGj1eALDRlULvAdmxRr-QH-Y1UD7_hJq0xlUw7GcSwUjw?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }

////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ดูสถานะ"){
        $image_url = "https://vdp9jg.bn.files.1drv.com/y4mKerg48xUmjhD0xK7QLgfKWu5B5S6LfQv3-L7s7FJMvgZ_6WZ-KQBiP27oM3P4Pf2Pkcx6_cls9cEqZsxoF7E03Oou7VO9ASEVi7u9yH9QlgMp2DDispSmdpDyoPoCuMWzAGDHaxuv18YkYVTY2T47o1rYOR5_RgC_jEg78QZZawMtHYmMW8dcwONmdeV8uohrQAtcfFjfN22PlyS_WvZ5g?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	
        replyMsg($arrayHeader,$arrayPostData);
    }
////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ตั้งเวลาลดน้ำ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ตัวอย่างตั้งเวลาการ 09:09 ,18:09";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "01.00" || $text == "02.00" || $text == "03.00" || $text == "04.00" || $text == "05.00"  || $text == "06.00" || $text == "07.00" || $text == "08.00" || $text == "09.00"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "จัดให้ค่าาา ตั้งเวลาลดน้ำเรีบยร้อนแลัวค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	$nums=$substr($text,1);
	getMqttfromlineMsg($Topic,$substr($text,1));
	getMqttfromlineMsg($Topic,"2");
    }
////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ยกเลิกทั้งหมด"){
        $image_url = "https://vdp9jg.bn.files.1drv.com/y4mKerg48xUmjhD0xK7QLgfKWu5B5S6LfQv3-L7s7FJMvgZ_6WZ-KQBiP27oM3P4Pf2Pkcx6_cls9cEqZsxoF7E03Oou7VO9ASEVi7u9yH9QlgMp2DDispSmdpDyoPoCuMWzAGDHaxuv18YkYVTY2T47o1rYOR5_RgC_jEg78QZZawMtHYmMW8dcwONmdeV8uohrQAtcfFjfN22PlyS_WvZ5g?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	$arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ต้นข้าว ยกเลิกให้แลัวค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ยกเลิกลดน้ำ"){
        $image_url = "https://vdp9jg.bn.files.1drv.com/y4mKerg48xUmjhD0xK7QLgfKWu5B5S6LfQv3-L7s7FJMvgZ_6WZ-KQBiP27oM3P4Pf2Pkcx6_cls9cEqZsxoF7E03Oou7VO9ASEVi7u9yH9QlgMp2DDispSmdpDyoPoCuMWzAGDHaxuv18YkYVTY2T47o1rYOR5_RgC_jEg78QZZawMtHYmMW8dcwONmdeV8uohrQAtcfFjfN22PlyS_WvZ5g?width=656&height=296&cropmode=none";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	$arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ต้นข้าว ยกเลิกให้แลัวค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }

    else{
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ไม่เข้าใจคำสั้งค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }





function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;

?>
