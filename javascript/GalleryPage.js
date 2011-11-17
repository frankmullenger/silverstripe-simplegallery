jQuery(document).ready(function($) {
	if ($('#gallery').length > -1) {
		var baseUrl = $('base').attr('href');
		$('#gallery a').lightBox({
			imageLoading:			baseUrl + 'simplegallery/images/lightbox-ico-loading.gif',
			imageBtnPrev:			baseUrl + 'simplegallery/images/lightbox-btn-prev.gif',
			imageBtnNext:			baseUrl + 'simplegallery/images/lightbox-btn-next.gif',
			imageBtnClose:			baseUrl + 'simplegallery/images/lightbox-btn-close.gif',
			imageBlank:				baseUrl + 'simplegallery/images/lightbox-blank.gif'
		});
	}
});