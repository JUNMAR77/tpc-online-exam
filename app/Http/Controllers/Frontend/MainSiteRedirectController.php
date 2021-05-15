<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Package;
use Illuminate\Http\Request;

class MainSiteRedirectController extends Controller
{
    public function redirectToRegister($selected_package){

        $departments = Department::latest()->get();
        $packages = Package::latest()->get();

        return view('auth.register', compact('departments', 'packages', 'selected_package'));
    }
}
