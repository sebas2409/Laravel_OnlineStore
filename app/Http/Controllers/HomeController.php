<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $viewData = [];
        $viewData['title']='Home Page-Online Store';
        return view('home.index')->with('viewData', $viewData);
    }

    public function about(): Factory|View|Application
    {
        /*
         * $data1 =
        $data2 = "About us";
        $description = "This is an about page ...";
        $author = "Developed by: Juan Sebastián González López";
        return view('home.about')   //Entiendo que lo que hace es retornar las vistas con las keys de la página cambiada con los valores de las variables
            ->with("title", $data1)
            ->with("subtitle", $data2)
            ->with("description", $description)
            ->with("author", $author);
         */

        $viewData=[];
        $viewData['title']="About us - Online Store";
        $viewData['subtitle']="About us";
        $viewData['description']="This is an about page ...";
        $viewData['author']="Developed by: Juan Sebastián González lópez";
        return view('home.about')->with('viewData', $viewData);
    }
}
