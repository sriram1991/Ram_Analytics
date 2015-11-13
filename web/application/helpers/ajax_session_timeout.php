<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// AJAX Session Time out Manager
if ( ! function_exists('ajax_session_mamager')){
    function ajax_session_mamager(){
   		function redirect($url, $permanent=false, $statusCode=303) {
		    if($_SERVER['HTTP_X_REQUESTED_WITH'] === "XMLHttpRequest"){
		    	echo "<script>window.top.location.href='$url'</script>";
		    }else{
		        if(!headers_sent()) {
		            header('location: '.$url, $permanent, $statusCode);
		        } else {
		            echo "<script>location.href='$url'</script>";
		        }
		        exit(0);
		    }
		}
    }
}