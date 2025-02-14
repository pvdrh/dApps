<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index(Request $request): JsonResponse
    {
        $categories = Category::all();

        return $this->responseSuccess($categories);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->all();
        $this->model->create($data);
        return $this->responseSuccess(['success' => true]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();
        $category = $this->model->find($id);
        $category->update($data);
        return $this->responseSuccess(['success' => true]);
    }
}
