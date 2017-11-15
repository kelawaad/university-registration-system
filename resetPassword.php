<?php
	
	function getToken($URI) {
		$length = strlen($URI);
		$token = '';
		$i = 0;
		while($URI[$i] !== '=')
			$i++;
		for($i = $i + 1; $i < $length; $i++) {
			$token .= $URI[$i];
		}
		return $token;
	}

	$token = getToken($_SERVER['REQUEST_URI']);
	echo $token;
	$username = '';

	$str = file_get_contents('tokens.json');
	$json = json_decode($str);
	echo '<pre>' . print_r($json, true) . '</pre>';
	for($i = 0;$i < count($json); $i++) {
		foreach ($json[$i] as $key => $value) {
			if($token == $key) {
	 			echo $key.'   '.$value;
	 			$username = $value;
			}
		}
		echo '<br>';
	}
?>