<script src="http://localhost/smart_payment_gateway/themes//template/assets/js/vendor/jquery.js?v=1.0"></script>
<form method="GET" id ="payment-form" action="<?php echo $paymentDevUrl;?>">
<!-- <form method="GET" id ="payment-form" action="<?php echo $paymentLiveUrl;?>"> -->
	<input type="hidden" name="PID" value="<?php echo $PID?>">
	<input type="hidden" name="MD" value="<?php echo $MD?>">
	<input type="hidden" name="AMT" value="<?php echo $AMT?>">
	<input type="hidden" name="CRN" value="<?php echo $CRN?>">
	<input type="hidden" name="DT" value="<?php echo $DT?>">
	<input type="hidden" name="R1" value="<?php echo $R1?>">
	<input type="hidden" name="R2" value="<?php echo $R2?>">
	<input type="hidden" name="DV" value="<?php echo $DV?>">
	<input type="hidden" name="RU" value="<?php echo $RU?>">
	<input type="hidden" name="PRN" value="<?php echo $PRN?>">
</form>

<!-- <script type="text/javascript">
	console.log(
		$('#payment-form').serialize()
		);
</script> -->

<?php if ($autosubmission == true): ?>
	<script>
		window.onload=function(){
		window.setTimeout(function() {
		document.getElementById("payment-form").submit(); });
		};
	</script>
<?php endif; ?>