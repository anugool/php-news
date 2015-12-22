<?
function func($detail)  
	{
		$detail=ereg_replace(chr(13), "<br>", $detail);
		$detail=ereg_replace(" ", "&nbsp;", $detail); 
		return $detail;
	}

function rewrite($url)  
	{
		$url=ereg_replace(" ", "-", $url); 
		return $url;
	}

function rewrite2($url2)  
	{
		$url2=ereg_replace("-", " ", $url2); 
		return $url2;
	}
?>