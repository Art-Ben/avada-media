(function ($) {
    // remove attrs
    $('a.qtranxs_short').removeAttr('title');
    $('.wpcf7-validation-errors').remove();

    $("form.calculator").submit(function(e){
        e.preventDefault();
        $.post('/wp-admin/admin-ajax.php?action=calculator_form_reciver', $(this).serialize(), function(resp){
           if(resp == 1){
               $('.popupCalculator .mainTitle .sectionSubTitle').text($("#textSentSuccess").text());
               dataLayer.push({'event': 'form-price'});
           }
           else{
               $('.popupCalculator .mainTitle  .sectionSubTitle').text($("#textSentFault").text());
           }
        });
        return false;
    });
})(jQuery);
document.addEventListener( 'wpcf7submit', function( event ) {
    if ( '117' == event.detail.contactFormId ) {
        dataLayer.push({'event': 'form-futer'})
    }
}, false );
document.addEventListener( 'wpcf7invalid', function( event ) {
    if(!$('[name="data_process[]"]').is(':checked')){
        $('[name="data_process[]"]').addClass('wpcf7-validates-as-required');
    }
}, false );
window.addEventListener('load', function(){
    let input = $('[name="data_process[]"]');
    let wrapper = $('.data_proccess');
    wrapper.prepend(input);
    wrapper.find('.wpcf7-form-control').remove();
});