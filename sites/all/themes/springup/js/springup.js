$(document).ready(function () {
  jQuery('.pkg').click(function () {
    var id = $(this).attr('id');
    var num = new Array();
    num = id.split('-');
    if (jQuery(this).is(':checked')) {
      jQuery('.' + id).html('<i class="glyphicon glyphicon-ok"></i>');
      jQuery('#edit-package-' + num[1]).prop('checked', true);
      var p_amt = jQuery('#pkg-a').text();
      var str = '<span class="label-text">Total amount due:</span>';
      str += '<span class="amount-text">' + p_amt +'</span>';
      jQuery('#add-pkg-amt').html(str);
    } else {
      jQuery('.' + id).html('<i class="glyphicon glyphicon-remove"></i>');
      jQuery('#edit-package-' + num[1]).prop('checked', false);
      jQuery('#add-pkg-amt').html('');
    }
  });
  
  jQuery('.submit').click(function () {   
    var id = $(this).attr('id');
    if(id == 'free-1' || id == 'free-2') {
      jQuery('#edit-plan-2').prop('checked', true);
    }
    if(id == 'paid-1' || id == 'paid-2') {
      jQuery('#edit-plan-1').prop('checked', true);
    }    
    jQuery('#user-singup-form').submit();    
   }); 


  jQuery('.upButton').click(function(e){
        var $parent = $(this).closest('.swap');
        $parent.insertBefore($parent.prev());           
    });
   jQuery('.downButton').click(function(e){
        var $parent = $(this).closest('.swap');
        $parent.insertAfter($parent.next());           
    });   

}); // close out script
