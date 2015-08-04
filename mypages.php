<?php 
/*
Plugin Name: My Pages
Plugin URI: http://example.com/
Description: Simple and flexible way to show all kind of pages and posts on the website.
Author: Kareem Ashraf
Author URI: http://dookan.net/
Version: 4.0.3
*/

add_action('admin_menu','mypages_admin_actions'); //"admin menu" hook to add a sub menu
function mypages_admin_actions(){
	add_options_page('MyPages','My Pages','manage_options',__FILE__,'mypages_admin'); //add submenu to the settings menu
}

function mypages_admin(){

	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div>
		<h4>Here you can see all pages and posts of your website.</h4>
		<table class="widefat">
			<thead>
				<tr>
					<th>#</th>
					<th>Page Title</th>
					<th>type</th>
					<th>Page ID</th>
				</tr>
			</thead>
			<tbody>
			<?php
				global $wpdb;
				$myallpages = $wpdb->get_results(" Select ID , post_title , post_type from $wpdb->posts where post_status = 'publish' and post_title <> ''  ");
				$i = 0;
				foreach ($myallpages as $key => $mypage) {
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $mypage->post_title; ?></td>
				<td><?php echo $mypage->post_type; ?></td>
				<td><?php echo $mypage->ID; ?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>
	<?php

}

?>