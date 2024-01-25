(function (window, document, $) {
    'use strict';

    // Apply Select2 to multi-select elements only
    $('#multiselect[multiple]').each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        dropdownParent: $this.parent(),
        placeholder: 'Select roles...' // Add your desired placeholder text here
      });
    });

  })(window, document, jQuery);
