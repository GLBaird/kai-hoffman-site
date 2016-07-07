$(document).ready(() => {
    $('.map-link ').click(e => {
        $('#map-area').empty().html($(e.currentTarget).attr('data-map'));
    });
});
