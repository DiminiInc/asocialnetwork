<!-- <div id="notification">
	<div class="information">
		You are using beta version of the site. Some functions and content may be unavailable. Open old version of the site? 
	</div>
	<div class="information-choice">
		<a href="https://sites.google.com/site/diminiinc/">Yes</a> 
		<a href="javascript:void(0)" onclick="localStorage.setItem('notify_close', 'yes');hideNotification('notification'); return false;">No</a>
	</div>
</div> -->
<div id="language-notification">
	<div class="information">
		Хотите сменить язык сайта?
	</div>
	<div class="information-choice">
		<a href="javascript:void(0)" onclick="showLanguageChoice('language-choice'); return false;">Да</a> 
		<a href="javascript:void(0)" onclick="replaceLocale();hideNotification('language-notification'); return false;">Нет</a>
	</div>
</div>
<div id="sticky-footer">
	<div class="information">
		By using this site you agree to <a href="/en/terms-and-privacy" class="information-link-not-button">User agreement and Privacy policy</a>.
	</div>
	<div class="information-choice">
		<a href="javascript:void(0)" onclick="localStorage.setItem('cookie_close', 'yes');var siteHeight = document.getElementById('site');
		siteHeight.style.height = siteHeight.offsetHeight-55+'px';hideNotification('sticky-footer'); return false;">I understand</a>
	</div>
</div>