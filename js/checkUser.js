$(function () {
	var user = getCookie('user');
	if (user != '') {
		$('.not-login').hide();
		$('.login').show();
		$('.user').html(user);
	} else {
		$('.not-login').show();
		$('.login').hide();
	}
});