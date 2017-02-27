$j = jQuery; // set jquery into no-conflict mode

$j(document).ready(function(){
    $closedCase  = 'url("http://unlimitedsidin.wpengine.com/wp-content/uploads/2016/06/unlimited-siding-raingutters-inc-accordion-icon-closed.png")';
    $openCase = 'url("http://unlimitedsidin.wpengine.com/wp-content/uploads/2016/06/unlimited-siding-raingutters-inc-accordion-icon-open.png")';


    $j('.accordion-container').accordion();

    $j('.accord-title').click(function(e) {
        $icon  = $j('.accord-icon').css('background-image');
        $image = ($icon == $closedCase) ? $openCase : $openCase;
        $j(this).next('.accord-panel').slideToggle();
        $j(this).prev('.accord-icon').toggleClass('closed open');
        //
    });
});


$j.fn.accordion = function() {
    this.parent()
        .css({
            'padding' : '20px'
        });

    this.find($j('h3')).addClass('accord-title');
    $j('.accord-title').before('<span class="accord-icon closed"></span>');
    this.find($j('div')).addClass('accord-panel');
};
