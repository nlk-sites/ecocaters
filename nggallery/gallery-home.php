<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="homeslider" id="<?php echo $gallery->anchor ?>">
	<!-- Thumbnails -->
	<?php
	$firston = true;
	foreach ( $images as $image ) : ?>
	
	<div class="hslide<?php if ( $firston ) echo ' on'; ?>">
		<img alt="<?php echo $image->description ?>" src="<?php echo $image->imageURL ?>" class="pagebg" />
        <div class="headline"><?php echo nl2br($image->description); ?></div>
        <a href="<?php echo $image->ngg_custom_fields["Button Link URL"]; ?>" class="cta"><?php echo $image->alttext; ?></a>
	</div>
	

 	<?php
	$firston = false;
	endforeach; ?>
</div>

<?php endif; ?>
