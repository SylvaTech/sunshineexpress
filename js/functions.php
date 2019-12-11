<?php

    function verify_login(){
        if(!isset($_SESSION['user'])){
            redirect('../index.php');
        }
    }

	function xss_clean($str)
{
    if (is_array($str) or is_object($str)) {
        foreach ($str as $k => $s) {
            $str[$k] = xss_clean($s);
        }

        return $str;
    }

    // Remove all NULL bytes
    $str = str_replace("\0", '', $str);

    // Fix &entity\n;
    $str = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $str);
    $str = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $str);
    $str = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $str);
    $str = html_entity_decode($str, ENT_COMPAT);

    // Remove any attribute starting with "on" or xmlns
    $str = preg_replace('#(?:on[a-z]+|xmlns)\s*=\s*[\'"\x00-\x20]?[^\'>"]*[\'"\x00-\x20]?\s?#iu', '', $str);

    // Remove javascript: and vbscript: protocols
    $str = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $str);
    $str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $str);
    $str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $str);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#is', '$1>', $str);
    $str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#is', '$1>', $str);
    $str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#ius', '$1>', $str);

    // Remove namespaced elements (we do not need them)
    $str = preg_replace('#</*\w+:\w[^>]*+>#i', '', $str);

    // Remove any attempts to pass-in a script tag obfuscated by spaces
    $str = preg_replace('#<\s?/?\s*[Ss]\s*[cC]\s*[rR]\s*[iI]\s*[pP]\s*[tT]#', '', $str);

    // Removed ;base64 data usage
    $str = preg_replace('#data:*[^;]+;base64,#i', 'nodatabase64', $str);

    do {
        // Remove really unwanted tags
        $old = $str;
        $str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
    } while ($old !== $str);

    return $str;
}

function cleanInput($input){
	$output = xss_clean($input);
    /*
    $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
*/
    return $output;
}
	function sanitize($input){
		if (is_array($input)) {
	        foreach ($input as $var => $val) {
	            $output[$var] = sanitize($val);
	        }
	    } 
	    else {
	        if (get_magic_quotes_gpc()) {
	            $input = stripslashes($input);
	        }

	        $input = cleanInput($input);
	        $output = $input;
	    }
	    if (isset($output) && $output != '') {
	        return $output;
	    } else {
	        return false;
	    }

	}
function errorMessage($str) {
    return "<div class = 'alert alert-danger text-center'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5>$str</h5>
    </div>";
}

function successMessage($str) {
    return "<div class ='alert alert-success text-center'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5>$str</h5>
    </div>";
}

function redirect($url) {

    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide from old browser\n\n";

    echo "window.location = \"" . $url . "\";\n";

    echo "-->\n";
    echo "</script>\n";

    return true;
}

?>