/* Add theme related links to theme customizer */

(function($) {
	if ('undefined' !== typeof didi_lite_links) {

		// Add Upgrade Notice
		upgrade = $('<a class="didi-upgrade-link"></a>')
			.attr('href', didi_lite_links.upgradeURL)
			.attr('target', '_blank')
			.text(didi_lite_links.upgradeLabel);

		$('.preview-notice').append(upgrade);

		// Theme Links
		box = $('<div class="didi-theme-links-wrap"></div>');

		title = $('<h3 class="didi-theme-links-title"></h3>')
			.text(didi_lite_links.title);

		themePage = $('<a class="didi-theme-link didi-theme-link-info"></a>')
			.attr('href', didi_lite_links.themeURL)
			.attr('target', '_blank')
			.text(didi_lite_links.themeLabel);

		themeDocu = $('<a class="didi-theme-link didi-theme-link-docs"></a>')
			.attr('href', didi_lite_links.docsURL)
			.attr('target', '_blank')
			.text(didi_lite_links.docsLabel);

		themeSupport = $('<a class="didi-theme-link didi-theme-link-support"></a>')
			.attr('href', didi_lite_links.supportURL)
			.attr('target', '_blank')
			.text(didi_lite_links.supportLabel);

		themeRate = $('<a class="didi-theme-link didi-theme-link-rate"></a>')
			.attr('href', didi_lite_links.rateURL)
			.attr('target', '_blank')
			.text(didi_lite_links.rateLabel);

		// Add Theme Links
		links = box.append(title).append(themePage).append(themeDocu).append(themeSupport).append(themeRate);

		setTimeout(function() {
			$('#accordion-panel-didi_theme_options .control-panel-content').append(links);
		}, 2000);

		// Remove accordion click event
		$('.didi-upgrade-link, .didi-theme-link').on('click', function(e) {
			e.stopPropagation();
		});

	}
})(jQuery);