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
	else if($_POST['stime'] != null && $_POST['etime'] != null && $_POST['scrnN'] == "setDuration"){
 		//send_LINE(substr($_POST['stime'],0,2));
	      	//send_LINE(substr($_POST['stime'],3,5));
		//send_LINE(substr($_POST['etime'],0,2));
		//send_LINE(substr($_POST['etime'],3,5));
		send_LINE(" ตั้งเวลาตั้งแต่ " .$_POST['stime']." ถึง " .$_POST['etime']." ให้เรียบร้อยแลัวค่ะ");
		
		//send_LINE("จัดให้ค่าาา ตั้งเวลาลดน้ำเรียบร้อยแลัวค่ะ");
		getMqttfromlineMsg($Topic,$_POST['stime']);
		getMqttfromlineMsg($Topic,$_POST['etime']);
		replyMsg($arrayHeader,$_POST['stime']);
		
		
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

   
else if($text == "01.00" || $text == "01.01" ||  $text == "01.02" ||  $text == "01.03" ||  $text == "01.04" ||  $text == "01.05" ||  $text == "01.06" ||  $text == "01.07" ||  $text == "01.08" || $text == "01.09" ||  $text == "01.10" || $text == "01.11" || $text == "01.12" || $text == "01.13" || $text == "01.14" || $text == "01.15" ||  $text == "01.16" || $text == "01.17" || $text == "01.18" || $text == "01.19" || $text == "01.20" || $text == "01.21" || $text == "01.22" || $text == "01.23" || $text == "01.24" || $text == "01.25" || $text == "01.26" || $text == "01.27" || $text == "01.28" || $text == "01.29" || $text == "01.30" || $text == "01.31" || $text == "01.32" || $text == "01.33" || $text == "01.34" || $text == "01.35" || $text == "01.36" || $text == "01.37" || $text == "01.38" || $text == "01.39" || $text == "01.40" || $text == "01.41" || $text == "01.42" || $text == "01.43" || $text == "01.44" || $text == "01.45" || $text == "01.46" || $text == "01.47" || $text == "01.48" || $text == "01.49" || $text == "01.50" || $text == "01.51" || $text == "01.52" || $text == "01.53" ||  $text == "01.54" || $text == "01.55" || $text == "01.56" || $text == "01.57" || $text == "01.58" || $text == "01.59" || $text == "02.00" || $text == "02.01" ||  $text == "02.02" ||  $text == "02.03" ||  $text == "02.04" ||  $text == "02.05" ||  $text == "02.06" ||  $text == "02.07" ||  $text == "02.08" || $text == "02.09" ||  $text == "02.10" || $text == "02.11" || $text == "02.12" || $text == "02.13" || $text == "02.14" || $text == "02.15" ||  $text == "02.16" || $text == "02.17" || $text == "02.18" || $text == "02.19" || $text == "02.20" || $text == "02.21" || $text == "02.22" || $text == "02.23" || $text == "02.24" || $text == "02.25" || $text == "02.26" || $text == "02.27" || $text == "02.28" || $text == "02.29" || $text == "02.30" || $text == "02.31" || $text == "02.32" || $text == "02.33" || $text == "02.34" || $text == "02.35" || $text == "02.36" || $text == "02.37" || $text == "02.38" || $text == "02.39" || $text == "02.40" || $text == "02.41" || $text == "02.42" || $text == "02.43" || $text == "02.44" || $text == "02.45" || $text == "02.46" || $text == "02.47" || $text == "02.48" || $text == "02.49" || $text == "02.50" || $text == "02.51" || $text == "02.52" || $text == "02.53" ||  $text == "02.54" || $text == "02.55" || $text == "02.56" || $text == "02.57" || $text == "02.58" || $text == "02.59" ||$text == "03.00" || $text == "03.01" ||  $text == "03.02" ||  $text == "03.03" ||  $text == "03.04" ||  $text == "03.05" ||  $text == "03.06" ||  $text == "03.07" ||  $text == "03.08" || $text == "03.09" ||  $text == "03.10" || $text == "03.11" || $text == "03.12" || $text == "03.13" || $text == "03.14" || $text == "03.15" ||  $text == "03.16" || $text == "03.17" || $text == "03.18" || $text == "03.19" || $text == "03.20" || $text == "03.21" || $text == "03.22" || $text == "03.23" || $text == "03.24" || $text == "03.25" || $text == "03.26" || $text == "03.27" || $text == "03.28" || $text == "03.29" || $text == "03.30" || $text == "03.31" || $text == "03.32" || $text == "03.33" || $text == "03.34" || $text == "03.35" || $text == "03.36" || $text == "03.37" || $text == "03.38" || $text == "03.39" || $text == "03.40" || $text == "03.41" || $text == "03.42" || $text == "03.43" || $text == "03.44" || $text == "03.45" || $text == "03.46" || $text == "03.47" || $text == "03.48" || $text == "03.49" || $text == "03.50" || $text == "03.51" || $text == "03.52" || $text == "03.53" ||  $text == "03.54" || $text == "03.55" || $text == "03.56" || $text == "03.57" || $text == "03.58" || $text == "03.59" ||$text == "04.00" || $text == "04.01" ||  $text == "04.02" ||  $text == "04.03" ||  $text == "04.04" ||  $text == "04.05" ||  $text == "04.06" ||  $text == "04.07" ||  $text == "04.08" || $text == "04.09" ||  $text == "04.10" || $text == "04.11" || $text == "04.12" || $text == "04.13" || $text == "04.14" || $text == "04.15" ||  $text == "04.16" || $text == "04.17" || $text == "04.18" || $text == "04.19" || $text == "04.20" || $text == "04.21" || $text == "04.22" || $text == "04.23" || $text == "04.24" || $text == "04.25" || $text == "04.26" || $text == "04.27" || $text == "04.28" || $text == "04.29" || $text == "04.30" || $text == "04.31" || $text == "04.32" || $text == "04.33" || $text == "04.34" || $text == "04.35" || $text == "04.36" || $text == "04.37" || $text == "04.38" || $text == "04.39" || $text == "04.40" || $text == "04.41" || $text == "04.42" || $text == "04.43" || $text == "04.44" || $text == "04.45" || $text == "04.46" || $text == "04.47" || $text == "04.48" || $text == "04.49" || $text == "04.50" || $text == "04.51" || $text == "04.52" || $text == "04.53" ||  $text == "04.54" || $text == "04.55" || $text == "04.56" || $text == "04.57" || $text == "04.58" || $text == "04.59" || $text == "05.00" || $text == "05.01" ||  $text == "05.02" ||  $text == "05.03" ||  $text == "05.04" ||  $text == "05.05" ||  $text == "05.06" ||  $text == "05.07" ||  $text == "05.08" || $text == "05.09" ||  $text == "05.10" || $text == "05.11" || $text == "05.12" || $text == "05.13" || $text == "05.14" || $text == "05.15" ||  $text == "05.16" || $text == "05.17" || $text == "05.18" || $text == "05.19" || $text == "05.20" || $text == "05.21" || $text == "05.22" || $text == "05.23" || $text == "05.24" || $text == "05.25" || $text == "05.26" || $text == "05.27" || $text == "05.28" || $text == "05.29" || $text == "05.30" || $text == "05.31" || $text == "05.32" || $text == "05.33" || $text == "05.34" || $text == "05.35" || $text == "05.36" || $text == "05.37" || $text == "05.38" || $text == "05.39" || $text == "05.40" || $text == "05.41" || $text == "05.42" || $text == "05.43" || $text == "05.44" || $text == "05.45" || $text == "05.46" || $text == "05.47" || $text == "05.48" || $text == "05.49" || $text == "05.50" || $text == "05.51" || $text == "05.52" || $text == "05.53" ||  $text == "05.54" || $text == "05.55" || $text == "05.56" || $text == "05.57" || $text == "05.58" || $text == "05.59" ||$text == "06.00" || $text == "06.01" ||  $text == "06.02" ||  $text == "06.03" ||  $text == "06.04" ||  $text == "06.05" ||  $text == "06.06" ||  $text == "06.07" ||  $text == "06.08" || $text == "06.09" ||  $text == "06.10" || $text == "06.11" || $text == "06.12" || $text == "06.13" || $text == "06.14" || $text == "06.15" ||  $text == "06.16" || $text == "06.17" || $text == "06.18" || $text == "06.19" || $text == "06.20" || $text == "06.21" || $text == "06.22" || $text == "06.23" || $text == "06.24" || $text == "06.25" || $text == "06.26" || $text == "06.27" || $text == "06.28" || $text == "06.29" || $text == "06.30" || $text == "06.31" || $text == "06.32" || $text == "06.33" || $text == "06.34" || $text == "06.35" || $text == "06.36" || $text == "06.37" || $text == "06.38" || $text == "06.39" || $text == "06.40" || $text == "06.41" || $text == "06.42" || $text == "06.43" || $text == "06.44" || $text == "06.45" || $text == "06.46" || $text == "06.47" || $text == "06.48" || $text == "06.49" || $text == "06.50" || $text == "06.51" || $text == "06.52" || $text == "06.53" ||  $text == "06.54" || $text == "06.55" || $text == "06.56" || $text == "06.57" || $text == "06.58" || $text == "06.59" || $text == "07.00" || $text == "07.01" ||  $text == "07.02" ||  $text == "07.03" ||  $text == "07.04" ||  $text == "07.05" ||  $text == "07.06" ||  $text == "07.07" ||  $text == "07.08" || $text == "07.09" ||  $text == "07.10" || $text == "07.11" || $text == "07.12" || $text == "07.13" || $text == "07.14" || $text == "07.15" ||  $text == "07.16" || $text == "07.17" || $text == "07.18" || $text == "07.19" || $text == "07.20" || $text == "07.21" || $text == "07.22" || $text == "07.23" || $text == "07.24" || $text == "07.25" || $text == "07.26" || $text == "07.27" || $text == "07.28" || $text == "07.29" || $text == "07.30" || $text == "07.31" || $text == "07.32" || $text == "07.33" || $text == "07.34" || $text == "07.35" || $text == "07.36" || $text == "07.37" || $text == "07.38" || $text == "07.39" || $text == "07.40" || $text == "07.41" || $text == "07.42" || $text == "07.43" || $text == "07.44" || $text == "07.45" || $text == "07.46" || $text == "07.47" || $text == "07.48" || $text == "07.49" || $text == "07.50" || $text == "07.51" || $text == "07.52" || $text == "07.53" ||  $text == "07.54" || $text == "07.55" || $text == "07.56" || $text == "07.57" || $text == "07.58" || $text == "07.59" || $text == "08.00" || $text == "08.01" ||  $text == "08.02" ||  $text == "08.03" ||  $text == "08.04" ||  $text == "08.05" ||  $text == "08.06" ||  $text == "08.07" ||  $text == "08.08" || $text == "08.09" ||  $text == "08.10" || $text == "08.11" || $text == "08.12" || $text == "08.13" || $text == "08.14" || $text == "08.15" ||  $text == "08.16" || $text == "08.17" || $text == "08.18" || $text == "08.19" || $text == "08.20" || $text == "08.21" || $text == "08.22" || $text == "08.23" || $text == "08.24" || $text == "08.25" || $text == "08.26" || $text == "08.27" || $text == "08.28" || $text == "08.29" || $text == "08.30" || $text == "08.31" || $text == "08.32" || $text == "08.33" || $text == "08.34" || $text == "08.35" || $text == "08.36" || $text == "08.37" || $text == "08.38" || $text == "08.39" || $text == "08.40" || $text == "08.41" || $text == "08.42" || $text == "08.43" || $text == "08.44" || $text == "08.45" || $text == "08.46" || $text == "08.47" || $text == "08.48" || $text == "08.49" || $text == "08.50" || $text == "08.51" || $text == "08.52" || $text == "08.53" ||  $text == "08.54" || $text == "08.55" || $text == "08.56" || $text == "08.57" || $text == "08.58" || $text == "08.59" || $text == "09.00" || $text == "09.01" ||  $text == "09.02" ||  $text == "09.03" ||  $text == "09.04" ||  $text == "09.05" ||  $text == "09.06" ||  $text == "09.07" ||  $text == "09.08" || $text == "09.09" ||  $text == "09.10" || $text == "09.11" || $text == "09.12" || $text == "09.13" || $text == "09.14" || $text == "09.15" ||  $text == "09.16" || $text == "09.17" || $text == "09.18" || $text == "09.19" || $text == "09.20" || $text == "09.21" || $text == "09.22" || $text == "09.23" || $text == "09.24" || $text == "09.25" || $text == "09.26" || $text == "09.27" || $text == "09.28" || $text == "09.29" || $text == "09.30" || $text == "09.31" || $text == "09.32" || $text == "09.33" || $text == "09.34" || $text == "09.35" || $text == "09.36" || $text == "09.37" || $text == "09.38" || $text == "09.39" || $text == "09.40" || $text == "09.41" || $text == "09.42" || $text == "09.43" || $text == "09.44" || $text == "09.45" || $text == "09.46" || $text == "09.47" || $text == "09.48" || $text == "09.49" || $text == "09.50" || $text == "09.51" || $text == "09.52" || $text == "09.53" ||  $text == "09.54" || $text == "09.55" || $text == "09.56" || $text == "09.57" || $text == "09.58" || $text == "09.59" || $text == "10.00" || $text == "10.01" ||  $text == "10.02" ||  $text == "10.03" ||  $text == "10.04" ||  $text == "10.05" ||  $text == "10.06" ||  $text == "10.07" ||  $text == "10.08" || $text == "10.09" ||  $text == "10.10" || $text == "10.11" || $text == "10.12" || $text == "10.13" || $text == "10.14" || $text == "10.15" ||  $text == "10.16" || $text == "10.17" || $text == "10.18" || $text == "10.19" || $text == "10.20" || $text == "10.21" || $text == "10.22" || $text == "10.23" || $text == "10.24" || $text == "10.25" || $text == "10.26" || $text == "10.27" || $text == "10.28" || $text == "10.29" || $text == "10.30" || $text == "10.31" || $text == "10.32" || $text == "10.33" || $text == "10.34" || $text == "10.35" || $text == "10.36" || $text == "10.37" || $text == "10.38" || $text == "10.39" || $text == "10.40" || $text == "10.41" || $text == "10.42" || $text == "10.43" || $text == "10.44" || $text == "10.45" || $text == "10.46" || $text == "10.47" || $text == "10.48" || $text == "10.49" || $text == "10.50" || $text == "10.51" || $text == "10.52" || $text == "10.53" ||  $text == "10.54" || $text == "10.55" || $text == "10.56" || $text == "10.57" || $text == "10.58" || $text == "10.59" || $text == "11.00" || $text == "11.01" ||  $text == "11.02" ||  $text == "11.03" ||  $text == "11.04" ||  $text == "11.05" ||  $text == "11.06" ||  $text == "11.07" ||  $text == "11.08" || $text == "11.09" ||  $text == "11.10" || $text == "11.11" || $text == "11.12" || $text == "11.13" || $text == "11.14" || $text == "11.15" ||  $text == "11.16" || $text == "11.17" || $text == "11.18" || $text == "11.19" || $text == "11.20" || $text == "11.21" || $text == "11.22" || $text == "11.23" || $text == "11.24" || $text == "11.25" || $text == "11.26" || $text == "11.27" || $text == "11.28" || $text == "11.29" || $text == "11.30" || $text == "11.31" || $text == "11.32" || $text == "11.33" || $text == "11.34" || $text == "11.35" || $text == "11.36" || $text == "11.37" || $text == "11.38" || $text == "11.39" || $text == "11.40" || $text == "11.41" || $text == "11.42" || $text == "11.43" || $text == "11.44" || $text == "11.45" || $text == "11.46" || $text == "11.47" || $text == "11.48" || $text == "11.49" || $text == "11.50" || $text == "11.51" || $text == "11.52" || $text == "11.53" ||  $text == "11.54" || $text == "11.55" || $text == "11.56" || $text == "11.57" || $text == "11.58" || $text == "11.59" || $text == "12.00" || $text == "12.01" ||  $text == "12.02" ||  $text == "12.03" ||  $text == "12.04" ||  $text == "12.05" ||  $text == "12.06" ||  $text == "12.07" ||  $text == "12.08" || $text == "12.09" ||  $text == "12.10" || $text == "12.11" || $text == "12.12" || $text == "12.13" || $text == "12.14" || $text == "12.15" ||  $text == "12.16" || $text == "12.17" || $text == "12.18" || $text == "12.19" || $text == "12.20" || $text == "12.21" || $text == "12.22" || $text == "12.23" || $text == "12.24" || $text == "12.25" || $text == "12.26" || $text == "12.27" || $text == "12.28" || $text == "12.29" || $text == "12.30" || $text == "12.31" || $text == "12.32" || $text == "12.33" || $text == "12.34" || $text == "12.35" || $text == "12.36" || $text == "12.37" || $text == "12.38" || $text == "12.39" || $text == "12.40" || $text == "12.41" || $text == "12.42" || $text == "12.43" || $text == "12.44" || $text == "12.45" || $text == "12.46" || $text == "12.47" || $text == "12.48" || $text == "12.49" || $text == "12.50" || $text == "12.51" || $text == "12.52" || $text == "12.53" ||  $text == "12.54" || $text == "12.55" || $text == "12.56" || $text == "12.57" || $text == "12.58" || $text == "12.59" || $text == "13.00" || $text == "13.01" ||  $text == "13.02" ||  $text == "13.03" ||  $text == "13.04" ||  $text == "13.05" ||  $text == "13.06" ||  $text == "13.07" ||  $text == "13.08" || $text == "13.09" ||  $text == "13.10" || $text == "13.11" || $text == "13.12" || $text == "13.13" || $text == "13.14" || $text == "13.15" ||  $text == "13.16" || $text == "13.17" || $text == "13.18" || $text == "13.19" || $text == "13.20" || $text == "13.21" || $text == "13.22" || $text == "13.23" || $text == "13.24" || $text == "13.25" || $text == "13.26" || $text == "13.27" || $text == "13.28" || $text == "13.29" || $text == "13.30" || $text == "13.31" || $text == "13.32" || $text == "13.33" || $text == "13.34" || $text == "13.35" || $text == "13.36" || $text == "13.37" || $text == "13.38" || $text == "13.39" || $text == "13.40" || $text == "13.41" || $text == "13.42" || $text == "13.43" || $text == "13.44" || $text == "13.45" || $text == "13.46" || $text == "13.47" || $text == "13.48" || $text == "13.49" || $text == "13.50" || $text == "13.51" || $text == "13.52" || $text == "13.53" ||  $text == "13.54" || $text == "13.55" || $text == "13.56" || $text == "13.57" || $text == "13.58" || $text == "13.59" || $text == "14.00" || $text == "14.01" ||  $text == "14.02" ||  $text == "14.03" ||  $text == "14.04" ||  $text == "14.05" ||  $text == "14.06" ||  $text == "14.07" ||  $text == "14.08" || $text == "14.09" ||  $text == "14.10" || $text == "14.11" || $text == "14.12" || $text == "14.13" || $text == "14.14" || $text == "14.15" ||  $text == "14.16" || $text == "14.17" || $text == "14.18" || $text == "14.19" || $text == "14.20" || $text == "14.21" || $text == "14.22" || $text == "14.23" || $text == "14.24" || $text == "14.25" || $text == "14.26" || $text == "14.27" || $text == "14.28" || $text == "14.29" || $text == "14.30" || $text == "14.31" || $text == "14.32" || $text == "14.33" || $text == "14.34" || $text == "14.35" || $text == "14.36" || $text == "14.37" || $text == "14.38" || $text == "14.39" || $text == "14.40" || $text == "14.41" || $text == "14.42" || $text == "14.43" || $text == "14.44" || $text == "14.45" || $text == "14.46" || $text == "14.47" || $text == "14.48" || $text == "14.49" || $text == "14.50" || $text == "14.51" || $text == "14.52" || $text == "14.53" ||  $text == "14.54" || $text == "14.55" || $text == "14.56" || $text == "14.57" || $text == "14.58" || $text == "14.59" || $text == "15.00" || $text == "15.01" ||  $text == "15.02" ||  $text == "15.03" ||  $text == "15.04" ||  $text == "15.05" ||  $text == "15.06" ||  $text == "15.07" ||  $text == "15.08" || $text == "15.09" ||  $text == "15.10" || $text == "15.11" || $text == "15.12" || $text == "15.13" || $text == "15.14" || $text == "15.15" ||  $text == "15.16" || $text == "15.17" || $text == "15.18" || $text == "15.19" || $text == "15.20" || $text == "15.21" || $text == "15.22" || $text == "15.23" || $text == "15.24" || $text == "15.25" || $text == "15.26" || $text == "15.27" || $text == "15.28" || $text == "15.29" || $text == "15.30" || $text == "15.31" || $text == "15.32" || $text == "15.33" || $text == "15.34" || $text == "15.35" || $text == "15.36" || $text == "15.37" || $text == "15.38" || $text == "15.39" || $text == "15.40" || $text == "15.41" || $text == "15.42" || $text == "15.43" || $text == "15.44" || $text == "15.45" || $text == "15.46" || $text == "15.47" || $text == "15.48" || $text == "15.49" || $text == "15.50" || $text == "15.51" || $text == "15.52" || $text == "15.53" ||  $text == "15.54" || $text == "15.55" || $text == "15.56" || $text == "15.57" || $text == "15.58" || $text == "15.59" || $text == "16.00" || $text == "16.01" ||  $text == "16.02" ||  $text == "16.03" ||  $text == "16.04" ||  $text == "16.05" ||  $text == "16.06" ||  $text == "16.07" ||  $text == "16.08" || $text == "16.09" ||  $text == "16.10" || $text == "16.11" || $text == "16.12" || $text == "16.13" || $text == "16.14" || $text == "16.15" ||  $text == "16.16" || $text == "16.17" || $text == "16.18" || $text == "16.19" || $text == "16.20" || $text == "16.21" || $text == "16.22" || $text == "16.23" || $text == "16.24" || $text == "16.25" || $text == "16.26" || $text == "16.27" || $text == "16.28" || $text == "16.29" || $text == "16.30" || $text == "16.31" || $text == "16.32" || $text == "16.33" || $text == "16.34" || $text == "16.35" || $text == "16.36" || $text == "16.37" || $text == "16.38" || $text == "16.39" || $text == "16.40" || $text == "16.41" || $text == "16.42" || $text == "16.43" || $text == "16.44" || $text == "16.45" || $text == "16.46" || $text == "16.47" || $text == "16.48" || $text == "16.49" || $text == "16.50" || $text == "16.51" || $text == "16.52" || $text == "16.53" ||  $text == "16.54" || $text == "16.55" || $text == "16.56" || $text == "16.57" || $text == "16.58" || $text == "16.59" || $text == "17.00" || $text == "17.01" ||  $text == "17.02" ||  $text == "17.03" ||  $text == "17.04" ||  $text == "17.05" ||  $text == "17.06" ||  $text == "17.07" ||  $text == "17.08" || $text == "17.09" ||  $text == "17.10" || $text == "17.11" || $text == "17.12" || $text == "17.13" || $text == "17.14" || $text == "17.15" ||  $text == "17.16" || $text == "17.17" || $text == "17.18" || $text == "17.19" || $text == "17.20" || $text == "17.21" || $text == "17.22" || $text == "17.23" || $text == "17.24" || $text == "17.25" || $text == "17.26" || $text == "17.27" || $text == "17.28" || $text == "17.29" || $text == "17.30" || $text == "17.31" || $text == "17.32" || $text == "17.33" || $text == "17.34" || $text == "17.35" || $text == "17.36" || $text == "17.37" || $text == "17.38" || $text == "17.39" || $text == "17.40" || $text == "17.41" || $text == "17.42" || $text == "17.43" || $text == "17.44" || $text == "17.45" || $text == "17.46" || $text == "17.47" || $text == "17.48" || $text == "17.49" || $text == "17.50" || $text == "17.51" || $text == "17.52" || $text == "17.53" ||  $text == "17.54" || $text == "17.55" || $text == "17.56" || $text == "17.57" || $text == "17.58" || $text == "17.59" || $text == "18.00" || $text == "18.01" ||  $text == "18.02" ||  $text == "18.03" ||  $text == "18.04" ||  $text == "18.05" ||  $text == "18.06" ||  $text == "18.07" ||  $text == "18.08" || $text == "18.09" ||  $text == "18.10" || $text == "18.11" || $text == "18.12" || $text == "18.13" || $text == "18.14" || $text == "18.15" ||  $text == "18.16" || $text == "18.17" || $text == "18.18" || $text == "18.19" || $text == "18.20" || $text == "18.21" || $text == "18.22" || $text == "18.23" || $text == "18.24" || $text == "18.25" || $text == "18.26" || $text == "18.27" || $text == "18.28" || $text == "18.29" || $text == "18.30" || $text == "18.31" || $text == "18.32" || $text == "18.33" || $text == "18.34" || $text == "18.35" || $text == "18.36" || $text == "18.37" || $text == "18.38" || $text == "18.39" || $text == "18.40" || $text == "18.41" || $text == "18.42" || $text == "18.43" || $text == "18.44" || $text == "18.45" || $text == "18.46" || $text == "18.47" || $text == "18.48" || $text == "18.49" || $text == "18.50" || $text == "18.51" || $text == "18.52" || $text == "18.53" ||  $text == "18.54" || $text == "18.55" || $text == "18.56" || $text == "18.57" || $text == "18.58" || $text == "18.59" || $text == "19.00" || $text == "19.01" ||  $text == "19.02" ||  $text == "19.03" ||  $text == "19.04" ||  $text == "19.05" ||  $text == "19.06" ||  $text == "19.07" ||  $text == "19.08" || $text == "19.09" ||  $text == "19.10" || $text == "19.11" || $text == "19.12" || $text == "19.13" || $text == "19.14" || $text == "19.15" ||  $text == "19.16" || $text == "19.17" || $text == "19.18" || $text == "19.19" || $text == "19.20" || $text == "19.21" || $text == "19.22" || $text == "19.23" || $text == "19.24" || $text == "19.25" || $text == "19.26" || $text == "19.27" || $text == "19.28" || $text == "19.29" || $text == "19.30" || $text == "19.31" || $text == "19.32" || $text == "19.33" || $text == "19.34" || $text == "19.35" || $text == "19.36" || $text == "19.37" || $text == "19.38" || $text == "19.39" || $text == "19.40" || $text == "19.41" || $text == "19.42" || $text == "19.43" || $text == "19.44" || $text == "19.45" || $text == "19.46" || $text == "19.47" || $text == "19.48" || $text == "19.49" || $text == "19.50" || $text == "19.51" || $text == "19.52" || $text == "19.53" ||  $text == "19.54" || $text == "19.55" || $text == "19.56" || $text == "19.57" || $text == "19.58" || $text == "19.59" || $text == "20.00" || $text == "20.01" ||  $text == "20.02" ||  $text == "20.03" ||  $text == "20.04" ||  $text == "20.05" ||  $text == "20.06" ||  $text == "20.07" ||  $text == "20.08" || $text == "20.09" ||  $text == "20.10" || $text == "20.11" || $text == "20.12" || $text == "20.13" || $text == "20.14" || $text == "20.15" ||  $text == "20.16" || $text == "20.17" || $text == "20.18" || $text == "20.19" || $text == "20.20" || $text == "20.21" || $text == "20.22" || $text == "20.23" || $text == "20.24" || $text == "20.25" || $text == "20.26" || $text == "20.27" || $text == "20.28" || $text == "20.29" || $text == "20.30" || $text == "20.31" || $text == "20.32" || $text == "20.33" || $text == "20.34" || $text == "20.35" || $text == "20.36" || $text == "20.37" || $text == "20.38" || $text == "20.39" || $text == "20.40" || $text == "20.41" || $text == "20.42" || $text == "20.43" || $text == "20.44" || $text == "20.45" || $text == "20.46" || $text == "20.47" || $text == "20.48" || $text == "20.49" || $text == "20.50" || $text == "20.51" || $text == "20.52" || $text == "20.53" ||  $text == "20.54" || $text == "20.55" || $text == "20.56" || $text == "20.57" || $text == "20.58" || $text == "20.59" || $text == "21.00" || $text == "21.01" ||  $text == "21.02" ||  $text == "21.03" ||  $text == "21.04" ||  $text == "21.05" ||  $text == "21.06" ||  $text == "21.07" ||  $text == "21.08" || $text == "21.09" ||  $text == "21.10" || $text == "21.11" || $text == "21.12" || $text == "21.13" || $text == "21.14" || $text == "21.15" ||  $text == "21.16" || $text == "21.17" || $text == "21.18" || $text == "21.19" || $text == "21.20" || $text == "21.21" || $text == "21.22" || $text == "21.23" || $text == "21.24" || $text == "21.25" || $text == "21.26" || $text == "21.27" || $text == "21.28" || $text == "21.29" || $text == "21.30" || $text == "21.31" || $text == "21.32" || $text == "21.33" || $text == "21.34" || $text == "21.35" || $text == "21.36" || $text == "21.37" || $text == "21.38" || $text == "21.39" || $text == "21.40" || $text == "21.41" || $text == "21.42" || $text == "21.43" || $text == "21.44" || $text == "21.45" || $text == "21.46" || $text == "21.47" || $text == "21.48" || $text == "21.49" || $text == "21.50" || $text == "21.51" || $text == "21.52" || $text == "21.53" ||  $text == "21.54" || $text == "21.55" || $text == "21.56" || $text == "21.57" || $text == "21.58" || $text == "21.59" ||  $text == "22.00" || $text == "22.01" ||  $text == "22.02" ||  $text == "22.03" ||  $text == "22.04" ||  $text == "22.05" ||  $text == "22.06" ||  $text == "22.07" ||  $text == "22.08" || $text == "22.09" ||  $text == "22.10" || $text == "22.11" || $text == "22.12" || $text == "22.13" || $text == "22.14" || $text == "22.15" ||  $text == "22.16" || $text == "22.17" || $text == "22.18" || $text == "22.19" || $text == "22.20" || $text == "22.21" || $text == "22.22" || $text == "22.23" || $text == "22.24" || $text == "22.25" || $text == "22.26" || $text == "22.27" || $text == "22.28" || $text == "22.29" || $text == "22.30" || $text == "22.31" || $text == "22.32" || $text == "22.33" || $text == "22.34" || $text == "22.35" || $text == "22.36" || $text == "22.37" || $text == "22.38" || $text == "22.39" || $text == "22.40" || $text == "22.41" || $text == "22.42" || $text == "22.43" || $text == "22.44" || $text == "22.45" || $text == "22.46" || $text == "22.47" || $text == "22.48" || $text == "22.49" || $text == "22.50" || $text == "22.51" || $text == "22.52" || $text == "22.53" ||  $text == "22.54" || $text == "22.55" || $text == "22.56" || $text == "22.57" || $text == "22.58" || $text == "22.59" ||  $text == "23.00" || $text == "23.01" ||  $text == "23.02" ||  $text == "23.03" ||  $text == "23.04" ||  $text == "23.05" ||  $text == "23.06" ||  $text == "23.07" ||  $text == "23.08" || $text == "23.09" ||  $text == "23.10" || $text == "23.11" || $text == "23.12" || $text == "23.13" || $text == "23.14" || $text == "23.15" ||  $text == "23.16" || $text == "23.17" || $text == "23.18" || $text == "23.19" || $text == "23.20" || $text == "23.21" || $text == "23.22" || $text == "23.23" || $text == "23.24" || $text == "23.25" || $text == "23.26" || $text == "23.27" || $text == "23.28" || $text == "23.29" || $text == "23.30" || $text == "23.31" || $text == "23.32" || $text == "23.33" || $text == "23.34" || $text == "23.35" || $text == "23.36" || $text == "23.37" || $text == "23.38" || $text == "23.39" || $text == "23.40" || $text == "23.41" || $text == "23.42" || $text == "23.43" || $text == "23.44" || $text == "23.45" || $text == "23.46" || $text == "23.47" || $text == "23.48" || $text == "23.49" || $text == "23.50" || $text == "23.51" || $text == "23.52" || $text == "23.53" ||  $text == "23.54" || $text == "23.55" || $text == "23.56" || $text == "23.57" || $text == "23.58" || $text == "23.59" || $text == "00.00" || $text == "00.01" ||  $text == "00.02" ||  $text == "00.03" ||  $text == "00.04" ||  $text == "00.05" ||  $text == "00.06" ||  $text == "00.07" ||  $text == "00.08" || $text == "00.09" ||  $text == "00.10" || $text == "00.11" || $text == "00.12" || $text == "00.13" || $text == "00.14" || $text == "00.15" ||  $text == "00.16" || $text == "00.17" || $text == "00.18" || $text == "00.19" || $text == "00.20" || $text == "00.21" || $text == "00.22" || $text == "00.23" || $text == "00.24" || $text == "00.25" || $text == "00.26" || $text == "00.27" || $text == "00.28" || $text == "00.29" || $text == "00.30" || $text == "00.31" || $text == "00.32" || $text == "00.33" || $text == "00.34" || $text == "00.35" || $text == "00.36" || $text == "00.37" || $text == "00.38" || $text == "00.39" || $text == "00.40" || $text == "00.41" || $text == "00.42" || $text == "00.43" || $text == "00.44" || $text == "00.45" || $text == "00.46" || $text == "00.47" || $text == "00.48" || $text == "00.49" || $text == "00.50" || $text == "00.51" || $text == "00.52" || $text == "00.53" ||  $text == "00.54" || $text == "00.55" || $text == "00.56" || $text == "00.57" || $text == "00.58" || $text == "00.59" ){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "จัดให้ค่าาา ตั้งเวลาลดน้ำเรียบร้อยแลัวค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	//$nums=$substr($text,1);
	//getMqttfromlineMsg($Topic,$substr($text,1));
	getMqttfromlineMsg($Topic,substr($text,0,2));
	getMqttfromlineMsg($Topic,substr($text,3,5));
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

