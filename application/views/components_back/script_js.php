<!-- Main Javascript -->
<script type="text/javascript">
	var site_url = '<?= base_url() ?>';
</script>
<?php
	foreach ($js as $j) {
		echo $j;
	}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

