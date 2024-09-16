<?php

namespace App\Repositories\Api;

use App\Models\Submission;
use App\Repositories\AbstractRepository;

/**
 * @property string|Submission $model
 * @method Submission store(array $data)
 */
class SubmissionRepository extends AbstractRepository
{
    protected $model = Submission::class;
}
