<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',['as'=>'home','uses'=>'HomeController@getHome']);
Route::get('about-us',['as'=>'about-us','uses'=>'HomeController@getAboutUs']);
Route::get('contact',['as'=>'contact','uses'=>'HomeController@getContact']);
Route::post('contact-sent',['as'=>'contact-sent','uses'=>'HomeController@saveContact']);
Route::get('/menu/{id}/{name}','HomeController@menu');

/* Route For Admin */
Route::get('admin',['as'=>'login','uses'=>'AdminController@getLogin']);
Route::post('admin', ['as'=>'login', 'uses'=>'AdminController@postLogin']);
Route::get('admin/logout', ['as'=>'logout','uses'=>'AdminController@logout']);
/*Route For User*/
Route::get('/user',['as'=>'user-login','uses'=>'UserAccessController@getLogin']);
Route::post('/user',['as'=>'user-login','uses'=>'UserAccessController@postLogin']);
Route::get('/user/logout',['as'=>'user-logout','uses'=>'UserAccessController@logout']);
/*Route For User Dashboard*/
Route::get('/user/dashboard',['as'=>'login','uses'=>'UserController@showUserDashboard']);


Route::get('/manager',['as'=>'manager-login','uses'=>'ManagerAccessController@getLogin']);
Route::post('/manager',['as'=>'manager-login','uses'=>'ManagerAccessController@postLogin']);
Route::get('/manager/logout',['as'=>'manager-logout','uses'=>'ManagerAccessController@logout']);
/*Route For User Dashboard*/
Route::get('/manager/dashboard',['as'=>'login','uses'=>'UserController@showUserDashboard']);


/* Admin password Change*/
Route::get('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@getChangePass']);
Route::post('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@postChangePass']);


/*Dashboard Route List*/
Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@getDashboard']);

/* WebSetting Controller */
Route::get('general-setting',['as'=>'general_setting','uses'=>'WebSettingController@getGeneralSetting']);
Route::put('general-setting/{id}',['as'=>'update_general','uses'=>'WebSettingController@putGeneralSetting']);

/* Home Page Route */
Route::get('home-page-setting',['as'=>'home_page_setting','uses'=>'WebSettingController@getHomePageSetting']);
Route::put('home-page-setting/{id}',['as'=>'update_home_page_setting','uses'=>'WebSettingController@putHomePageSetting']);

/* About Us Page Route List*/
Route::get('about-page-setting',['as'=>'about_page_setting','uses'=>'WebSettingController@getAboutPageSetting']);
Route::put('about-page-setting/{id}',['as'=>'update_about_page_setting','uses'=>'WebSettingController@putAboutPageSetting']);

/* Menu Route List*/
Route::get('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@getMenuCreate']);
Route::post('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@postMenuCreate']);
Route::get('menu-show',['as'=>'menu_show','uses'=>'WebSettingController@showMenuCreate']);
Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenuCreate']);
Route::put('menu-edit/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenuCreate']);
Route::delete('menu-delete/{id}',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenuCreate']);

/* Partner Route List*/
Route::get('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@getPartnerCreate']);
Route::post('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@postPartnerCreate']);
Route::get('partner-show',['as'=>'partner-show','uses'=>'WebSettingController@showPartnerCreate']);
Route::get('partner-edit/{id}',['as'=>'partner-edit','uses'=>'WebSettingController@editPartnerCreate']);
Route::put('partner-edit/{id}',['as'=>'partner-update','uses'=>'WebSettingController@updatePartnerCreate']);
Route::delete('partner-delete',['as'=>'partner_delete','uses'=>'WebSettingController@deletePartnerCreate']);

/* Currency Route List */
Route::get('currency-create', ['as'=>'currency_create','uses'=>'DashboardController@createCurrency']);
Route::post('currency-create', ['as'=>'currency_store','uses'=>'DashboardController@storeCurrency']);
Route::get('currency', ['as'=>'currency_show','uses'=>'DashboardController@showCurrency']);
Route::get('currency-edit/{id}', ['as'=>'currency_edit','uses'=>'DashboardController@editCurrency']);
Route::put('currency-edit/{id}', ['as'=>'currency_update','uses'=>'DashboardController@updateCurrency']);
Route::delete('currency-delete', ['as'=>'currency_delete','uses'=>'DashboardController@deleteCurrency']);

