<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function authUser(array $fields = [])
    {
        $user = User::factory()->create($fields);

        $this->actingAs($user);

        return $user;
    }
}
