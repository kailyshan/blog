<?php
/**
 * Date: 2020/09/17
 * Time: 01:08 AM
 */

Route::group(['namespace'=>'Blog'], function(){
	\App\Http\Controllers\Blog\ViController::routes();

});


