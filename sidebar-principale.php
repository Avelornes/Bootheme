<div id="sidebar-primary" class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
        <!-- Free space for widgets -->
	<?php endif; ?>
</div>