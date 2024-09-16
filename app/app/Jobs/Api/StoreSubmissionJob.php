<?php

namespace App\Jobs\Api;

use App\Events\Api\SubmissionSavedEvent;
use App\Services\Api\SubmissionService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class StoreSubmissionJob implements ShouldQueue
{
    use Queueable;

    private array $submissionData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $submissionData)
    {
        $this->onQueue('submissions');
        $this->submissionData = $submissionData;
    }

    /**
     * Execute the job.
     */
    public function handle(SubmissionService $submissionService): void
    {
        $submission = $submissionService->store($this->submissionData);
        event(new SubmissionSavedEvent($submission));
    }
}
