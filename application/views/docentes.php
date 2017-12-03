<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  

	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <?php echo $output; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>