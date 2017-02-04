<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;

class UsersCanAddTeachersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function teaches_can_be_added()
    {
        $this->disableExceptionHandling();

        $name = 'Some teacher name';

        $this->assertCount(0, Teacher::all());

        $this->post('/teachers',
            [
                'name' => $name
            ]
        )->assertStatus(201);

        $this->assertCount(1, Teacher::all());
    }
}
