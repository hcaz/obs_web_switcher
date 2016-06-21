<?php
        $data = json_decode(file_get_contents("settings.json"),true);
	$message = "    ".$data['message'] . " - There are currently ".gmdate('H \h\o\u\r\s i \m\i\n\u\t\e\s s \s\e\c\o\n\d\s', ($data['finish'] - time()))." left!";
	$data['length'] = strlen($message);
	if($data['length'] <= $data['current']){
		$data['current'] = 0;
	}else{
		$data['current'] = $data['current'] + 1;
	}
	if($data["rotate"] == true){
		$time = time() - $data["timeView"];
		$data["next"] = 120 - $time;
		if($time > 120){
			if($data["currentView"]=="zachary.claretscott"){
				$data["currentView"]="adam.linscott";
			}elseif($data["currentView"]=="adam.linscott"){
				$data["currentView"]="nick.jennett";
			}elseif($data["currentView"]=="nick.jennett"){
				$data["currentView"]="zachary.claretscott";
			}
			$data["timeView"] = time();
			file_put_contents("show.txt", $data['currentView']);
		}
	}
	file_put_contents("message.txt", substr($message, $data['current']));
	file_put_contents("settings.json", json_encode($data));
?>
