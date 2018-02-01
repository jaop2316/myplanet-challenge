(function ($, Drupal, window, document) {

  Drupal.behaviors.challengeSlickConfig = {
    attach: function (context, settings) {

      $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        autoplay: true,
      });

    }
  };

}(jQuery, Drupal, this, this.document));