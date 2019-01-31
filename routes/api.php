<?php

use Illuminate\Http\Request;



Route::resource('users', 'UsersController'); //displays all users/create/update and delete user{table:vicidial_users}
Route::get('/search', 'UsersController@search');//route to search a user either by full_name or user_id or user_level {table:vicidial_users}


/*display all campaigns active or inactive /create/update
 and delete campaign{table:vicidial_campaigns}*/
Route::resource('campaigns', 'CampaignController');


//Campaign Statuses

//Route to get all statuses for one campaign;
Route::get('campaign.statuses/{campaign}', ['uses' =>'CampaignController@campaignStatuses', 
'as'=> 'campaignStatuses']);
//Route to show all campaign statuses,
Route::resource('campaignstatus', 'StatusController',['except'=>['store','show','update']]);
//Route to  create a new campaign status
Route::post('campaignstatus/{campaign}', ['uses' =>'StatusController@store', 
'as'=> 'store']);
//Route to show a single campaign status
Route::get('campaignstatus/{status}', ['uses' =>'StatusController@show', 
'as'=> 'show']);
//Route to update asingle status
Route::put('campaignstatus/{status}', ['uses' =>'StatusController@update', 
'as'=> 'update']);


        //CAMPAIGN HOTKEYS

//route  to show all campaigns hot key
Route::get('hotkeys', ['uses' =>'HotkeysController@index', 
'as'=> 'index']);
//route  to show one campaign hot key
Route::get('hotkeys/{hotkey}', ['uses' =>'HotkeysController@show', 
'as'=> 'show']);
//route  to create a campaign hot key
Route::post('hotkeys/{campaign_id}', ['uses' =>'HotkeysController@store', 
'as'=> 'store']);
//route to update acampaign hot key
Route::put('hotkeys/{hotkey}', ['uses' =>'HotkeysController@update', 
'as'=> 'updatekeys']);
//route to destroy acampaign hot key
Route::delete('hotkeys/{hotkey}', ['uses' =>'HotkeysController@destroy', 
'as'=> 'destroy']);

            // LEAD RECYCLE

//Route to getting active lead recycles;
Route::get('leadrecycle', ['uses' =>'LeadRecyclesController@index', 
'as'=> 'leadrecycle.index']);
//route  to get lead recycles for one  particular campaign;
Route::get('campaignleadrecycle/{campaign_id}', ['uses' =>'LeadRecyclesController@showOne', 
'as'=> 'showOne']);
//route  to get a just singlelead recycle;
Route::get('leadrecycle/{recycle_id}', ['uses' =>'LeadRecyclesController@show', 
'as'=> 'leadrecycle.show']);

//route  to create lead recycles;
Route::post('leadrecycle/{campaign_id}', ['uses' =>'LeadRecyclesController@store', 
'as'=> 'leadrecycle.store']);
//route  to create lead recycles;
Route::put('leadrecycle/{campaign_id}', ['uses' =>'LeadRecyclesController@update', 
'as'=> 'leadrecycle.update']);
//route to destroy lead recycles;
Route::delete('leadrecycle/{status}', ['uses' =>'LeadRecyclesController@destroy', 
'as'=> 'leadrecycle.destroy']);

            //AUTO_ALT_DIAL
/*
skipped auto dial..cant locate the right tables
//AUTO-ALT DIAL
//route  to create auto-dial;
Route::post('auto_alt_dial', ['uses' =>'StatusController@create', 
'as'=> 'create']);




//AUTO-ALT DIAL
//route  to get auto-dial;
//Route::get('auto_alt_dial', ['uses' =>'StatusController@showAuto' 
//]);


//AUTO-ALT DIAL
//route  to get auto-dial;
//Route::get('auto_alt_dial', ['uses' =>'StatusController@showAuto' 
//]);

*/
            //VLISTS

//Route to getting all vlist
Route::get('vlist', ['uses' =>'VlistController@index', 
'as'=> 'index']);
//route  to get vlists for one  particular campaign;
Route::get('campaignvlist/{campaign_id}', ['uses' =>'VlistController@showOne', 
'as'=> 'showOne']);
//route  to just get vlist.
Route::get('vlist/{vcl_id}', ['uses' =>'VlistController@show', 
'as'=> 'show']);
//route  to create vlist;
Route::post('vlist/{campaign_id}', ['uses' =>'VlistController@store', 
'as'=> 'store']);
//route  to create vlist;
Route::put('vlist/{vlist}', ['uses' =>'VlistController@update', 
'as'=> 'update']);

//route to destroy vlist;
Route::delete('vlist/{list_id}', ['uses' =>'VlistController@destroy', 
'as'=> 'destroy']);

        //PAUSE-CODES