/* brick Route List */
Route::get('brick-create',['as'=>'brick-create','uses'=>'DashboardController@createBrick']);
Route::post('brick-create',['as'=>'brick-store','uses'=>'DashboardController@storeBrick']);
Route::get('brick-show',['as'=>'brick-show','uses'=>'DashboardController@showBrick']);
Route::get('brick-edit/{id}',['as'=>'brick-edit','uses'=>'DashboardController@editBrick']);
Route::put('brick-edit/{id}',['as'=>'brick-update','uses'=>'DashboardController@updateBrick']);

/* Brick Stock Route List */
Route::get('stock-brick',['as'=>'stock-brick','uses'=>'DashboardController@addBrick']);
Route::post('stock-brick',['as'=>'stock-brick','uses'=>'DashboardController@storeBrickStock']);
Route::get('stock-show',['as'=>'show-stock','uses'=>'DashboardController@showBrickStock']);
Route::get('stock-brick-invoice/{id}',['as'=>'brick-invoice-id','uses'=>'DashboardController@invoiceIDBrickStock']);
Route::get('stock-invoice',['as'=>'stock-invoice','uses'=>'DashboardController@invoiceBrickStock']);
Route::post('stock-invoice-date',['as'=>'stock-invoice-date','uses'=>'DashboardController@dateBrickStock']);

Route::get('stock-edit/{id}',['as'=>'stock-edit','uses'=>'DashboardController@editBrickInvoice']);
Route::put('stock-edit/{id}',['as'=>'stock-update','uses'=>'DashboardController@updateBrickInvoice']);

/* Customer Route List */
Route::get('customer-create',['as'=>'customer-create','uses'=>'DashboardController@createCustomer']);
Route::post('customer-create',['as'=>'customer-store','uses'=>'DashboardController@storeCustomer']);
Route::get('customer-show',['as'=>'customer-show','uses'=>'DashboardController@showCustomer']);
Route::get('customer-edit/{id}',['as'=>'customer-edit','uses'=>'DashboardController@editCustomer']);
Route::put('customer-edit/{id}',['as'=>'customer-update','uses'=>'DashboardController@updateCustomer']);

Route::get('customer-invoice/{id}',['as'=>'customer-invoice','uses'=>'DashboardController@customerInvoice']);
Route::post('customer-invoice',['as'=>'customer-invoice-update','uses'=>'DashboardController@customerInvoiceUpdate']);
Route::get('customerId-invoice/{id}',['as'=>'customerId-invoice','uses'=>'DashboardController@customerInvoiceId']);

/*Customer Account List*/
Route::get('customer-account-show/{id}',['as'=>'customer-account-show','uses'=>'DashboardController@customerAccountShow']);
Route::post('customer-account-show',['as'=>'customer-account-show','uses'=>'DashboardController@customerAccountSave']);
Route::get('customer-account',['as'=>'customer-account','uses'=>'DashboardController@customerAccount']);
Route::get('customer-account-laser/{id}',['as'=>'customer-account-laser','uses'=>'DashboardController@customerAccountLaser']);
Route::post('customer-payment-received',['as'=>'customer-payment-received','uses'=>'DashboardController@customerPaymentReceived']);
Route::get('customer-delete-interface/{id}',['as'=>'customer-delete-interface','uses'=>'DashboardController@customerDeleteInterface']);
Route::get('customer-delete/{id}',['as'=>'customer-delete','uses'=>'DashboardController@customerDelete']);
/*Report Module */
Route::get('all-my-report/{date}',['as'=>'all-my-report','uses'=>'DashboardController@allMyReport']);

/*Raw Brick List*/
Route::get('set-raw-brick/',['as'=>'set-raw-brick','uses'=>'DashboardController@setRawBrick']);
Route::post('update-raw-brick',['as'=>'update-raw-brick','uses'=>'DashboardController@updateRawBrick']);
Route::post('edit-raw-brick',['as'=>'edit-raw-brick','uses'=>'DashboardController@editRawBrick']);
Route::get('raw-brick-laser/{date}/{sordar}/{year}',['as'=>'raw-brick-laser','uses'=>'DashboardController@rawBrickLaser']);


