<!-- Main Javascript -->
<script type="text/javascript">
	var site_url = '<?= base_url() ?>';
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>

<?php
	foreach ($js as $j) {
		echo $j;
	}
?>


