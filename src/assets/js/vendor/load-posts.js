(function ($) {

    $(document).on('touchstart click', '.bs-ajax-post-featured-image a', function (event) {
      event.preventDefault();

      $.ajax({
        // URL to which request is sent.
        url: bs_ajaxobject.ajaxurl,

        // specifies how contents of data option are sent to the server.
        // `post` indicates that we are submitting the data.
        type: 'post',

        // data to be sent to the server.
        data: {
          // a function defined in functions.php hooked to this action (with `wp_ajax_nopriv_` and/or `wp_ajax_` prefixed) will run.
          action: 'bs_load_post',

          // stores the value of `data-id` attribute of the clicked link in a variable.
          post_id: $(this).attr('data-id')
        },

        // pre-reqeust callback function.
        beforeSend: function () {
          var postHeight = $('.bs-ajax-blog-loop-right .bs-ajax-swap-area > article').outerHeight();

          $('.bs-ajax-blog-loop-right').removeClass('loaded').addClass('loading').css({'min-height': postHeight});

          $('.bs-ajax-blog-loop-right .bs-ajax-swap-area').html('<img class="loading-animation" src="' + bs_ajaxobject.loadingimage + '" />');
        },

        // function to be called if the request succeeds.
        // `response` is data returned from the server.
        success: function (response) {
          var postHeight = $('.bs-ajax-blog-loop-right .bs-ajax-swap-area > article').outerHeight();

          $('.bs-ajax-blog-loop-right .bs-ajax-swap-area img.loading-animation').fadeOut('slow');

          $('.bs-ajax-blog-loop-right .bs-ajax-swap-area').addClass('ajax-loading').hide().html(response).fadeIn(800);

          $('.bs-ajax-blog-loop-right').removeClass('loading').addClass('loaded').css({'min-height': postHeight});
        }
      })
    })

})(jQuery);