/* Income Report */
Route::get('income-report',['as'=>'income-report','uses'=>'DashboardController@incomeReport']);
Route::get('report-invoice/{date}',['as'=>'report-invoice','uses'=>'DashboardController@getReportInvoice']);

/* Expense Route List */
Route::get('expense-create',['as'=>'expense-create','uses'=>'DashboardController@createExpense']);
Route::post('expense-create',['as'=>'expense-store','uses'=>'DashboardController@storeExpense']);
Route::get('expense-show',['as'=>'expense-show','uses'=>'DashboardController@showExpense']);
Route::get('expense-edit/{id}',['as'=>'expense-edit','uses'=>'DashboardController@editExpense']);
Route::put('expense-edit/{id}',['as'=>'expense-update','uses'=>'DashboardController@updateExpense']);
Route::post('expense-search',['as'=>'expense-search','uses'=>'DashboardController@searchExpense']);

/* Laborer Route List*/
Route::get('laborer-create',['as'=>'laborer-create','uses'=>'DashboardController@createLaborer']);
Route::post('laborer-create',['as'=>'laborer-create','uses'=>'DashboardController@storeLaborer']);
Route::get('laborer-show',['as'=>'laborer-show','uses'=>'DashboardController@showLaborer']);
Route::get('laborer-edit/{id}',['as'=>'laborer-edit','uses'=>'DashboardController@editLaborer']);
Route::put('laborer-edit/{id}',['as'=>'laborer-update','uses'=>'DashboardController@updateLaborer']);
Route::delete('laborer-delete',['as'=>'laborer-delete','uses'=>'DashboardController@deleteLaborer']);

/* Laborer Bill Route List*/
Route::get('laborer-bill',['as'=>'laborer-bill','uses'=>'DashboardController@todayLaborerBill']);
Route::get('laborer-bill-pay/{id}',['as'=>'laborer-bill-pay','uses'=>'DashboardController@payLaborerBill']);
Route::get('laborer-bill-show',['as'=>'laborer-bill-show','uses'=>'DashboardController@showLaborerBill']);
Route::post('laborer-bill-search',['as'=>'laborer-bill-search','uses'=>'DashboardController@searchLaborerBill']);

/* Loan Route List */
Route::get('loan-create',['as'=>'loan-create','uses'=>'DashboardController@createLoan']);
Route::post('loan-create',['as'=>'loan-create','uses'=>'DashboardController@storeLoan']);
Route::get('loan-show',['as'=>'loan-show','uses'=>'DashboardController@showLoan']);
Route::get('lender-delivery/{id}',['as'=>'lender-delivery','uses'=>'DashboardController@deliveryLoan']);
/* Delivery */
Route::get('create-delivery',['as'=>'create-delivery','uses'=>'DashboardController@createDelivery']);
Route::get('edit-delivery',['as'=>'edit-delivery','uses'=>'DashboardController@editDelivery']);
Route::get('laser-delivery/{id}/{date}',['as'=>'laser-delivery','uses'=>'DashboardController@laserDelivery']);
Route::post('store-delivery',['as'=>'store-delivery','uses'=>'DashboardController@storeDelivery']);
/*Onload Account*/
Route::get('show-un-load',['as'=>'show-un-load','uses'=>'DashboardController@showUnLoad']);
Route::post('store-un-load',['as'=>'store-un-load','uses'=>'DashboardController@storeUnload']);
Route::get('show-un-load-laser/{date}/{year}/{round}',['as'=>'show-un-load-laser','uses'=>'DashboardController@showUnLoadLaser']);
/*Bill*/
Route::get('show-other-bill',['as'=>'show-other-bill','uses'=>'DashboardController@showOtherBill']);
Route::post('store-other-bill',['as'=>'store-other-bill','uses'=>'DashboardController@storeOtherBill']);
Route::get('show-other-bill-ledger/{year}/{month}/{bill_type}/{bills}',['as'=>'show-other-bill-ledger','uses'=>'DashboardController@showOtherBillLedger']);
/*Coal*/
Route::get('show-coal-buy',['as'=>'show-coal-buy','uses'=>'DashboardController@showCoalBuy']);
Route::post('store-coal-buy',['as'=>'store-coal-buy','uses'=>'DashboardController@storeCoalBuy']);
Route::post('store-coal-producer',['as'=>'store-coal-producer','uses'=>'DashboardController@storeCoalProducer']);
Route::get('show-coal-buy-ledger/{name}/{year}',['as'=>'show-coal-buy-ledger','uses'=>'DashboardController@showCoalBuyLedger']);
/*Fuel*/
Route::get('show-fuel-bill',['as'=>'show-fuel-bill','uses'=>'DashboardController@showFuelBill']);
Route::post('store-fuel-bill',['as'=>'store-fuel-bill','uses'=>'DashboardController@storeFuelBill']);
Route::get('show-fuel-bill-ledger/{month}/{fuel_type}/{section}/{year}',['as'=>'show-fuel-bill-ledger','uses'=>'DashboardController@showFuelBillLedger']);
/*Pyament module*/
Route::get('payment-module',['as'=>'payment-module','uses'=>'DashboardController@paymentModule']);  
Route::post('store-payment-module',['as'=>'store-payment-module','uses'=>'DashboardController@storePaymentModule']);
Route::get('payment-module-laser',['as'=>'payment-module-laser','uses'=>'DashboardController@paymentModuleLaser']);

