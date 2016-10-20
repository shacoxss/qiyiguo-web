;

 $(function() {
    var $modal = $('#your-modal');

    $(".item-list-parent .item_t").on('click', function(e) {
      var $target = $(e.target);
      if (($target).hasClass('js-modal-open')) {
        $modal.modal();
      } else if (($target).hasClass('js-modal-close')) {
        $modal.modal('close');
      } else {
        $modal.modal('toggle');
      }
    });
  })

