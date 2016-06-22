import $ from 'jquery';

$.fn.matchHeight = function() {

    //noinspection JSUnresolvedFunction
    this.each((index, elm) => {
        const $this = $(elm);
        const $matchElement = $($this.attr('data-match'));
        const minWidth = parseInt( $this.attr('data-min-width') != "" ? $this.attr('data-min-width') : 0 );
        const $window = $(window);

        function resizeElement() {
            if ($window.width() >= minWidth) {
                $this.height($matchElement.height());
            } else {
                $this.css('height', 'auto');
            }
        }

        $window.resize(resizeElement);
        resizeElement();
    });
};

$(document).ready(() => {
    //noinspection JSUnresolvedFunction
    $('.match-height-js').matchHeight();
});
