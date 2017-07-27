<div id="sidebar-primary" class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	<?php else : ?>
        <!-- Free space for widgets -->
	<?php endif; ?>
</div>