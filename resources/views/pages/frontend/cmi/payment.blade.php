<html>
<head>
<title>Generic Hash Request Handler</title>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="now">
</head>

<body onload="javascript:moveWindow()">

	<form name="pay_form" method="post" action="https://testpayment.cmi.co.ma/fim/est3Dgate">
		<?php
		
			$storeKey = "Rentacs0";

			$postParams = array();
			foreach ($cmi as $key => $value){
				array_push($postParams, $key);
				echo "<input type=\"hidden\" name=\"" .$key ."\" value=\"" .trim($value)."\" /><br />";
			}
			
			natcasesort($postParams);		
			
			$hashval = "";					
			foreach ($postParams as $param){				
				$paramValue = trim($cmi[$param]);
				$escapedParamValue = str_replace("|", "\\|", str_replace("\\", "\\\\", $paramValue));	
					
				$lowerParam = strtolower($param);
				if($lowerParam != "hash" && $lowerParam != "encoding" )	{
					$hashval = $hashval . $escapedParamValue . "|";
				}
			}
			
			
			$escapedStoreKey = str_replace("|", "\\|", str_replace("\\", "\\\\", $storeKey));	
			$hashval = $hashval . $escapedStoreKey;
			
			$calculatedHashValue = hash('sha512', $hashval);  
			$hash = base64_encode (pack('H*',$calculatedHashValue));
			
			echo "<input type=\"hidden\" name=\"HASH\" value=\"" .$hash."\" /><br />";			
		
		?>
	</form>
	
	  <script type="text/javascript" language="javascript">
        function moveWindow() {
           document.pay_form.submit();
        }
    </script>

</body>

</html>
