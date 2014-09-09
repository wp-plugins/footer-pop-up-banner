jQuery(document).ready(function() {
    setTimeout('open_banner()', fpub_delay * 1000);

    jQuery('.close-overlay').click(function() {
        close_banner();
    });
}); 

function open_banner() {
    jQuery('#fpub-popup').removeClass('hide');

    if (fpub_persist !== null && fpub_persist !== undefined) {
        if (fpub_persist > 0) {
            setTimeout('close_banner()', fpub_persist * 1000)
        }
    }
}

function close_banner() {
    jQuery('#fpub-popup').addClass('hide');
}