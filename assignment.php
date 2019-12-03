<?php
$file = file_get_contents("demo1.txt");
echo "<pre>";
// print_r($file);
$mainarr = [];

$explde = explode("---",$file);


if(is_array($explde) && count($explde)){
	$data = $explde[1];
	$explodeforKeys = explode(":",$data);
	 // print_r($explodeforKeys);
	$exp = explode( "\n", $explodeforKeys[0] );	
	$firstKey = $exp[1];
	array_shift($explodeforKeys);
		$count = 0;
		foreach($explodeforKeys as $vals){
			$k = [];
			$exp = explode( "\n", $vals );	
			// echo"<br>";
			// print_r($exp[0]);
			if($count==0){
				$k[$firstKey]=$exp[0];
			}
			else{
				$k[$nextKey]=$exp[0];
			}
			if(isset($exp[1])){
				$nextKey = $exp[1];
			}
			else
			{
				$nextKey = '';
			}
			$count++;
				array_push($mainarr,$k);
				
		}
	$forshortcontent = explode( "\n", $explde[2] );
	// print_r($forshortcontent);
	$s['short-content'] = $forshortcontent[2];
					array_push($mainarr,$s);

}
$n['content'] = $file;
array_push($mainarr,$n);

print_r(json_encode($mainarr));
?>