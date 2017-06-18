/**
 * Created by Séverine on 18/06/17.
 */

jQuery(document).ready(function ($) {

    /*add image with build option page*/
    var frame = wp.media({
        title: 'Sélectionner une image',
        button: {
            text: 'Utiliser ce média'
        },
        multiple: false
    });

    $('#form-boot-options #btn_img_01').click(function (e) {
        e.preventDefault();
        frame.open();
    });

    frame.on('select', function () {
        var objImg = frame.state().get('selection').first().toJSON();
        var mon_url = objImg.sizes.medium_large.url;
        $('#img#img_preview_01').attr('src', mon_url);
        $('input#boot_image_01').attr('value', mon_url);
        $('input#boot_image_url_01').attr('value', mon_url);
    });
});