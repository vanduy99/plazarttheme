//(function($)
//{
//	var plazarttheme_custom_menu = {
//
//		recalcTimeout: false,
//
//		// bind the click event to all elements with the class avia_uploader
//		bind_click: function()
//		{
//			var megmenuActivator = $('.menu-item-custom_plazarttheme-megamenu', '#menu-to-edit');
//
//				megmenuActivator.on('click', function()
//				{
//					var checkbox = $(this),
//						container = checkbox.parents('.menu-item:eq(0)');
//
//					if(checkbox.is(':checked'))
//					{
//						container.addClass('plazarttheme_custom_active');
//					}
//					else
//					{
//						container.removeClass('plazarttheme_custom_active');
//					}
//
//					//check if anything in the dom needs to be changed to reflect the (de)activation of the mega menu
//					plazarttheme_custom_menu.recalc();
//
//				});
//		},
//
//		recalcInit: function()
//		{
//			$( ".menu-item-bar" ).on( "mouseup", function(event, ui)
//			{
//				if(!$(event.target).is('a'))
//				{
//					clearTimeout(plazarttheme_custom_menu.recalcTimeout);
//					plazarttheme_custom_menu.recalcTimeout = setTimeout(plazarttheme_custom_menu.recalc, 500);
//				}
//			});
//		},
//
//
//		recalc : function()
//		{
//			menuItems = $('.menu-item', '#menu-to-edit');
//
//			menuItems.each(function(i)
//			{
//				var item = $(this),
//					megaMenuCheckbox = $('.menu-item-custom_plazarttheme-megamenu', this);
//
//				if(!item.is('.menu-item-depth-0'))
//				{
//					var checkItem = menuItems.filter(':eq('+(i-1)+')');
//					if(checkItem.is('.plazarttheme_custom_active'))
//					{
//						item.addClass('plazarttheme_custom_active');
//						megaMenuCheckbox.attr('checked','checked');
//					}
//					else
//					{
//						item.removeClass('plazarttheme_custom_active');
//						megaMenuCheckbox.attr('checked','');
//					}
//				}
//
//
//
//
//
//			});
//
//		},
//
//		//clone of the jqery menu-item function that calls a different ajax admin action so we can insert our own walker
//		addItemToMenu : function(menuItem, processMethod, callback) {
//			var menu = $('#menu').val(),
//				nonce = $('#menu-settings-column-nonce').val();
//
//			processMethod = processMethod || function(){};
//			callback = callback || function(){};
//
//			params = {
//				'action': 'plazarttheme_custom_change_walker',
//				'menu': menu,
//				'menu-settings-column-nonce': nonce,
//				'menu-item': menuItem
//			};
//
//			$.post( ajaxurl, params, function(menuMarkup) {
//				var ins = $('#menu-instructions');
//				processMethod(menuMarkup, params);
//				if( ! ins.hasClass('menu-instructions-inactive') && ins.siblings().length )
//					ins.addClass('menu-instructions-inactive');
//				callback();
//			});
//		}
//
//};
//
//
//
//	$(function()
//	{
//		plazarttheme_custom_menu.bind_click();
//		plazarttheme_custom_menu.recalcInit();
//		plazarttheme_custom_menu.recalc();
//		if(typeof wpNavMenu != 'undefined'){ wpNavMenu.addItemToMenu = plazarttheme_custom_menu.addItemToMenu; }
// 	});
//
//
//})(jQuery);