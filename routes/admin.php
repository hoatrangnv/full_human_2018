<?php
Route::get('logout', array('as' => 'admin.logout','uses' => Admin.'\AdminLoginController@logout'));
Route::get('dashboard', array('as' => 'admin.dashboard','uses' => Admin.'\AdminDashBoardController@dashboard'));
Route::get('dashboard/infoEdit', array('as' => 'admin.infoEdit','uses' => Admin.'\AdminSystemSettingController@getInfoEdit'));
Route::post('dashboard/infoEdit/{id?}', array('as' => 'admin.infoEdit','uses' => Admin.'\AdminSystemSettingController@postInfoEdit'));

/*thông tin tài khoản*/
Route::match(['GET','POST'],'user/view', array('as' => 'admin.user_view','uses' => Admin.'\AdminUserController@view'));
Route::get('user/edit/{id}',array('as' => 'admin.user_edit','uses' => Admin.'\AdminUserController@editInfo'));
Route::post('user/edit/{id}',array('as' => 'admin.user_edit','uses' => Admin.'\AdminUserController@edit'));
Route::get('user/change/{id}',array('as' => 'admin.user_change','uses' => Admin.'\AdminUserController@changePassInfo'));
Route::post('user/change/{id}',array('as' => 'admin.user_change','uses' => Admin.'\AdminUserController@changePass'));
Route::post('user/remove/{id}',array('as' => 'admin.user_remove','uses' => Admin.'\AdminUserController@remove'));
Route::get('user/getInfoSettingUser', array('as' => 'admin.getInfoSettingUser','uses' => Admin.'\AdminUserController@getInfoSettingUser'));//ajax
Route::post('user/submitInfoSettingUser', array('as' => 'admin.submitInfoSettingUser','uses' => Admin.'\AdminUserController@submitInfoSettingUser'));//ajax

/*thông tin quyền*/
Route::match(['GET','POST'],'permission/view',array('as' => 'admin.permission_view','uses' => Admin.'\AdminPermissionController@view'));
Route::get('permission/addPermit',array('as' => 'admin.addPermit','uses' => Admin.'\AdminPermissionController@addPermit'));
Route::get('permission/create',array('as' => 'admin.permission_create','uses' => Admin.'\AdminPermissionController@createInfo'));
Route::post('permission/create',array('as' => 'admin.permission_create','uses' => Admin.'\AdminPermissionController@create'));
Route::get('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => Admin.'\AdminPermissionController@editInfo'))->where('id', '[0-9]+');
Route::post('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => Admin.'\AdminPermissionController@edit'))->where('id', '[0-9]+');
Route::post('permission/deletePermission', array('as' => 'admin.deletePermission','uses' => Admin.'\AdminPermissionController@deletePermission'));//ajax

/*Member*/
Route::match(['GET','POST'],'member/view',array('as' => 'admin.memberView','uses' => Admin.'\AdminMemberController@view'));
Route::post('member/edit/{id?}',array('as' => 'admin.memberEdit','uses' => Admin.'\AdminMemberController@postItem'));
Route::get('member/deleteItem',array('as' => 'admin.memberItem','uses' => Admin.'\AdminMemberController@deleteItem'));
Route::post('member/ajaxLoadForm',array('as' => 'admin.loadForm','uses' => Admin.'\AdminMemberController@ajaxLoadForm'));

//tỉnh thành quận huyện
Route::post('districtsProvince/ajaxGetOption', array('as' => 'admin.districtsProvince','uses' => Admin.'\AdminDistrictsProvince@ajaxGetOption'));//ajax

/*thông tin nhóm quyền*/
Route::match(['GET','POST'],'groupUser/view',array('as' => 'admin.groupUser_view','uses' => Admin.'\AdminGroupUserController@view'));
Route::get('groupUser/create',array('as' => 'admin.groupUser_create','uses' => Admin.'\AdminGroupUserController@createInfo'));
Route::post('groupUser/create',array('as' => 'admin.groupUser_create','uses' => Admin.'\AdminGroupUserController@create'));
Route::get('groupUser/edit/{id?}',array('as' => 'admin.groupUser_edit','uses' => Admin.'\AdminGroupUserController@editInfo'))->where('id', '[0-9]+');
Route::post('groupUser/edit/{id?}',array('as' => 'admin.groupUser_edit','uses' => Admin.'\AdminGroupUserController@edit'))->where('id', '[0-9]+');
Route::post('groupUser/remove/{id}',array('as' => 'admin.groupUser_remove','uses' => Admin.'\AdminGroupUserController@remove'));
/*thông tin quyền theo role */
Route::get('groupUser/viewRole',array('as' => 'admin.viewRole','uses' => Admin.'\AdminGroupUserController@viewRole'));
Route::get('groupUser/editRole/{id?}', array('as' => 'admin.editRole','uses' => Admin.'\AdminGroupUserController@getRole'));
Route::post('groupUser/editRole/{id?}', array('as' => 'admin.editRole','uses' => Admin.'\AdminGroupUserController@postRole'));

/*thông tin role */
Route::get('role/view',array('as' => 'admin.roleView','uses' => Admin.'\AdminRoleController@view'));
Route::post('role/addRole/{id?}',array('as' => 'admin.addRole','uses' => Admin.'\AdminRoleController@addRole'));
Route::get('role/deleteRole',array('as' => 'admin.deleteRole','uses' => Admin.'\AdminRoleController@deleteRole'));
Route::post('role/ajaxLoadForm',array('as' => 'admin.loadForm','uses' => Admin.'\AdminRoleController@ajaxLoadForm'));

/*thông tin menu */
Route::get('menu/view',array('as' => 'admin.menuView','uses' => Admin.'\AdminManageMenuController@view'));
Route::get('menu/edit/{id?}', array('as' => 'admin.menuEdit','uses' => Admin.'\AdminManageMenuController@getItem'));
Route::post('menu/edit/{id?}', array('as' => 'admin.menuEdit','uses' => Admin.'\AdminManageMenuController@postItem'));
Route::post('menu/deleteMenu', array('as' => 'admin.deleteMenu','uses' => Admin.'\AdminManageMenuController@deleteMenu'));//ajax

/*Admin cronjob*/
Route::match(['GET','POST'],'cronjob/view', array('as' => 'admin.CronjobView','uses' => Admin.'\AdminCronjobController@view'));
Route::get('cronjob/edit/{id?}',array('as' => 'admin.CronjobEdit','uses' => Admin.'\AdminCronjobController@getItem'));
Route::post('cronjob/edit/{id?}', array('as' => 'admin.CronjobEdit','uses' => Admin.'\AdminCronjobController@postItem'));
Route::get('cronjob/deleteCronjob', array('as' => 'admin.deleteCronjob','uses' => Admin.'\AdminCronjobController@deleteCronjob'));

/*Admin news*/
Route::get('news/view',array('as' => 'admin.newsView','uses' => News.'\AdminNewsController@view'));
Route::get('news/edit/{id?}', array('as' => 'admin.newsEdit','uses' => News.'\AdminNewsController@getItem'));
Route::post('news/edit/{id?}', array('as' => 'admin.newsEdit','uses' => News.'\AdminNewsController@postItem'));
Route::get('news/deleteNews', array('as' => 'admin.deleteNews','uses' => News.'\AdminNewsController@deleteNews'));

Route::get('news/viewShow',array('as' => 'admin.viewShow','uses' => News.'\AdminNewsController@viewShow'));
Route::get('news/viewItem/{name}-{id}.html', array('as' => 'admin.newsViewItem','uses' => News.'\AdminNewsController@newsViewItem'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');




