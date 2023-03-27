$(".active-banner-slider").owlCarousel({
    items:1,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:true,
    navText:["<img src='Contact/img/banner/prev.png'>","<img src='Contact/img/banner/next.png'>"],
    dots:false
});

/*=================================
Javascript for product area carousel
==================================*/
$(".active-product-area").owlCarousel({
    items:1,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:true,
    navText:["<img src='Contact/img/product/prev.png'>","<img src='Contact/img/product/next.png'>"],
    dots:false
});

/*=================================
Javascript for single product area carousel
==================================*/
$(".s_Product_carousel").owlCarousel({
  items:1,
  autoplay:false,
  autoplayTimeout: 5000,
  loop:true,
  nav:false,
  dots:true
});

/*=================================
Javascript for exclusive area carousel
==================================*/
$(".active-exclusive-product-slider").owlCarousel({
    items:1,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:true,
    navText:["<img src='Contact/img/product/prev.png'>","<img src='Contact/img/product/next.png'>"],
    dots:false
});
