$ = jQuery

settings = lowtone_woocommerce_widgets_collapse_layered_nav

$ ->
	$widgets = $ '.widget.woocommerce.widget_layered_nav'

	$widgets.each ->
		$widget = $ this

		$items = $widget.find 'li'

		$hidden = $items.slice parseInt(settings.visible_items) + 1

		return if $hidden.length < 1

		show_text = settings.locales.show_text.replace '{num_items}', $items.length
		hide_text = settings.locales.hide_text.replace '{num_items}', $hidden.length
		
		$toggle = $('<a class="toggle">').insertAfter $items.parent()

		toggle = ->
			$hidden.toggle()

			if $hidden.is ':hidden' 
				$toggle
					.html(show_text)
					.addClass('expand')
					.removeClass('collapse')
			else 
				$toggle
					.html(hide_text)
					.addClass('collapse')
					.removeClass('expand')

		toggle()

		$toggle.click toggle
