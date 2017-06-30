<?php
    // 指定允许其他域名访问  
    header('Access-Control-Allow-Origin:*');
    // 响应类型  
    header('Access-Control-Allow-Methods:POST');  
    // 响应头设置  
    if($_GET["action"]=="show"){
		$fp=date("Ymd",time()).".txt";
		$a=explode("<br>", $_POST["message"]);
        if(file_exists($fp)){
            $fp=fopen($fp, "r");
			for($i=1;$i<count($a);++$i){
				fgets($fp);
			}
			$str=fgets($fp);
            while(!feof($fp)) {
				echo $str."<br>";
				$str=fgets($fp);
            }
            fclose($fp);
        }
    }
    else if($_GET["action"]=="send"){
		$fp=date("Ymd",time()).".txt";
    	$text=$_POST["name"].": (".gmdate("l dS \of F Y h:i:s A",time()+3600*8).")\r\n".$_POST["message"]."\r\n";
    	$fp=fopen($fp, "a");
        $fp0=fopen("record.txt", "a");
    	fwrite($fp,$text);
        fwrite($fp0,$text);
    	fclose($fp);
        fclose($fp0);
    }
    else if($_GET["action"]=="search"){
        if(file_exists("record.txt")){
            $fp0=fopen("record.txt", "r");
            while(!feof($fp0)) {
                echo fgets($fp0)."<br>";
            }
            fclose($fp0);
       }
    }
?>