//Route to getting all pausecodes
Route::get('pausecodes', ['uses' =>'PauseCodesController@index', 
'as'=> 'index']);
//route  to get pausecodes for one  particular campaign;
Route::get('pausecodes/{campaign_id}', ['uses' =>'PauseCodesController@show', 
'as'=> 'show']);
//route  to create pausecodes;
Route::post('pausecodes/{campaign_id}', ['uses' =>'PauseCodesController@store', 
'as'=> 'store']);
//route to destroy pausecodes;
Route::delete('pausecodes/{pauseCode}', ['uses' =>'PauseCodesController@destroy', 
'as'=> 'destroy']);
//route  to modify pausecodes;
Route::put('pausecodes/{pauseCode}', ['uses' =>'PauseCodesController@update', 
'as'=> 'update']);


            //PRESETS

//Route to getting presets
Route::get('presets', ['uses' =>'PresetsController@index', 
'as'=> 'index']);
//route  to create presets;
Route::post('presets/{campaign_id}', ['uses' =>'PresetsController@store', 
'as'=> 'store']);
//route to destroy presets;
Route::delete('presets/{status}', ['uses' =>'PresetsController@destroy', 
'as'=> 'destroy']);

            //AC-CID
//Route to getting ac-cid
Route::get('ac_cid', ['uses' =>'PresetsController@index', 
'as'=> 'index']);
//route  to create ac-cid;
Route::post('ac_cid/{campaign_id}', ['uses' =>'PresetsController@store', 
'as'=> 'store']);
//route to destroy ac-cid;
Route::delete('ac_cid/{status}', ['uses' =>'PresetsController@destroy', 
'as'=> 'destroy']);

            //USER_GROUPS

//Route::resource('usergroups', 'UserGroupController',['except'=>['create','index','edit']]);
//route  to get usergroups;
Route::get('usergroups', ['uses' =>'UserGroupController@index', 
'as'=> 'index']);
Route::get('usergroups/{user_group}', ['uses' =>'UserGroupController@show', 
'as'=> 'show']);
//route to update usergroups;
Route::put('usergroups/{user_group}', ['uses' =>'UserGroupController@update', 
'as'=> 'update']);
//route to destroy usergroups;
Route::delete('usergroups/{user_group}', ['uses' =>'UserGroupController@destroy', 
'as'=> 'destroy']);

            //REMOTE AGENTS


Route::get('remoteagents', ['uses' =>'RemoteAgentsController@index', 
'as'=> 'index']);

Route::get('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@show', 
'as'=> 'show']);
Route::put('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@update', 
'as'=> 'update']);
Route::post('remoteagents', ['uses' =>'RemoteAgentsController@store', 
'as'=> 'store']);
Route::delete('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@destroy', 
'as'=> 'destroy']);

        // Extension Groups

Route::get('extensiongroups', ['uses' =>'ExtensionGroupsController@index', 
'as'=> 'index']);

Route::get('extensiongroups/{extension_id}', ['uses' =>'ExtensionGroupsController@show', 
'as'=> 'show']);

//you have to provide extension_group_id to create
Route::post('extensiongroups/{extension_group_id}', ['uses' =>'ExtensionGroupsController@store', 
'as'=> 'store']);
Route::delete('extensiongroups/{extension_id}', ['uses' =>'ExtensionGroupsController@destroy', 
'as'=> 'destroy']);

Route::get('remoteagents', ['uses' =>'RemoteAgentsController@index', 
'as'=> 'index']);

Route::get('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@show', 
'as'=> 'show']);
Route::put('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@update', 
'as'=> 'update']);
Route::post('remoteagents', ['uses' =>'RemoteAgentsController@store', 
'as'=> 'store']);
Route::delete('remoteagents/{remote_agent_id}', ['uses' =>'RemoteAgentsController@destroy', 
'as'=> 'destroy']);

        
// Extension Groups

Route::get('extensiongroups', ['uses' =>'ExtensionGroupsController@index', 
'as'=> 'index']);

Route::get('extensiongroups/{extension_id}', ['uses' =>'ExtensionGroupsController@show', 
'as'=> 'show']);

//you have to provide extension_group_id to create
Route::post('extensiongroups/{extension_group_id}', ['uses' =>'ExtensionGroupsController@store', 
'as'=> 'store']);
Route::delete('extensiongroups/{extension_id}', ['uses' =>'ExtensionGroupsController@destroy', 
'as'=> 'destroy']);


                // ADMIN PANEL
//call times
Route::get('calltimes', ['uses' =>'AdminController@index', 
'as'=> 'index']);
Route::get('calltimes/{call_time_id}', ['uses' =>'AdminController@show', 
'as'=> 'show']);
Route::post('calltimes/{call_time_id}', ['uses' =>'AdminController@store', 
'as'=> 'store']);
Route::put('calltimes/{call_time_id}', ['uses' =>'AdminController@update', 
'as'=> 'update']);

