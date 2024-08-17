<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "1000"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "1500"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "300"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "90"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $proIndex = (int)$id - 1;

        if (!isset(ProductController::$products[$proIndex])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = ProductController::$products[$proIndex];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] =  $product["name"] . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }


    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
       
        $viewData = [];
        $viewData["tittle"] = "Product Created";
        $viewData["message"] = "The product was created successfully";
    
        return view('message')->with("viewData", $viewData);
        //here will be the code to call the model and save it to the database
    }
}
