<?php
header('Content-Type: application/javascript');
require '../config.php';

$keepAliveRefreshTime = 60000;
if(!empty($conf->global->KEEPALIVE_REFRESH_TIME)){
	$keepAliveRefreshTime = abs(intval($conf->global->KEEPALIVE_REFRESH_TIME)) * 1000; // convert second to millisecond
}

?>

var preventLogoutRefreshTime = <?php print $keepAliveRefreshTime; ?>; // every 10 minutes in milliseconds
window.setInterval( function() {
	$.ajax({
		cache: false,
		type: "GET",
		url: "<?php print dol_buildpath('keepalive/script/prevent_log_out.php', 1); ?>"
	})
	.done(function(data){

	});
}, preventLogoutRefreshTime );
