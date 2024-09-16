<?php

namespace App\Services\Api;

use App\Models\Submission;
use App\Repositories\Api\SubmissionRepository;

/**
 * @property SubmissionRepository $submissionRepository
 */
class SubmissionService
{
    private SubmissionRepository $submissionRepository;

    public function __construct(SubmissionRepository $submissionRepository)
    {
        $this->submissionRepository = $submissionRepository;
    }

    /**
     * Store a Submission
     *
     * @param array $data
     * @return Submission
     */
    public function store(array $data): Submission
    {
        return $this->submissionRepository->store($data);
    }
}
