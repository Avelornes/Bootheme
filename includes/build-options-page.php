<?php

function boot_build_options_page() {
    $theme_opts = get_option('boot_opts');
    ?>


<div class="wrap">
    <div class="container">
        <?php

        if(isset($_GET['status']) && $_GET['status'] == 1){
            echo '<div class="alert alert-success">Mise à jour effectuée avec succès !</div>';
        }
        ?>
        <div class="jumbotron">
            <h1>Paramètres du site</h1>
        </div>
        <form id="form-boot-options" class="form-horizontal" action="admin-post.php" method="post">
            <input type="hidden" name="action" value="boot_save_options">
			<?php
            wp_nonce_field('boot_options_verify');
            ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="boot_legend_01" class="col-sm-2 control-label">Légende</label>
                    <div class="col-sm-10">
                        <input type="text" id="boot_legend_01" name="boot_legend_01" value="<?php echo $theme_opts['legend_01']; ?>" style="width:100%;">
                    </div>
                </div>
            </div>
            <div>
                <button id="validation" type="submit" class="btn btn-success btn-lg">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

<?php } ?>