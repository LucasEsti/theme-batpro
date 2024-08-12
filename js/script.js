$(document).ready(function() {
//    // AOS
//    AOS.init({
//        once: true,
//    });

    // Grid view
    (function(){
        var icon = document.getElementsByClassName('icon');
        var products = document.getElementsByClassName('products');
        function hasClass(elem, className) {
          return elem.classList.contains(className);
        }
        for (var i = 0, len = icon.length; i < len; i++) {
            icon[i].addEventListener('click', function() {
                if (hasClass(this, 'active')) {
                    return;
                } else {
                    for (var j = 0, len = icon.length; j < len; j++) {
                      icon[j].classList.toggle('active');
                    }
                    products[0].classList.toggle('list');
                    products[0].classList.toggle('grid');
                }
            });
        }
    })();   
    const items = document.querySelectorAll('.products .product');
    for(item of items) {
        const hItem = item.clientHeight;
        const hItem2 = item.querySelector('.content-product').clientHeight;
        const insertdiv = item.querySelector('.content-product-imagin');
        insertdiv.style.height = hItem + hItem2 + "px"; 
    }
    const items4 = document.querySelectorAll('#nouveaux .liste-articles .product');
    for(item4 of items4) {
        const hItem4 = item4.clientHeight;
        const hItem3 = item4.querySelector('#nouveaux .liste-articles .product .content-product').clientHeight;
        const insertdiv2 = item4.querySelector('#nouveaux .liste-articles .product .content-product-imagin');
        insertdiv2.style.height = hItem4 + hItem3 + "px"; 
    }

    // Slider
    $('.liste-slider').slick({
        dots: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        infinite: true,
        autoplay: true,
    });
    $('.liste-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
//        $('.liste-slider .slick-slide').find('video').get(0).pause();
//        var video = $('.liste-slider .slick-active').find('video').get(0).play();
    });
    
   

    // SLider page
    $('.slider-page,.galerie-part2,.galerie-part1').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        autoplay: true,
    });

    // Produits
    $('.liste-articles').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        infinite: true,
        autoplay: false,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
            }
        ]
    });

    // Partenaires
    $('.liste-partenaires').slick({
        dots: false,
        slidesToShow: 8,
        slidesToScroll: 2,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 900,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2
            }
            }
        ]
    });

    // contactexpert
    $('.listexpert').slick({
        dots: true,
        slidesToShow: 1,
        speed: 1000,
        arrows: false,
        infinite: false,
        autoplay: true,
        fade: true,
        cssEase: 'linear'
    });
    $('.listing-contact-2').slick({
        dots: true,
        slidesToShow: 1,
        speed: 1000,
        arrows: false,
        infinite: true,
        autoplay: true,
        fade: true,
        cssEase: 'linear'
    });
    $('.dropdown-toggle').dropdown();
    $('.parent-cat').addClass('blockBox');
    
    var divse = document.getElementsByClassName('blockBox');
    //console.log(divse);
//    if (typeof divse === 'undefined') {
        var divsWidth = document.getElementsByClassName('blockBox')[0].offsetWidth;
//        console.log("segmenation");
//        for (i = 0; i < divse.length; i++) {
//            divse[i].style.height= divsWidth+'px';
//        }
//    }

    var listeDetail1 = $('.liste-detail1');
    // Detail produit
    listeDetail1.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: false,
        asNavFor: '.liste-detail2'
    });
    $('.liste-detail2').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.liste-detail1',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                arrows: false,
                slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
                arrows: false,
                slidesToShow: 3
            }
            }
        ]
    });

    $('.value_repetiteur').on('change', function() {
        window.cartDeclinaison = this.value;
        $('.cartButton').attr('data-declinaison', this.value);
        $('.cartButton').attr('data-metric', $(this).attr('metric-value'));
        $('.cartButton').attr('data-type_declinaison', $(this).attr('type_declinaison-value'));
        $('.reference-declinaison').text($('.value_repetiteur').find(":selected").attr('reference'));
        let slick = $('.value_repetiteur').find(":selected").attr('numeroSlick');
        let sheet = $('.value_repetiteur').find(":selected").attr('technical');
        $('.descr-decl:not(d-none)').addClass('d-none');
        $('.description-declinaison-' + this.value).removeClass('d-none');
        if (sheet != "") {
            $('.technical-sheet').each(function() {
                $(this).attr('href', sheet);;
            });
        }
        if (slick) {
            listeDetail1.slick('slickGoTo', slick);
        }
    });
    
    var attrDecl = $('option:selected').attr('defaultDecl');
    if (typeof attrDecl !== 'undefined' && attrDecl !== false) {
        listeDetail1.slick('slickGoTo', attrDecl);
    }
    
        
    // Tooltips
    $('.tip').each(function () {
        $(this).tooltip(
        {
            html: true,
            title: $('#' + $(this).data('tip')).html()
        });
    });

    // More
    $('#detail-produit .scroll-desc .read').on('click',function(){
        $("#detail-produit .scroll-desc .more").toggleClass("show");
        $(this).toggleClass("show");
    });

    // Mobile
    if (window.matchMedia("(max-width: 1023px)").matches) {
        $('#nav-icon1').click(function(){
            $(this).toggleClass('opens');
        });
        (function($){
        $(document).ready(function(){
            $('ul li .dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
                event.preventDefault(); 
                event.stopPropagation(); 
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
        }); 
        })(jQuery);
    }
});
$('.cat-item').addClass('cntsubitem ');
$('.children').addClass('boxsubitem');
if(document.querySelectorAll(".cat-item .children")){
    $(".cat-item .children").parent("li").addClass("parent-cat")
}
$('.parent-cat > a').attr('href', "javascript:void(0)");
if(document.getElementById("btnnav"))
{
    document.getElementById("btnnav").addEventListener("click", function(){
        this.classList.toggle("active");
        document.getElementById("navigation").classList.toggle("open");
    });

    document.getElementById("btnnavs").addEventListener("click", function(){
        this.classList.toggle("active");
        document.getElementById("navigation").classList.toggle("open");
    });

    window.addEventListener("click", function(e) {
        if (!e.target.matches('#btnnav, .btninter, .btninter span, .btinter .titlenav, #navigation')) {
            document.getElementById("btnnav").classList.remove("active"); 
            document.getElementById("navigation").classList.remove("open"); 
            for (const removeopen of document.querySelectorAll('#navigation .cntsubitem')) {
//                removeopen.querySelectorAll('.boxsubitem').style.height = null; 
                removeopen.classList.remove("open");
            } 
        }
    });

    document.getElementById("navigation").addEventListener('click',function(e){
        e.stopPropagation();
    });
}
$("#navigation li.parent-cat > a").on("click", function() {
    if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this)
        .siblings(".children")
        .slideUp(200);
    } else {
    $(this)
    $("#navigation li.parent-cat > a").removeClass("active");
    $(this).addClass("active");
    $(".children").slideUp(200);
    $(this)
        .siblings(".children")
        .slideDown(200);
    }
});

