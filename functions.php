<?php
	require get_template_directory() . '/inc/actions.php';
	require get_template_directory() . '/inc/enqueue.php';
	require get_template_directory() . '/inc/acf.php';

	function enable_svg_support($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'enable_svg_support');
	function fix_svg_preview($response, $attachment, $meta) {
		if ($response['mime'] === 'image/svg+xml') {
			$response['sizes'] = [
				'thumbnail' => [
					'url' => $response['url'],
					'width' => $response['width'],
					'height' => $response['height'],
				],
			];
		}
		return $response;
	}
	add_filter('wp_prepare_attachment_for_js', 'fix_svg_preview', 10, 3);