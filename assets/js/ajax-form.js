(function ($) {
  'use strict';

  const form = $('.contact-form form');
  const successBox = $('#successBox');
  const errorBox = $('#errorBox');

  form.on('submit', function (e) {
    e.preventDefault();

    const formData = form.serialize();

    $.ajax({
      url: '/', // <-- Submit to Netlify root
      method: 'POST',
      data: formData,
      dataType: 'html',
      success: function () {
        successBox.fadeIn();
        errorBox.hide();
        form.trigger('reset');

        setTimeout(() => {
          successBox.fadeOut();
        }, 5000);
      },
      error: function () {
        errorBox.fadeIn();
        successBox.hide();

        setTimeout(() => {
          errorBox.fadeOut();
        }, 5000);
      }
    });
  });
})(jQuery);
