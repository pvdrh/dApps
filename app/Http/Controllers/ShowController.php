<?php

namespace App\Http\Controllers;

use App\Services\ShowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowController extends BaseApiController
{
    protected ShowService $showService;

    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }

    public function index(): JsonResponse
    {
        $shows = $this->showService->getAll();

        return $this->responseSuccess($shows);
    }

    public function show($id): JsonResponse
    {
        $show = $this->showService->find($id);
        return $this->responseSuccess($show);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->all();
        $this->showService->create($data);
        return $this->responseSuccess(['success' => true]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();
        $show= $this->showService->find($id);
        $show->update($data);
        return $this->responseSuccess(['success' => true]);
    }

    public function delete($id): JsonResponse
    {
        $show = $this->showService->delete($id);
        return $this->responseSuccess(['success' => $show]);
    }
}
