// JavaScript Document

(function ($) {
	var form = document.querySelector('.registration-form-container form');

	form.addEventListener( 'submit', function(event) {
		event.preventDefault();
		console.log(window.location.search);
		if ( this.querySelector( '#password' ).value !== this.querySelector( '#password-confirm' ).value ) {
			var div = document.createElement('div');
			div.setAttribute( 'class', 'error-message');
			div.appendChild( document.createTextNode('Passwords don\'t match') );
			this.parentNode.insertBefore( div , this);
			return false;
		}
		
		if ($('.error-message')) {
			$('.error-message').remove();	
		}
	});
})(jQuery);