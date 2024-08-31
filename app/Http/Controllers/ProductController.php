<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {

        try {
            $product = Product::findOrFail($id);
        } catch (Exception$e) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product['name'].' - Online Store';
        $viewData['subtitle'] = $product['name'].' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        Product::create($request->only(['name', 'price']));

        $viewData = [];
        $viewData['tittle'] = 'Product Created';
        $viewData['message'] = 'The product was created successfully';

        return view('components.message')->with('viewData', $viewData);
        //here will be the code to call the model and save it to the database
    }
}
