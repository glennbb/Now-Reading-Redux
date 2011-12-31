<?php
	global $book_query, $library_options, $shelf_title, $shelf_option;
	$options = get_option(NOW_READING_OPTIONS);
	$library_options = $options['sidebarOptions'];
?>

<style type="text/css">
	<?php echo $library_options['css'] ?>
</style>

<div class="now-reading nr_widget">

	<div style="text-align:center">
		<br /><b><a href="<?php library_url() ?>">View Full Library</a></b>
	</div>

	<?php
		// Reading.
		$shelf_option = $library_options['readingShelf'];
		$shelf_title = "<h4>" . $shelf_option['title'] . " (" . total_books('reading', 0) . ")</h4>";
		$book_query = "status=reading&orderby=random&num=" . $shelf_option['maxItems'];
		nr_load_template('shelf.php', false);

		// Unread.
		$shelf_option = $library_options['unreadShelf'];
		$shelf_title = "<h4>" . $shelf_option['title'] . " (" . total_books('unread', 0) . ")</h4>";
		$book_query = "status=unread&orderby=random&num=" . $shelf_option['maxItems'];
		nr_load_template('shelf.php', false);

		// On Hold.
		$shelf_option = $library_options['onholdShelf'];
		$shelf_title = "<h4>" . $shelf_option['title'] . " (" . total_books('onhold', 0) . ")</h4>";
		$book_query = "status=onhold&orderby=random&num=" . $shelf_option['maxItems'];
		nr_load_template('shelf.php', false);

		// Read.
		$shelf_option = $library_options['readShelf'];
		$shelf_title = "<h4>" . $shelf_option['title'] . " (" . total_books('read', 0) . ")</h4>";
		$book_query = "status=read&orderby=finished&order=desc&num=" . $shelf_option['maxItems'];
		nr_load_template('shelf.php', false);
	?>

	</div>
    
	<?php if (have_wishlist_url()) : ?>
		<div class="nr_wishlist"><b><a href="<?php wishlist_url() ?>">Buy me a gift!</a></b></div>
	<?php endif; ?>
	
	<div style="text-align:center"><?php library_search_form(); ?></div>
	
	<div style="display:none; text-align:center; font-size:120%; padding: 4px; text-shadow: 0 0 0.1em grey;" class="nr_ads">
		<a href="http://wordpress.org/extend/plugins/now-reading-redux/" target="_blank" style="text-decoration: none">
		<i>Now Reading</i>
		<div style="font-weight:bold; font-family: arial; position:relative; top:-7px; left:42px; font-size:140%; color:#999; text-shadow: 0 0 0.1em #FFFFCC;">Redux</div>
		</a>
	</div>

</div>