/*Pyament module*/
Route::get('payment-module',['as'=>'payment-module','uses'=>'DashboardController@paymentModule']);  
Route::post('store-payment-module',['as'=>'store-payment-module','uses'=>'DashboardController@storePaymentModule']);
Route::get('payment-module-laser',['as'=>'payment-module-laser','uses'=>'DashboardController@paymentModuleLaser']);
/*Stuff module*/
Route::get('stuff-module',['as'=>'stuff-module','uses'=>'DashboardController@stuffModule']);  
Route::post('store-stuff-module',['as'=>'store-stuff-module','uses'=>'DashboardController@storeStuffModule']);
Route::get('stuff-module-laser/{stuff}',['as'=>'stuff-module-laser','uses'=>'DashboardController@stuffModuleLaser']);

/*Salary module*/
Route::get('salary-module',['as'=>'salary-module','uses'=>'DashboardController@salaryModule']);  
Route::post('store-salary-module',['as'=>'store-salary-module','uses'=>'DashboardController@storeSalaryModule']);
//Route::get('salary-module-laser',['as'=>'salary-module-laser','uses'=>'DashboardController@salaryModuleLaser']);

/*Forma module*/
Route::get('forma-module',['as'=>'forma-module','uses'=>'DashboardController@formaModule']);  
Route::post('store-forma-module',['as'=>'store-forma-module','uses'=>'DashboardController@storeFormaModule']);
Route::get('forma-module-laser/{date}/{suppiler}',['as'=>'forma-module-laser','uses'=>'DashboardController@formaModuleLaser']);
/*Land Lease module*/
Route::get('land-lease-module',['as'=>'land-lease-module','uses'=>'DashboardController@landLeaseModule']);  
Route::post('store-land-lease-module',['as'=>'store-land-lease-module','uses'=>'DashboardController@storelandLeaseModule']);
Route::get('land-lease-module-laser/{name}',['as'=>'land-lease-module-laser','uses'=>'DashboardController@landLeaseModuleLaser']);


Route::get('accessories-module',['as'=>'accessories-module','uses'=>'DashboardController@accessoriesModule']);  
Route::post('store-accessories-module',['as'=>'store-accessories-module','uses'=>'DashboardController@storeAccessoriesModule']);
Route::get('accessories-module-laser/{stuff_type}/{stuff_name}/{date}',['as'=>'accessories-module-laser','uses'=>'DashboardController@accessoriesModuleLaser']);


/* Coal Account */
Route::get('coal-account',['as'=>'coal-account','uses'=>'DashboardController@coalAccount']); 
/*Customer Getpass print*/
 Route::get('customer-gatepass/{id}/{date}',['as'=>'customer-gatepass','uses'=>'DashboardController@customerGatepass']); 

/*Ajax Search List*/
Route::get('search',['as'=>'search','uses'=>'DashboardController@searchCustomerId']);

Route::get('search-delivery',['as'=>'search-delivery','uses'=>'DashboardController@searchDelivery']);

Route::get('delete-brick/{id}',['as'=>'delete-brick','uses'=>'DashboardController@deleteBrick']);
Route::post('delete-stock',['as'=>'delete-stock','uses'=>'DashboardController@deleteStock']);