// Counter
if(document.querySelector('#statistics')){
    var options = {  
        useEasing: true,
          useGrouping: true,
          separator: ' ',
          decimal: '.',
          prefix: '',
          suffix: '',
    };
    
    var counts = [];
    
    $('.statvalue').each(function() {
        var num = $(this).attr('numx'); //end count
        var nuen = $(this).text();
        if (nuen === "") {
        nuen = 0;
        }
      
       counts.push(new CountUp(this, nuen, num, 0, 3, options));
    });
    
    var waypoint1 = new Waypoint({
      element: document.getElementById("statistics"),
      handler: function(direction) {
        if (direction == "up") {
          for (var i = 0; i < counts.length; i++) {
            // counts[i].reset();
          }
        } else {
          for (var i = 0; i < counts.length; i++) {
            counts[i].start();
          }
        }
      },
      offset: "50%"
    });
}

if(document.querySelectorAll('.cntAccordion')) {
    const listAccordions = document.querySelectorAll('.cntAccordion');
    for (const listAccordion of listAccordions) {
      const itemAccordions = listAccordion.querySelectorAll('.itemAccordion');
  
    //   listAccordion.querySelector('.itemAccordion:first-child').classList.add('active');
    //   (window.getComputedStyle(listAccordion.querySelector('.itemAccordion:first-child').querySelector('h3').nextElementSibling).height !== "0px") ? listAccordion.querySelector('.itemAccordion:first-child').querySelector('h3').nextElementSibling.style.height = 0 : listAccordion.querySelector('.itemAccordion:first-child').querySelector('h3').nextElementSibling.style.height = listAccordion.querySelector('.itemAccordion:first-child').querySelector('h3').nextElementSibling.scrollHeight + "px";
  
      for (const itemAccordion of itemAccordions) {
        const next = itemAccordion.querySelector('h3').nextElementSibling;
        itemAccordion.querySelector('h3').addEventListener('click', e=>{
          for (const nothis of itemAccordions) {
            if(itemAccordion!==nothis){
              nothis.classList.remove('active');
              nothis.querySelector('h3').nextElementSibling.style.height = 0
            }
          }
          itemAccordion.classList.toggle('active');
          (window.getComputedStyle(next).height !== "0px") ? next.style.height = 0 : next.style.height = next.scrollHeight + "px";
        });
      }
    }
  }

  // Mobile
  if (window.matchMedia("(max-width: 1024px)").matches) {
    $('#pub .listing-pub').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        autoplay: true,
    });
//    $('.owl-carousel').owlCarousel({
//        loop:false,
//        margin:0,
//        responsive:{
//            0:{
//                items:1
//            },
//            600:{
//                items:3
//            },
//            1000:{
//                items:3
//            }
//        }
//    });

//$('.carouselSky').owlCarousel({
//    loop: false,
//    margin: -1,
//    items: 1,
//    nav: true,
//    dots: false,
//    
//    navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
//    responsive:{
//            0:{
//                items:1
//            },
//            600:{
//                items:3
//            },
//            1000:{
//                items:3
//            }
//        }
//  });

    
    $('.listing-prestation-vao').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
//        infinite: true,
//        autoplay: true,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1
            }
            },{
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
                },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
            }
        ]
    });
  }

//   Sroll smooth
  $('header .navbar .menu-item a[href*="#"]:not([href="#"] )').click(function() {
	if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                    $('html,body').animate({
                            scrollTop: target.offset().top - 200
                    }, 2000);
                    return false;
            }
	}
});

$('a.linkfaq[href*="#"]:not([href="#)').click(function() {
	if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		if (target.length) {
			$('html,body').animate({
				scrollTop: target.offset().top - 200
			}, 2000);
			return false;
		}
	}
});

