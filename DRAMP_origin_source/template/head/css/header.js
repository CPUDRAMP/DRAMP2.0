if(typeof SF === 'undefined'){
  SF={};
}
SF.Popover = function($popover) {
    var klass = $popover.attr('id').replace(/-tooltip/, '');
    var $parents = $popover.parents('header');
    var id = $popover.attr('id');
    var isOpen = false;

    function open(e) {
        e.preventDefault();
        e.stopPropagation();
        // close other popovers
        jQuery('.tooltip:not(.' + klass + '):visible', $parents).trigger('popover:close');
        jQuery('.tooltip.' + klass, $popover).show();
        
        $popover.click(function(e) {
            close(e);
        });
        
        $popover.keydown(function(e) {
            if ((e.which || e.keyCode) === 27) {
                e.preventDefault();
                close(e);
            }
        });
        isOpen = true;
    }

    function close(e) {
        if(!jQuery(e.target.parentNode).closest('div').hasClass('tooltip')){
          e.preventDefault();
          e.stopPropagation();
        }
        $popover.unbind("click");
        $popover.unbind("keydown");
        $parents.find('.tooltip:visible').hide();
        isOpen = false;
    }

    $popover.find('a').click(function(e) {
        if (isOpen) {
            close(e);
        } else {
            if(!jQuery(e.target).hasClass('not-available')){
              open(e);
            }
        }
    });
};

jQuery(function($) {
    // Setup the updater popover
    var $updater = jQuery('#updater-tooltip');
    if ($updater.length) {
        if ($updater.hasClass('fetch')) {
            jQuery.ajax({
                url: '/user/updates/find',
                global: false,
                success: function(data) {
                    if (data.length) {
                        $updater.hide()
                                .html(data)
                                .show();
                        SF.Popover($updater);
                    }
                }
            });
        } else {
            SF.Popover($updater);
        }
    }
    // Setup the account popover
    var $account_tip = $('#account-tooltip');
    if($account_tip.length) {
      SF.Popover($account_tip);
    }
});