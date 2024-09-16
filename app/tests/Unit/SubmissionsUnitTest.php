<?php

namespace Tests\Unit;

use App\Http\Requests\Api\Submissions\StoreSubmissionRequest;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use Tests\TestCase;

class SubmissionsUnitTest extends TestCase
{
    use RefreshDatabase;

    private StoreSubmissionRequest $submissionStoreRequest;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');

        $this->submissionStoreRequest = new StoreSubmissionRequest();
    }

    /**
     *
     * @return array
     */
    #[TestDox('Test for a wrong dataset payload to store a submission')]
    public static function wrong_data_provider(): array
    {
        $faker = Factory::create();

        $name = $faker->name;
        $email = $faker->email;
        $message = $faker->sentence;

        return [
            [[]],
            [compact('name')],
            [compact('email')],
            [compact('message')],
            [compact('name', 'email')],
            [compact('name', 'message')],
            [compact('email', 'message')]
        ];
    }

    #[DataProvider('wrong_data_provider')]
    #[TestDox('Test for a wrong dataset payload to store a submission')]
    public function test_wrong_data_store(array $payload): void
    {
        $validator = Validator::make($payload, $this->submissionStoreRequest->rules());

        $this->assertTrue($validator->fails());
    }


    /**
     * Test with a correct payload
     *
     * @return void
     */
    #[TestDox('Test for a correct dataset payload to store a submission')]
    public function test_right_data_store(): void
    {
        $faker = Factory::create();

        $payload = [
            'name' => $faker->name,
            'email' => $faker->email,
            'message' => $faker->sentence,
        ];
        $validator = Validator::make($payload, $this->submissionStoreRequest->rules());

        $this->assertTrue($validator->passes());
    }
}
