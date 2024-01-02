jQuery(document).ready(function ($) {
    $.post(algo_site_loaders_ajax.ajaxurl, {
        action: 'save_loader_to_database',
    }).done(function (response) {
        console.log('AJAX SUCCESS');
    }).fail(function (error) {
        console.log('AJAX FAILED');
    });
});