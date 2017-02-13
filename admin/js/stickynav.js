var nav      = $('#tuklas-nav');
var content  = $('#tuklas-content');
var navHomeY = nav.offset().top;
var isFixed  = false;
var $w       = $(window);

$w.scroll(function(){
  var scrollTop = $w.scrollTop();
  var shouldBeFixed = scrollTop > navHomeY;
  if ( shouldBeFixed && ! isFixed ){
    nav.css({
      position: 'fixed',
      width: '100%',
      top: 0,
      opacity: 0.9
    });

    content.css({
      
    });

    isFixed = true;
  }
  else if ( ! shouldBeFixed && isFixed ){
    nav.css({
      position: 'relative',
      width: '100%',
      opacity: 1
    });

    content.css({
      paddingTop: '0'
    });

    isFixed = false;
  }
});