Route::delete('calltimes/{call_time_id}', ['uses' =>'AdminController@destroy', 
'as'=> 'destroy']);


//phones
Route::get('phones', ['uses' =>'PhoneController@index', 
'as'=> 'index']);
Route::get('phones/{id}', ['uses' =>'PhoneController@show', 
'as'=> 'show']);
Route::post('phones', ['uses' =>'PhoneController@store', 
'as'=> 'store']);
Route::put('phones/{id}', ['uses' =>'PhoneController@update', 
'as'=> 'update']);
Route::delete('phones/{id}', ['uses' =>'PhoneController@destroy', 
'as'=> 'destroy']);



Route::get('shifts', ['uses' =>'ShiftsController@index', 
'as'=> 'index']);
Route::get('shifts/{shift_id}', ['uses' =>'ShiftsController@show', 
'as'=> 'show']);

//carriers
Route::get('servercarriers', ['uses' =>'ServerCarrierController@index', 
'as'=> 'index']);
Route::get('servercarriers/{id}', ['uses' =>'ServerCarrierController@show', 
'as'=> 'show']);
Route::post('servercarriers', ['uses' =>'ServerCarrierController@store', 
'as'=> 'store']);
Route::put('servercarriers/{id}', ['uses' =>'ServerCarrierController@update', 
'as'=> 'update']);
Route::delete('servercarriers/{id}', ['uses' =>'ServerCarrierController@destroy', 
'as'=> 'destroy']);


//system settings
Route::get('systemsettings', ['uses' =>'SystemSettingController@index', 
'as'=> 'index']);
Route::get('systemsettings/{id}', ['uses' =>'SystemSettingController@show', 
'as'=> 'show']);
Route::post('systemsettings', ['uses' =>'SystemSettingController@store', 
'as'=> 'store']);
Route::put('systemsettings/{id}', ['uses' =>'SystemSettingController@update', 
'as'=> 'update']);
Route::delete('systemsettings/{id}', ['uses' =>'SystemSettingController@destroy', 
'as'=> 'destroy']);

//system statuses.

Route::get('vicidialstatuses', ['uses' =>'VicidialStatusesController@index', 
'as'=> 'index']);
Route::get('vicidialstatuses/{id}', ['uses' =>'VicidialStatusesController@show', 
'as'=> 'show']);
Route::post('vicidialstatuses', ['uses' =>'VicidialStatusesController@store', 
'as'=> 'store']);
Route::put('vicidialstatuses/{id}', ['uses' =>'VicidialStatusesController@update', 
'as'=> 'update']);
Route::delete('vicidialstatuses/{id}', ['uses' =>'VicidialStatusesController@destroy', 
'as'=> 'destroy']);

// Carriers

Route::get('carriers', ['uses' =>'CarriersController@index', 
'as'=> 'index']);
Route::get('carriers/{id}', ['uses' =>'CarriersController@show', 
'as'=> 'show']);
Route::post('carriers', ['uses' =>'CarriersController@store', 
'as'=> 'store']);
Route::put('carriers/{id}', ['uses' =>'CarriersController@update', 
'as'=> 'update']);
Route::delete('carriers/{id}', ['uses' =>'CarriersController@destroy', 
'as'=> 'destroy']);

//system settings
Route::get('systemsettings', ['uses' =>'SystemSettingController@index', 
'as'=> 'index']);
Route::get('systemsettings/{id}', ['uses' =>'SystemSettingController@show', 
'as'=> 'show']);
Route::post('systemsettings', ['uses' =>'SystemSettingController@store', 
'as'=> 'store']);
Route::put('systemsettings/{id}', ['uses' =>'SystemSettingController@update', 
'as'=> 'update']);
Route::delete('systemsettings/{id}', ['uses' =>'SystemSettingController@destroy', 
'as'=> 'destroy']);

Route::get('statusgroups', ['uses' =>'VicidialStatusGroupController@index', 
'as'=> 'index']);




Route::resource('scripts', 'ScriptController',['except'=>['create','edit']]);

Route::resource('inbounds', 'InboundController',['except'=>['create','edit']]);
Route::resource('lists', 'VlistsController',['except'=>['create','edit']]);


Route::resource('conferences', 'ConferencesController');
Route::resource('dids', 'DIDsController');
Route::resource('chatgroups', 'ChatGroupsController');
//Route::resource('/agents', 'AgentsController');
Route::get('/filters',['uses'=>'FiltersController@index'] );
Route::get('/servers',['uses'=>'ServerController@index'] );
