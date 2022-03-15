//menú sticky
 $(document).ready(function(){
     $('#site-navigation').addClass('navbar-dark');
	 //variable para las páginas en las que cambia el logo
     var logo = ".page-template-blog #site-navigation img, .page-template-default #site-navigation img, .archive #site-navigation img, .single #site-navigation img, .error404 #site-navigation img, .search #site-navigation img";
     $(logo).attr('src', 'https://zerty.cl/wp-content/themes/nuevo/assets/img/zerty_blanco.png');
     $('.home #site-navigation').removeClass('navbar-dark').addClass('navbar-light');
   $(window).scroll(function () {
    if($(this).scrollTop() > 300){
        if (!$('#site-navigation').hasClass('fixed-top')){
            $('#site-navigation').stop().removeClass('navbar-dark').addClass('fixed-top navbar-light bg-white').css({'top': '-50px', '-webkit-box-shadow': '0px 6px 10px 2px rgba(0,0,0,0.46)', 'background': 'white' , 'box-shadow': '0px 6px 10px 2px rgba(0,0,0,0.46)'}).animate({'top': '0px'}, 500);
            $(logo).attr('src', 'https://zerty.cl/wp-content/themes/nuevo/assets/img/zerty_normal.png');
        }
    }else{
		$('.navbar').removeClass('fixed-top navbar-light bg-white').addClass('navbar-dark').css({'-webkit-box-shadow': '', 'box-shadow': '', 'background-image': 'linear-gradient(160deg, #301cab 0%, #4448d3 52%, #5774fa 100%)'});
		$('.home #site-navigation').removeClass('navbar-dark').addClass('navbar-light').css({'background-image': ''});
		$(logo).attr('src', 'https://zerty.cl/wp-content/themes/nuevo/assets/img/zerty_blanco.png');
    }
});
/*Estilización de paginación blog*/	 
$("#pagination ul").addClass("pagination");
	$(".pagination li").addClass("page-item p-1 rounded-circle");
	$("#pagination li a").addClass("page-link rounded-circle px-3");
	$("#pagination .current").addClass("rounded-circle px-3").css({"background": "#4154f1", "color": "#fff", "border-color": "#4154f1"});
	$("#pagination .dots").addClass('rounded-circle px-3');
	$(".page-item span").addClass("page-link");
/*Estilización adicional barra de búsqueda del blog*/
	$("#wp-block-search__input-1").attr("placeholder", "Buscar...");
	$(".wp-block-search__button").text('').html('<i class="fas fa-search"></i>'); 
});


/*Plugin de carrusel inicio*/
jQuery(function( $ ) {
  class SlickCarousel {
    constructor() {
      this.initiateCarousel();
    }

    initiateCarousel() {
      $( '#testimonio' ).slick( {
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
		dots: true,
		 infinite: true,
      } );
    }
  }

  new SlickCarousel();

} );