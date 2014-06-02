miniShop2YandexMarketCSV.page.Home = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		components: [{
			xtype: 'minishop2yandexmarketcsv-panel-home'
			,renderTo: 'minishop2yandexmarketcsv-panel-home-div'
		}]
	}); 
	miniShop2YandexMarketCSV.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(miniShop2YandexMarketCSV.page.Home,MODx.Component);
Ext.reg('minishop2yandexmarketcsv-page-home',miniShop2YandexMarketCSV.page.Home);