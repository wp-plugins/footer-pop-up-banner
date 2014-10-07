jQuery(document).ready(function() {
    jQuery('#fpub-popup').hide();
    
    setTimeout('open_banner()', fpub_delay * 1000);

    jQuery('.close-overlay').click(function() {
        jQuery('#fpub-popup').hide('slow');
    });
}); 

function open_banner() {
    jQuery('#fpub-popup').show('slow');

    if (fpub_persist !== null && fpub_persist !== undefined) {
        if (fpub_persist > 0) {
            setTimeout('close_banner()', fpub_persist * 1000)
        }
    }
}