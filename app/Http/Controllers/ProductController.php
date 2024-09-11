<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    /**
     * Muestra la lista de vehículos.
     */
    public function index()
    {
        // Obtener todos los registros de la tabla products
        $products = Product::paginate(12);

        // Pasar los vehículos a la vista index.blade.php
        return view('index', ['products' => $products]);
    }

    public function show($id) {
        $product = product::findOrFail($id);
        return view('show', compact('product'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $product = new Product();
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('show', $product->id);
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('index')->with('success', 'product deleted successfully!');
    }

    public function update(Request $request, $id) {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Buscar el vehículo por ID
        $product = Product::findOrFail($id);

        // Actualizar los datos del vehículo utilizando el método update
        $product->update($validatedData);

        // Redirigir a la vista de detalles del vehículo actualizado
        return redirect()->route('show', $product->id);
    }

}
