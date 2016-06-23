var LayersliderInit = function () {

    return {
        initLayerSlider: function () {
            $('#layerslider').layerSlider({
                skinsPath : '/../../themes/templates/assets/global/plugins/slider-layer-slider/skins/',
                skin : 'fullwidth',
                thumbnailNavigation : 'hover',
                hoverPrevNext : false,
                responsive : false,
                responsiveUnder : 1000,
                layersContainer : 1000
            });
        }
    };

}();