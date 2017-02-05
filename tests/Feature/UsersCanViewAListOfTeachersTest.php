<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;

class UsersCanViewAListOfTeachersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function uses_can_view_a_list_containing_all_teachers()
    {
        $this->disableExceptionHandling();

        $teachers = factory(Teacher::class, 2)->create([]);

        $this->get('/teachers')
            ->assertStatus(200)
            ->assertJson($teachers->toArray());
    }
}
