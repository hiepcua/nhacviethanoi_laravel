/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
// var prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//    var currentScrollPos = window.pageYOffset;
//    if (prevScrollpos > currentScrollPos) {
//     document.getElementById("body").classList.add("layout-navbar-fixed");
// } else {
//    document.getElementById("body").classList.remove("layout-navbar-fixed");
// }
// prevScrollpos = currentScrollPos;
// }
function gotopage(page)
{
	document.getElementById("txtCurnpage").value=page;
	document.frmpaging.submit();
}
;(function(){
	var win = $(window),
	html = $('html'),
	body = $('body'),
	btnMenu = $('.btn--menu'),
	mainMenu = $('#siteNavigation'),
	w_mainheader = $('#main-header').width(),
	w_mainheader_container = $('#main-header-container').width(),
	ul_mainMenu = $('#ul_mainmenu').width(),
	_base_url = 'http://localhost/nhacviethanoi/';

	$('#trigger-mobile').click(function(){
		$(".mobile-main-menu").toggleClass('active');
		$(".backdrop__body-backdrop___1rvky").addClass('active');
	});

	$('.backdrop__body-backdrop___1rvky, .evo-close-menu, .cart_btn-close, .search_close').click(function(){
		$("body").removeClass('show-search');
		$(".mobile-main-menu, .cart_sidebar, .evo_sidebar_search, .left-content").removeClass('active');
		$(".backdrop__body-backdrop___1rvky").removeClass('active');
	});

	$('.ng-has-child1 a .svg1').on('click', function(e){
		e.preventDefault();var $this = $(this);
		$this.parents('.ng-has-child1').find('.ul-has-child1').stop().slideToggle();
		$(this).toggleClass('active');
		return false;
	});
	$('.ng-has-child1 .ul-has-child1 .ng-has-child2 a .svg2').on('click', function(e){
		e.preventDefault();var $this = $(this);
		$this.parents('.ng-has-child1 .ul-has-child1 .ng-has-child2').find('.ul-has-child2').stop().slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$('.btn-mobile-site-search').on('click', function () {
		$('#ip-search-home').focus();
	});

	$('.post-thumb-120, .wrap-thumb-220, .big-post-thumb, .wrap-thumb, .i-wrap-thumb, .wrap-thumb, #banner-slider .carousel-item').each(function(){
		var url = $(this).attr('data-src');
		if(url !== undefined && url.length > 0){
			$(this).css('background-image', 'url('+url+')');
			$(this).find('img').css('display', 'none');
		}
	});

	$('#tab-history li, #tab-cctc li, #tab-bgd li').on('click', function(){
		$('#tab-history li, #tab-cctc li, #tab-bgd li').removeClass('active');
		$(this).addClass('active');
	});

	$('#icon-search').on('click', function(){
		// $('#frm-search-home').css('display', 'block');
	});

	$('.footer-item .item-head').on('click', function(){
		$(this).parent().toggleClass(' show');
	});

	$('.toggle_submenu').on('click', function(){
		$(this).parent().toggleClass(' open');
	});

	window.addEventListener("resize", function(){
		var w_mainheader = $('#main-header').width(),
		w_mainheader_container = $('#main-header-container').width(),
		ul_mainMenu = $('#ul_mainmenu').width();

		var m_l = w_mainheader - (ul_mainMenu + (w_mainheader - w_mainheader_container)/2);
		$('.dropdown-content').css('margin-left', m_l);
	});
})(document, window, jQuery);

$(document).ready(function(){
	$('.header-cart').on('click', function(){
		$('.backdrop__body-backdrop___1rvky, #cart-sidebars').addClass('active');
	});
	$('.backdrop__body-backdrop___1rvky, .cart_btn-close').on('click', function(){
		$('.backdrop__body-backdrop___1rvky, #cart-sidebars').removeClass('active');
	});

	$('.awe-section-3 .products-view-grid, .evo-owl-product2').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: false,
		speed: 1000,
		slidesToShow: 5,
		slidesToScroll: 5,
		arrows: true,
		prevArrow: '<a class="carousel-control-prev" href="javascript:void(0)"></a>',
		nextArrow: '<a class="carousel-control-next" href="javascript:void(0)"></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 5,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}
		]
	});

	$('.evo-owl-product3').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: false,
		speed: 1000,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: '<a class="carousel-control-prev" href="javascript:void(0)"></a>',
		nextArrow: '<a class="carousel-control-next" href="javascript:void(0)"></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 5,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}
		]
	});

	$(".not-dqtab").each( function(e){
		var $this1 = $(this);
		var datasection = $this1.closest('.not-dqtab').attr('data-section');
		$this1.find('.tabs-title li:first-child').addClass('current');
		var view = $this1.closest('.not-dqtab').attr('data-view');
		$this1.find('.tab-content').first().addClass('current');

		var _this = $(this).find('.content .button_show_tab');
		var droptab = $(this).find('.tab-desktop');

		$(_this).click(function(){ 
			if ($(droptab).hasClass('evo-open')) {
				$(droptab).addClass('evo-close').removeClass('evo-open');
			}else {
				$(droptab).addClass('evo-open').removeClass('evo-close');
			}
			$(this).toggleClass('active');
		});
		$this1.find('.tabs-title.ajax li').click(function(){
			$(droptab).addClass('evo-close').removeClass('evo-open');
			$('.content .button_show_tab').removeClass('active');
			var $this2 = $(this),
			tab_id = $this2.attr('data-tab'),
			url = $this2.attr('data-url');
			var etabs = $this2.closest('.e-tabs');
			etabs.find('.tab-viewall').attr('href',url);
			etabs.find('.tabs-title li').removeClass('current');
			etabs.find('.tab-content').removeClass('current');
			$this2.addClass('current');
			etabs.find("."+tab_id).addClass('current');
			if(!$this2.hasClass('has-content')){
				$this2.addClass('has-content');		
				getContentTab(url,"."+ datasection+" ."+tab_id,view);
			}
		});
	});

	$('.not-dqtab .next').click(function(e){
		var count = 0
		$(this).parents('.content').find('.tab-content').each(function(e){
			count +=1;
		})
		var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
		res = str.replace("tab-", ""),
		datasection = $(this).closest('.not-dqtab').attr('data-section');
		res = Number(res);
		if(res < count){
			var current = res + 1;
		}else{
			var current = 1;
		}
		action(current,datasection);
	});

	$('.not-dqtab .prev').click(function(e){
		var count = 0
		$(this).parents('.content').find('.tab-content').each(function(e){
			count +=1;
		})
		var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
		res = str.replace("tab-", ""),
		datasection = $(this).closest('.not-dqtab').attr('data-section'),
		res = Number(res);	
		if(res > 1){
			var current = res - 1;
		}else{
			var current = count;
		}
		action(current,datasection);
	});

	setTimeout(function(){
		var w_mainheader = $('#main-header').width(),
		w_mainheader_container = $('#main-header-container').width(),
		ul_mainMenu = $('#ul_mainmenu').width();

		if(w_mainheader_container >= 768){
			var m_l = w_mainheader - (ul_mainMenu + (w_mainheader - w_mainheader_container)/2);
			$('.dropdown-content').css('margin-left', m_l);
		}
	}, 300);

	$('.evo-btn-filter').click(function(){
		$(".left-content").toggleClass('active');
		$(".backdrop__body-backdrop___1rvky").addClass('active');
	});

	$('.aside-filter .aside-hidden-mobile .aside-item .aside-title').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		$this.parents('.aside-filter .aside-hidden-mobile .aside-item').find('.aside-content').stop().slideToggle();
		$(this).toggleClass('active')
		return false;
	});

	$('.sort-cate-left h3').on('click', function(e){
		e.preventDefault();var $this = $(this);
		$this.parents('.sort-cate-left').find('ul').stop().slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$('.collection-category .Collapsible__Plus').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		$(this).parent().find('.dropdown-menu').stop().slideToggle();
		$(this).parent().toggleClass('active');
		return false;
	});
});

