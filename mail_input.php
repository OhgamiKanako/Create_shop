<?php
var_dump($_POST);
$page_flag = 0;
if( !empty($_POST['btn_confirm']) ) {
	$page_flag = 1;
}
?>
<!-- https://gray-code.com/php/make-the-form-vol2/ -->