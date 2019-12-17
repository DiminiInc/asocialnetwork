<div id="footer">
	<ul>
		<li style="white-space: nowrap;">&#169; Dimini Inc., <?php echo date('Y') ?></li> 
		<li style="white-space: nowrap;">
			<a href="mailto:info@dimini.tk">Contact us</a>
		</li>
		<li style="white-space: nowrap;">
			<a href="/en/jobs">Jobs</a>
		</li>
		<li style="white-space: nowrap;">
			<a href="/en/about-site">About site</a>
		</li>
		<li style="white-space: nowrap;">
			Choose language: 
			<a href="javascript:void(0)" onclick="showLanguageChoice('language-choice'); return false;" class="nopadding-link" title="Choose language"><div id="flag-english" title="EN"></div>English</a>
		</li>
		<li style="white-space: nowrap; padding-left: 40px; padding-right: 40px;">  
			<a href="https://www.facebook.com/diminiinc" class="nopadding-link" title="Visit our group on Facebook"><img src="/global/site-files/facebook-logo.svg" alt="Facebook" /></a> 
			<a href="https://twitter.com/diminiinc" class="nopadding-link" title="Visit our page on Twitter"><img src="/global/site-files/twitter-logo.svg" alt="Twitter"/></a> 
			<a href="https://vk.com/diminiinc" class="nopadding-link" title="Visit our group on VK"><img src="/global/site-files/vk-logo.svg" alt="VK"/></a> 
			<a href="https://t.me/diminiinc" class="nopadding-link" title="Visit our channel on Telegram"><img src="/global/site-files/telegram-logo.svg" alt="Telegram" /></a> 
			<a href="https://discord.gg/JypA7Jj" class="nopadding-link" title="Visit our server on Discord"><img src="/global/site-files/discord-logo.svg" alt="Discord" /></a> 
			<a href="https://ok.ru/group/53283832201387" class="nopadding-link" title="Visit our group on Odnoklassniki"><img src="/global/site-files/ok-logo.svg" alt="Odnoklassniki"/></a>
		</li>
	</ul>
</div>
<div id="language-choice" class="modal" onclick="hideNotification('language-choice'); return false;">
  <span class="close" title="Close window">&times;</span>
    <div id="centered-list" removeListener>
		<a href="javascript:void(0)" onclick="localStorage.setItem('lang', 'en');changeLocale('en');" title="Choose English language">
			<div>
				<div id="flag-english" title="EN"></div>
				<p>English</p>
			</div>
		</a>
		
		<a href="javascript:void(0)" onclick="localStorage.setItem('lang', 'ru');changeLocale('ru');" title="Choose Russian language">
			<div>
				<div id="flag-russian" title="RU"></div>
				<p>Russian</p>
			</div>
		</a>
  </div>
</div>