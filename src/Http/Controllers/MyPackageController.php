<?php

namespace :uc:vendor\:uc:package\Http\Controllers;

use Core\Items\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Utility\Common\Http\Controllers\AppsBaseController;

class :uc:packageController extends AppsBaseController
{

    private ItemsRepository $itemsRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItemsRepository $itemsRepository)
    {
        parent::__construct();
        $this->itemsRepository = $itemsRepository;
    }

    /**
     * Get all.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        // Build wonderful things

        return response()->json([]);

    }

    /**
     * Get all.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getById(int $id, Request $request): JsonResponse
    {
        // Build wonderful things

        return response()->json([]);
    }

    /**
     * Create new item
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // Build wonderful things

        return response()->json([]);
    }

    /**
     * Update item
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        // Build wonderful things

        return response()->json([]);
    }

    /**
     * Delete item
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(int $id, Request $request): JsonResponse
    {
        // Build wonderful things

        return response()->json([]);
    }
}