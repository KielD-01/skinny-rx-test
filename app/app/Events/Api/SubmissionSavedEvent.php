<?php

namespace App\Events\Api;

use App\Models\Submission;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * @property Submission $submission
 */
class SubmissionSavedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(private readonly Submission $submission)
    {
        Log::info('submission.saved', ['dispatched' => true]);
    }

    /**
     * @return Submission
     */
    public function getSubmission(): Submission
    {
        return $this->submission;
    }
}
