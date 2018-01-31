(function ($, Drupal, window, document) {

  Drupal.behaviors.challengeSlickConfig = {
    attach: function (context, settings) {

      $('.multiple-items').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
      });

    }
  };

}(jQuery, Drupal, this, this.document));