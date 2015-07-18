<footer class="main-footer">
	<dl id="actions" class="action-items">
		<dl id="info" class="action-item">
			<dt><button>info</button></dt>
			<dd><?php echo do_shortcode('[html_snippet id=129]') ?>
				<?php $slices = json_decode(file_get_contents('https://goto.wsu.edu/info/LookupHighSchool?term=el+camino+fundamental'),true);
					print_r($slices); ?>
			</dd>
		</dl>
		<dl id="visit" class="action-item">
			<dt><button>visit</buton></dt>
			<dd><?php echo do_shortcode('[html_snippet id=128]') ?></dd>
		</dl>
		<dl id="apply" class="action-item">
			<dt><button>apply</buton></dt>
			<dd><?php echo do_shortcode('[html_snippet id=266]') ?></dd>
		</dl>
		<dl id="chat" class="action-item">
			<dt><button>chat</buton></dt>
			<dd></dd>
		</dl>
	</dl>
</footer>