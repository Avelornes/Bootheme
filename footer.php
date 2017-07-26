<footer>
    <?php if (is_active_sidebar('widgetized-footer')) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('widgetized-footer'); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>