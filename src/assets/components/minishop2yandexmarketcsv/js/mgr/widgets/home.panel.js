miniShop2YandexMarketCSV.panel.Home = function(config) {
	config = config || {};
	Ext.apply(config,{
		border: false
		,baseCls: 'modx-formpanel'
		,items: [{
			html: '<h2>'+_('minishop2yandexmarketcsv')+'</h2>'
			,border: false
			,cls: 'modx-page-header container'
		},{
			xtype: 'modx-tabs'
			,bodyStyle: 'padding: 10px'
			,defaults: { border: false ,autoHeight: true }
			,border: true
			,activeItem: 0
			,hideMode: 'offsets'
			,items: [{
				title: _('minishop2yandexmarketcsv_items')
				,items: [{
					html: _('minishop2yandexmarketcsv_intro_msg')
					,border: false
					,bodyCssClass: 'panel-desc'
					,bodyStyle: 'margin-bottom: 10px'
				},{
					xtype: 'minishop2yandexmarketcsv-grid-items'
					,preventRender: true
				}]
			}]
		}]
	});
	miniShop2YandexMarketCSV.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(miniShop2YandexMarketCSV.panel.Home,MODx.Panel);
Ext.reg('minishop2yandexmarketcsv-panel-home',miniShop2YandexMarketCSV.panel.Home);
