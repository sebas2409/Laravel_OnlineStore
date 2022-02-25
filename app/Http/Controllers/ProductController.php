<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show($id): Factory|View|Application
    {
    $viewData = [];
    $product = Product::findOrFail($id);
    $viewData["title"] = $product->getName()." - Online Store";
    $viewData["subtitle"] = $product->getName()." - Product information";
    $viewData["product"] = $product;
    return view('products.show')->with("viewData", $viewData);
    }

    public function index(): Factory|View|Application
    {
    $viewData = [];
    $viewData["title"] = "Products - Online Store";
    $viewData["subtitle"] = "List of products";
    $viewData["products"] = Product::all();
    return view('products.index')->with("viewData", $viewData);
    }
}
