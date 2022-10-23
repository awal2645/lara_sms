<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingViewPage(){
        $subjects=Subject::all();
        return view('Backend.setting',compact(with('subjects')));
    }
}
