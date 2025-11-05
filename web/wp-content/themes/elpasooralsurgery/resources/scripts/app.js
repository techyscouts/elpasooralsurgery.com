import '@fancyapps/fancybox';
import domReady from '@roots/sage/client/dom-ready';
import 'jquery';
import lity from 'lity';
import lozad from 'lozad';
import Swiper from 'swiper/bundle';

/**
 * Application entrypoint
 */
domReady(async () => {
  jQuery(document).ready(function ($) {
    const observer = lozad();
    observer.observe();
    // Sticky Header
    $(window).scroll(function () {
      if ($(window).scrollTop() >= 50) {
        $('.header').addClass('is-sticky');
        $('.announcement').addClass('up');
      } else {
        $('.header').removeClass('is-sticky');
        $('.announcement').removeClass('up');
      }
    });

    // Search box
    $('.btn-search').click(function () {
      $('.search-bar').toggleClass('active');
    });
    $('.btn-close-search').click(function () {
      $('.search-bar').removeClass('active');
    });

    /* clear text */
    $('.clear-text, .btn-close-search').on('click', function (e) {
      e.preventDefault();
      $('#search').val('');
      return false;
    });

    /*Mobile Menu*/
    $('.navbar-toggler').click(function () {
      $('.navbar').toggleClass('active');
      $('body').toggleClass('menu-open');
    });
    $('.close-menu').click(function () {
      $('.navbar').removeClass('active');
      $('body').removeClass('menu-open');
    });

    // announcement Slider
    if ($('.announcement').length) {
      var announcement_bar = new Swiper('.announcement-bar', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        // effect: "fade",
        speed: 2000,
        autoplay: {
          delay: 2500,
        },
      });
    }

    // banner Slider
    if ($('.banner-wrapper').length) {
      var banner_slide = new Swiper('.banner-slide', {
        loop: true,
        speed: 2000,
        slidesPerView: 1,
        spaceBetween: 0,
        autoplay: {
          delay: 4500,
        },
      });
    }
    if ($('.patients-review-slider').length) {
      $('.patients-review-slider .review-slider').each(function (
        index,
        element
      ) {
        var slideCount = $(element).find('.swiper-slide').length;
        var shouldLoop = slideCount > 4; // Change this number as needed
        var reviewslider = new Swiper(element, {
          slidesPerView: 1,
          spaceBetween: 0,
          loop: shouldLoop,
          speed: 500,
          navigation: {
            nextEl: $(element).find('.swiper-button-next')[0],
            prevEl: $(element).find('.swiper-button-prev')[0],
          },
          breakpoints: {
            320: {
              slidesPerView: 1,
            },
            499: {
              slidesPerView: 2,
            },
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 4,
            },
            1024: {
              slidesPerView: 5,
            },
          },
          on: {
            init: function () {
              updateSwiperClass(this);
            },
            slideChange: function () {
              updateSwiperClass(this);
            },
            slidesLengthChange: function () {
              updateSwiperClass(this);
            },
          },
        });

        // Function to check and manage class based on slide count
        function updateSwiperClass(swiperInstance) {
          console.log(swiperInstance);
          var maxSlides = 4; // Maximum number of slides to remove class
          var $swiperWrapper = $(swiperInstance.el).find('.swiper-wrapper');
          var slideCount = swiperInstance.slides.length;
          if (slideCount <= maxSlides) {
            $swiperWrapper.addClass('lg:justify-center');
          } else {
            $swiperWrapper.removeClass('lg:justify-center');
          }
        }
      });
    }

    if ($('.services-wrapper').length) {
      $('.tab-button').on('click', function () {
        var tabID = $(this).data('tab');

        // Remove active classes from all tabs and hide all contents
        $('.tab-button').removeClass('active');
        $('.tab-content').addClass('active-clip');

        // Add active classes to the clicked tab and show the corresponding content
        $(this).addClass('active');
        $('#' + tabID).removeClass('active-clip');
      });

      // Trigger the first tab to display on load
      $('.tab-button:first').click();
    }

    if ($('.accordion-wrapper').length) {
      $('.accordion-header').first().addClass('active');
      $('.accordion-content').first().slideDown();

      $('.accordion-header').click(function () {
        if (!$(this).hasClass('active')) {
          // Close any open accordions
          $('.accordion-header').removeClass('active');
          $('.accordion-content').slideUp();

          // Open the clicked accordion
          $(this).addClass('active');
          $(this).next('.accordion-content').slideDown();
        }
      });
    }

    if ($('.services-wrapper, .content-with-button').length) {
      // Open the modal
      $('.open-modal').on('click', function () {
        var targetModal = $(this).data('target');
        $('#' + targetModal).removeClass('hidden');
        $('#' + targetModal).addClass('z-999');
        $('#' + targetModal).removeClass('-z-999');
        $('body').addClass('overflow-hidden');
      });

      // Close the modal
      $('.close-modal').on('click', function () {
        $(this).closest('.modal').addClass('hidden');
        $(this).closest('.modal').removeClass('z-999');
        $(this).closest('.modal').addClass('-z-999');
        $('body').removeClass('overflow-hidden');
      });

      // Close the modal when clicking outside the content area
      $('.modal').on('click', function (event) {
        if (event.target === this) {
          $(this).addClass('hidden');
        }
      });
    }
    $(document).on('click', '[data-lightbox]', lity);
    $('[data-fancybox]').fancybox({
      buttons: ['slideShow', 'share', 'zoom', 'fullScreen', 'close'],
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
