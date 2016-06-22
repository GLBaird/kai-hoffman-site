// Site Components
require('../css/application.scss');
require('./modules/match-height.es6');
require('./modules/preloader.es6');

$(document).ready(function() {
    $(".button-collapse").sideNav();
    $('select').material_select();
});

