<?php
	
if ( defined( 'WSU_LOCAL_CONFIG') && WSU_LOCAL_CONFIG ) {
	
	$info_snippet = "129";
	$apply_snippet = "128";
	$visit_snippet = "266";
	$chat_snippet = "";
	
} else {
	
	$info_snippet = "703";
	$apply_snippet = "705";
	$visit_snippet = "704";
	$chat_snippet = "267-706";

} ?>

<footer class="main-footer">
	<dl id="actions" class="action-items">
		<dl id="info" class="action-item">
			<dt><button>info</button></dt>
			<dd><?php echo do_shortcode('[html_snippet id='.$info_snippet.']') ?>
				<?php //$slices = json_decode(file_get_contents('https://goto.wsu.edu/info/LookupHighSchool?term=el+camino+fundamental'),true);
					//print_r($slices); ?>
			</dd>
		</dl>
		<dl id="visit" class="action-item">
			<dt><button>visit</buton></dt>
			<dd><?php echo do_shortcode('[html_snippet id='.$visit_snippet.']') ?></dd>
		</dl>
		<dl id="apply" class="action-item">
			<dt><button>apply</buton></dt>
			<dd><?php echo do_shortcode('[html_snippet id='.$apply_snippet.']') ?></dd>
		</dl>
		<dl id="chat" class="action-item">
			<dt><button>chat</buton></dt>
			<dd></dd>
		</dl>
	</dl>
</footer>