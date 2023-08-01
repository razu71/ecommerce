<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService {

    /**
     * @return \Illuminate\Http\JsonResponse
     * get all product
     */
    public function getProducts() {
        $products = Product::all();
        if ($products) return success_response(__('Product found'), ProductResource::collection($products));
        return error_response(__('Product not found'));
    }

    /**
     * @param $id
     * get a single product by id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findProduct($id) {
        $product = Product::where('id', $id)->first();
        if ($product) return success_response(__('Product found'), new ProductResource($product));
        return error_response(__('Product not found'));
    }

    /**
     * @param $request
     * make product data
     *
     * @return array
     */
    public function makeProductData($request) {
        return [
            'title'   => $request->title,
            'price'   => $request->price,
            'details' => $request->details,
        ];
    }

    /**
     * @param $request
     * store product service
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProduct($request) {
        try {
            $data = $this->makeProductData($request);
            $product = Product::create($data);
            return success_response(__('Product created successfully'), new ProductResource($product));
        } catch (\Exception $exception) {
            info(json_encode($exception->getMessage()));
            return error_response();
        }
    }

    /**
     * @param $request
     * @param $id
     * update product service
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProduct($request, $id) {
        try {
            $product = Product::where('id', $id)->first();
            if (!$product) return error_response(__('Product not found'));
            $data = $this->makeProductData($request);
            $product->update($data);
            return success_response(__('Product updated'), new ProductResource($product));
        } catch (\Exception $exception) {
            info(json_encode($exception->getMessage()));
            return error_response();
        }
    }

    public function uploadProductPhoto($id) {

    }

    /**
     * @param $id
     *delete service
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id) {
        try {
            $product = Product::where('id', $id)->first();
            if (!$product) return error_response(__('Product not found'));
            $product->delete();
            return success_response(__('Product deleted'));
        } catch (\Exception $exception) {
            info(json_encode($exception->getMessage()));
            return error_response();
        }
    }
}
