<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProductController extends Controller
{

    public static $products = [
        ['id'=>'1', 'name'=>'TV', 'description'=>'Best TV', 'price' => 150],
        ['id'=>'2', 'name'=>'iPhone', 'description'=>'Best iPhone', 'price' => 1200],
        ['id'=>'3', 'name'=>'Chromecast', 'description'=>'Best Chromecast', 'price' => 35],
        ['id'=>'4', 'name'=>'Glasses', 'description'=>'Best Glasses', 'price' => 80]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = ProductController::$products;

        return view('product.index') -> with('viewData', $viewData);
    }

    public function show(string $id) : View | RedirectResponse
    {
        if (!is_numeric($id) || !array_key_exists($id-1, ProductController::$products))
        {
            return redirect() -> route('product.index');
        }

        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData['title'] = $product['name'].' - Online Store';
        $viewData['subtitle'] = $product['name'].' - Product information';
        $viewData['product'] = $product;

        return view('product.show') -> with('viewData', $viewData);
    }
    
    public function create(): View
    {
    $viewData = [];
    $viewData["title"] = "Create product";

    return view('product.create') -> with("viewData",$viewData);
    }

    public function save(Request $request): View
    {
        $request -> validate([
        "name" => "required",
        "price" => "required|gt:0"
        ]);

        $viewData = [];
        $viewData['title'] = 'Product created successfully';
        $viewData['subtitle'] = 'Product created';
        $viewData['product_name'] = $request -> input('name');
        $viewData['product_price'] = $request -> input('price');

        // dd($request->all());
        return view('product.successCreation') -> with('viewData', $viewData);
    }

}