jQuery(document).ready(function(){
	if ($('.addThis_listSharing').length > 0){
		$(window).scroll(function(){
			if(jQuery(window).scrollTop() > 100 ) {
				jQuery('.addThis_listSharing').addClass('is-show');
			} else {
				jQuery('.addThis_listSharing').removeClass('is-show');
			}
		});
	};

	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 400) {
				$('#back-top').addClass('fade-in');
			} else {
				$('#back-top').removeClass('fade-in');
			}
		});
		$('#back-top a').click(function () {
			var el = document.querySelector("#body");
			el.scrollIntoView({ behavior: 'smooth', block: 'start'});
		});
	});
});

function sortby(sort){
	var _sortby = document.getElementById('sortby');
	var _frm_search = document.getElementById('frm_search');
	switch(sort) {
		case "price-asc":
		_sortby.value = "price_min:asc";					   
		break;
		case "price-desc":
		_sortby.value = "price_min:desc";
		break;
		case "alpha-asc":
		_sortby.value = "name:asc";
		break;
		case "alpha-desc":
		_sortby.value = "name:desc";
		break;
		case "created-desc":
		_sortby.value = "created_on:desc";
		break;
		case "created-asc":
		_sortby.value = "created_on:asc";
		break;
		default:
		_sortby.value = "";
		break;
	}
	_frm_search.submit();
};