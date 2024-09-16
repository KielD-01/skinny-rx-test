<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Submissions\StoreSubmissionRequest;
use App\Jobs\Api\StoreSubmissionJob;
use App\Traits\JsonResponseHelper;
use Illuminate\Foundation\Bus\PendingDispatch;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SubmissionController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubmissionRequest $request): JsonResponse
    {
        return JsonResponseHelper::success([
            'submission' => dispatch(new StoreSubmissionJob($request->validated())) instanceof PendingDispatch,
        ], code: Response::HTTP_CREATED);
    }
}
