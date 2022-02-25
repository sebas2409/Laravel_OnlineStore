<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminHomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $viewData=[];
        $viewData['title']='Admin Page-Online Store';
        return view('admin.home.index')->with('viewData',$viewData);
    }
}
