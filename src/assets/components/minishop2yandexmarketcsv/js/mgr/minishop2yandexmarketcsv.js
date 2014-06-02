var miniShop2YandexMarketCSV = function(config) {
	config = config || {};
	miniShop2YandexMarketCSV.superclass.constructor.call(this,config);
};
Ext.extend(miniShop2YandexMarketCSV,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('minishop2yandexmarketcsv',miniShop2YandexMarketCSV);

miniShop2YandexMarketCSV = new miniShop2YandexMarketCSV();