<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function __construct(private ProductService $product_service) {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * get all product
     */
    public function getAllProducts() {
        return $this->product_service->getProducts();
    }

    /**
     * @param $id
     * get a specific product by id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSpecificProduct($id) {
        return $this->product_service->findProduct($id);
    }

    /**
     * @param StoreProductRequest $request
     * Store a product to database with some basic information
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProduct(StoreProductRequest $request) {
        return $this->product_service->storeProduct($request);
    }

    /**
     * @param StoreProductRequest $request
     * @param $id
     * update product
     *
     * @return null
     */
    public function updateProduct(StoreProductRequest $request, $id) {
        return $this->product_service->updateProduct($request, $id);
    }

    public function uploadProductPhoto(Request $request, $id) {
        return $this->product_service->uploadProductPhoto($request, $id);
    }

    /**
     * @param $id
     * delete a product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id) {
        return $this->product_service->deleteProduct($id);
    }
}
