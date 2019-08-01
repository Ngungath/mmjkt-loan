<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //

    public function system()
    {
    	return view('settings.system_settings');
    }
}
