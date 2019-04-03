<?php

$scripts = [
    'header.php' => ['jquery-3.3.1.min.js', 'popper.js', 'bootstrap.min.js'],
    'index.php' => ['jquery.inview.min.js', 'swiper.min.js', 'index.js'],
    'doniraj.php' => ['doniraj.js'],
    'vijest.php' => ['swiper.min.js'],
    'clanak.php' => ['swiper.min.js'],
    'onama.php' => ['jquery-ui.min.js','onama.js'],
    'galerija.php' => ['lightgallery.min.js', 'lg-thumbnail.min.js', 'lg-fullscreen.min.js', 'lg-autoplay.min.js', 'lg-zoom.min.js']
];

foreach($scripts as $key => $value) {
	if($key != $pageName) continue;
    foreach($value as $href) {
?>

<script type="text/javascript"  src="<?php echo 'js/'.$href; ?>" ></script>

<?php
		}
	}
?>