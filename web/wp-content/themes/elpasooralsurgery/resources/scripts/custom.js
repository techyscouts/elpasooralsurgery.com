jQuery(document).ready(function ($) {
  if ($('.ctm-video-wrapper').length) {
    const video = document.getElementById('video');
    const playPauseButton = document.getElementById('playPauseButton');

    const playIcon =
      objectDataAjax.template_url + '/resources/images/video-play-icon.svg';
    const pauseIcon =
      objectDataAjax.template_url + '/resources/images/pause.svg';

    if (playPauseButton) {
      $(playPauseButton).on('click', function () {
        if (video.paused) {
          video.play();
          $(this).find('img').attr('src', pauseIcon);
          $(this).find('span').text('Pause');
        } else {
          video.pause();
          $(this).find('img').attr('src', playIcon);
          $(this).find('span').text('Play');
        }
      });
    }
  }
  function showNextImages(count) {
    $('.ctm-gallery-item:hidden').slice(0, count).show();
  }

  showNextImages(6);

  $('#gallery-load-btn').on('click', function () {
    showNextImages(6);

    if ($('.ctm-gallery-item:hidden').length === 0) {
      $(this).hide();
    }
  });
  if ($('.gallery-wrapper').length) {
    $('.gallerytabs .tab-link').click(function () {
      var year = $(this).data('year');

      $(this).toggleClass('active');

      var $itemsForTab = $('.year[data-year="' + year + '"]');
      $itemsForTab.toggleClass('active');

      itemsToShow = itemsPerPage;
      updateGalleryItems();

      var $galleryItems = $('.gallery a.active');
      if ($galleryItems.length > itemsPerPage) {
        $loadMoreButton.show();
      } else {
        $loadMoreButton.hide();
      }
    });

    var $galleryWrapper = $('.gallery-wrapper');
    var $loadMoreButton = $('#tab-gallery-load-btn');
    var itemsPerPage = 6; // Number of items to show on each click
    var itemsToShow = itemsPerPage;

    function updateGalleryItems() {
      var $galleryItems = $('.gallery a.active');
      var totalItems = $galleryItems.length;

      $galleryItems.hide();
      $galleryItems.slice(0, itemsToShow).fadeIn();

      if (totalItems <= itemsToShow) {
        $loadMoreButton.hide();
      } else {
        $loadMoreButton.show();
      }
    }

    $loadMoreButton.on('click', function () {
      var $galleryItems = $('.gallery a.active');
      var totalItems = $galleryItems.length;

      $galleryItems.slice(itemsToShow, itemsToShow + itemsPerPage).fadeIn();

      itemsToShow += itemsPerPage; // Update the number of items to show

      if (itemsToShow >= totalItems) {
        $loadMoreButton.hide();
      }
    });

    updateGalleryItems();
  }

  // date picker
  let dateField = document.getElementById('date');
  if (dateField) {
    dateField.addEventListener('focus', function () {
      // dateField.type = "date";
      dateField.setAttribute('type', 'date');
      console.log('Hello');
    });
  }
  // date picker
  let dateField2 = document.getElementById('date2');
  if (dateField2) {
    dateField2.addEventListener('focus', function () {
      // dateField.type = "date";
      dateField2.setAttribute('type', 'date');
      console.log('Hello');
    });
  }
});
jQuery(document).ready(function ($) {
  var page = 1;
  $('#load_post_btn').click(function (e) {
    e.preventDefault();
    page = $(this).data('page') || 1;
    loaddbythepost(page);
  });
  if (jQuery('.ctm-blog-listing').length > 0) {
    loaddbythepost(page);
  }
});
function loaddbythepost(page) {
  jQuery('#load_post_btn').hide();
  jQuery.ajax({
    type: 'POST',
    dataType: 'json',
    url: objectDataAjax.ajaxUrl,
    data: {
      action: 'get_the_latest_post_data',
      page: page,
    },
    success: function (data, textStatus, jqXHR) {
      if (data && data.blog_grid) {
        if (page === 1) {
          jQuery('#blog_data').html(data.blog_grid);
        } else {
          jQuery('#blog_data').append(data.blog_grid);
        }
        if (page < data.max_page) {
          jQuery('#load_post_btn')
            .data('page', page + 1)
            .show();
        } else {
          jQuery('#load_post_btn').hide();
        }
      } else {
        jQuery('#blog_data').html('<h3>No Data Found</h3>');
        jQuery('#load_post_btn').hide();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('AJAX Error:', errorThrown);
    },
  });
}
