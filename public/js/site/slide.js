$(document).ready(function(){
    
    jQuery('#camera_wrap_2').camera({
        //thumbnails: false,
        //height: '100px',
        //loader: 'pie',
        //pagination: true,
        //time: 7000,   //milliseconds between the end of the sliding effect and the start of the nex one
        //transPeriod: 800, //lenght of the sliding effect in milliseconds
        //hover: true,  //true, false. Puase on state hover. Not available for mobile devices

        //autoAdvance: false,   //true, false Auto Play
        //mobileAutoAdvance: false, //true, false. Auto-advancing for mobile devices

        //fx: 'random', //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight',
        //// 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft',
        ////'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse',
        ////'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'

        ////you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'

        alignment: 'center', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
        autoAdvance: false, //true, false Auto Play
        mobileAutoAdvance: true,
        barDirection: 'leftToRight', //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
        barPosition: 'bottom', //'left', 'right', 'top', 'bottom'
        cols: 6, //nr of cols
        rows: 4, //nr of rows
        slicedCols: 12,
        slicedRows: 8,
        easing: 'easeInOutExpo', //all easings
        mobileEasing: '',
        fx: 'random', //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'
        mobileFx: '',
        hover: true, //true, false. Puase on state hover. Not available for mobile devices
        navigation: true,
        navigationHover: true,
        mobileNavHover: true,
        pagination: true,
        thumbnails: false,
        playPause: false,
        pauseOnClick: false,
        loader: 'pie', //pie, bar, none
        loaderColor: '#eeeeee',
        loaderBgColor: '#222222',
        loaderOpacity: 0.8,
        loaderPadding: 2,
        pieDiameter: 38,
        piePosition: 'rightTop',
        portrait: false,
        slideOn: 'random', //next, prev, random
        time: 7000, //milliseconds between the end of the sliding effect and the start of the nex one
        transPeriod: 1200    //length of the sliding effect in milliseconds
    });

    //function letitsnow() {
    //    // https://github.com/daveWid/canvas-snow
    //    var canvas = document.getElementById("snowfall");
    //    canvas.width = window.innerWidth;
    //    canvas.height = window.innerHeight;
    //    // Now the emitter
    //    var emitter = Object.create(rectangleEmitter);
    //    emitter.setCanvas(canvas);
    //    emitter.setBlastZone(0, -10, canvas.width, 1);
    //    emitter.particle = snow;
    //    emitter.runAhead(0);
    //    emitter.start(60);
    //}

    //letitsnow();

    // Owl
    serpentsoft_owlStartCarousel('divCatScrollBox_1', 2, {
        //items: 2, //10 items above 1000px browser width
        //itemsDesktop: [647, 2], //5 items between 1000px and 901px
        //itemsDesktopSmall: [597, 2], // betweem 900px and 601px

        itemsCustom: [
            [0, 2],
            [992, 2],
            [765, 2],
            [480, 1],
            [150, 1],
        ],
        itemsTablet: false, //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        rewindNav: true,
        lazyLoad: true,
    });


    // Reviews Category
    serpentsoft_owlStartCarousel('divCatReviews_1', 2, {
        itemsCustom: [
            [0, 2],
            [992, 2],
            [765, 2],
            [480, 1],
            [150, 1],
        ],
        itemsTablet: false, //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        rewindNav: true,
        lazyLoad: true,
    });


    // Widget Slides ( divWidgetSlides_1 )
    serpentsoft_owlStartCarousel('divWidgetSlides_1', 1, {
        itemsCustom: [
            [0, 1],
            //[992, 1],
            //[750, 1],
            //[410, 1],
            [992, 1],
            [765, 1],
            [480, 1],
            [150, 1],
        ],
        itemsTablet: false, //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        rewindNav: true,
        lazyLoad: true,
    });
});