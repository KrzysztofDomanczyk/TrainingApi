<?php

namespace Tests\Unit;

use App\Training;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrainingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * 
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserDeleteTrainingWhichWasBought()
    {
        $user = factory(User::class)->create();
        $training = factory(Training::class)->create();
        $training->users()->attach($user);
        $this->actingAs($user);

        $response = $this->delete("/api/training/$training->id");
        $response->assertJson([
            'status' => "error",
            'response' => 'Exist users who boughts this training'
        ])->assertStatus(404);

    }
}
