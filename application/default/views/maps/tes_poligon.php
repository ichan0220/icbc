<html>
<head>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		function coba(newLat, newLng)
		{
			$.post("get_location", { lang: newLng, lat: newLat } );
		}
	</script>
	<?php echo $map['js']; ?>
</head>
<body>
	<div class="maps">
		<?php echo $map['html']; ?>
	</div>
</body>
</html>