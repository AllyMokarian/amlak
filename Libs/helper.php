<?php
// function helper

//************php hooks*********
function add_js($js,$place ='head'){
	global $hooks;
	$b= function() use ($js){
	echo '<script src="'.$js.'"></script>'."\n";
	};
	$hooks->add_action($place,$b);
}

function add_css($css,$place ='wp_head'){
	global $hooks;
	$b= function() use ($css){
	echo '<link rel="stylesheet" href="'.$css.'">'."\n";
	};
	$hooks->add_action($place,$b);
}

function add_jquery($script =""){
	global $hooks;
	add_js(get_option('url').'include/asset/js/jquery.min.js');
	
	if($script !==""){
	$b = function() use ($script){
		echo '
		<script>
			$(document).ready(function(){
				'.$script.'
			});
		</script>';
		
	};
		
		$hooks->add_action("wp_head",$b);
	}	
	
}

function add_inline_jquery($script,$place ='wp_head'){
	global $hooks;
	$b = function() use ($script){
		echo '
		<script>
			$(document).ready(function(){
				'.$script.'
			});
		</script>';
	};
		$hooks->add_action($place,$b);
}

function add_inline_css($css,$place ='wp_head'){
	global $hooks;
	$b = function() use ($css){
		echo '
		<style>
				'.$css.'
		</style>';
	};
		$hooks->add_action($place,$b);
}



//******Redirect Page
function redirect_page($link,$echo = false) { 
$export ='<script type="text/javascript">window.location="'.$link.'";</script>'; 
if($echo == false){return $export;} else{echo $export;}
}




//**************تابع جیگذاری تابه در متغیر****/
 /* str_ureplace
 * 
 * str_replace like function with callbacks for replacement(s).*/

function str_ureplace($search, $replace, $subject, &$replace_count = null) {
    $replace_count = 0;
    
    // validate input
    $search = array_values((array) $search);
    $searchCount = count($search);
    if (!$searchCount) {
        return $subject;
    }
    foreach($search as &$v) {
        $v = (string) $v;
    }
    unset($v);
    $replaceSingle = is_callable($replace);    
    $replace = $replaceSingle ? array($replace) : array_values((array) $replace);
    foreach($replace as $index=>$callback) {
        if (!is_callable($callback)) {
            throw new Exception(sprintf('Unable to use %s (#%d) as a callback', gettype($callback), $index));
        }
    }
    
    // search and replace
    $subjectIsString = is_string($subject);
    $subject = (array) $subject;
    foreach($subject as &$haystack) {
        if (!is_string($haystack)) continue;
        foreach($search as $key => $needle) {
            if (!$len = strlen($needle))
                continue;            
            $replaceSingle && $key = 0;            
            $pos = 0;
            while(false !== $pos = strpos($haystack, $needle, $pos)) {
                $replaceWith = isset($replace[$key]) ? call_user_func($replace[$key], $needle, ++$replace_count) : '';
                $haystack = substr_replace($haystack, $replaceWith, $pos, $len);
            }
        }
    }
    unset($haystack);
    
    return $subjectIsString ? reset($subject) : $subject;
}




//*************************control page function*********/

function is_home(){
	if(strlen(strstr($_SERVER['PHP_SELF'],"index.php")) >0){
		
		if(!isset($_GET) || !is_array($_GET) || count($_GET)==0){return true;} else {return false;}
		//if($_SERVER['QUERY_STRING']== null){return true;} else {return false;}
		return true;
	}else{
		return false;
	}
}


function is_admin(){
	if(strlen(strstr($_SERVER['PHP_SELF'],"admin/")) >0){
		return true;
	}else{
		return false;
	}
		
}



/***********palceholder**********/
function placeholder($x,$y,$bg ='',$fg = '',$text =''){
	global $url;
	$link = $url.'include/placeholder.php?size='.$x.'x'.$y.'';

	//fg
	if($fg !==""){
		$link .='&fg='.$fg.'';
	}else{
		$link .='&fg='.get_option('fc-placeholder');
	}
	//bg
	if($bg !==""){
		$link .='&bg='.$bg.'';
	}else{
		$link .='&bg='.get_option('bg-placeholder');
	}
	//text
	if($text !==""){
		$link .='&text='.$text.'';
	}
	return $link;
}




//*************************Download File From Url*/
function downloadFile($url, $path) {
    $newfname = $path;
    @$file = fopen ($url, 'rb');
    if ($file) {
       $newf = fopen ($newfname, 'wb');
        if ($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
			
			 if ($file) {
					fclose($file);
				}
				if ($newf) {
					fclose($newf);
				}
			
			return true;
			
        } else {
			return false;
		}
    } else {
		return false;
		
	}
  
}




//****************************thumbail in php*/
function thumbail($filename,$width,$height = '',$crop = 'center',$watermark = '') {
	$export = '';
	
	//FileName
	$fname = explode('.',$filename);
	$sia = $fname[0].'-thumb-'.$width.'-q'.get_option('quality_thumb');
	
	//Hash Pic
	$hash = get_option('hash_thumb').time();
	
	/***************************************Crop*/
	$path= get_path().'\uploads\\'.$filename;
	$path = str_replace('\\','/',$path);
	list($wd, $ht, $type, $attr) = getimagesize($path);
	
	
	if ($height =="") { $height = $width; }
	//Center
	if ($crop =="center") {
		$centreX = round($wd / 2) - round($width / 2);
		$centreY = round($ht / 2) - round($height / 2);
	}

	//Top left
	if ($crop =="top-left") {
		$centreX = 0;
		$centreY = 0;
	}

	//Top Right
	if ($crop =="top-right") {
		$centreX = round($wd) - $width;
		$centreY = 0;
	}

	//bottom left
	if ($crop =="bottom-left") {
		$centreX = 0;
		$centreY = round($ht) - $height;
	}

	//bottom Right
	if ($crop =="bottom-right") {
		$centreX = round($wd) - $width;
		$centreY = round($ht) - $height;
	}
	
	
	//watermark
	/*
	is the alignment (one of BR, BL, TR, TL, C,
             R, L, T, B, *) where B=bottom, T=top, L=left,
             R=right, C=centre, *=tile)
	*/
	$script_watermark = '';
	if ($watermark !=="") {
		$script_watermark = '&amp;fltr[]=wmi|../../../uploads/'.get_option('watermark').'|'.$watermark;
	}
	
	$export .='include/class/phpthumb/phpThumb.php?src=../../../uploads/'.$filename.'&amp;w='.$width.'&amp;sx='.$centreX.'&amp;sy='.$centreY.'&amp;sw='.$width.'&amp;sh='.$height.'&amp;q='.get_option('quality_thumb').'&amp;sia='.$sia.$script_watermark.'&amp;hash='.$hash;
	return $export;
}
?>




