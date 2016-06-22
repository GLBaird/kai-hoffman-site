import $ from 'jquery';

const preloaderContent = `
<div style="">
    <div class="preloader-wrapper small active">
        <div class="spinner-layer spinner-green-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
        </div>
    </div>
</div>`;

$.fn.preloader = function() {

    //noinspection JSUnresolvedFunction
    this.each((index, elm) => {
        const $this = $(elm);
        let $content = $(preloaderContent);
        $this.prepend($content);
        $($this.attr('data-loading'))
            .on('load', () => $content.remove());
    });

};

//noinspection JSUnresolvedFunction
window.setTimeout(() => $(".preloader-js").preloader(), 100);



