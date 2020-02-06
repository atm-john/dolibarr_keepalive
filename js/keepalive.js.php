<?php
header('Content-Type: application/javascript');
require '../config.php';

?>

var preventLogoutRefreshTime = 600000; // every 10 minutes in milliseconds
window.setInterval( function() {
	$.ajax({
		cache: false,
		type: "GET",
		url: "<?php print dol_buildpath('keepalive/script/prevent_log_out.php', 1); ?>"
	})
	.done(function(data){

	});
}, preventLogoutRefreshTime );
