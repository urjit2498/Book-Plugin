<div class="wrap">
    <h1>Custom Post Type Manager</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('book_plugin_cpt_settings');
            do_settings_sections('book_cpt');
            submit_button();
        ?>
    </form>
</div>