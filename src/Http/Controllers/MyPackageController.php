<?php

namespace :uc:vendor\:uc:package\Http\Controllers;

use Illuminate\Http\Request;
use Utility\Common\Http\Controllers\BaseController;

class :uc:packageController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get all.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById(int $id, Request $request)
    {
        // Build wonderful things

        return response()->json([]);
    }

    /**
     * Create new item
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id, Request $request)
    {
        // Build wonderful things

        return response()->json([]);
    }
}