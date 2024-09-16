<?php

namespace App\Listeners\Api;

use App\Events\Api\SubmissionSavedEvent;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListeners
{
    public function handle(SubmissionSavedEvent $submissionSavedEvent): void
    {
        $submission = $submissionSavedEvent->getSubmission();

        Log::info('submission.saved', [
            'name' => $submission->name,
            'email' => $submission->email,
        ]);
    }
}
