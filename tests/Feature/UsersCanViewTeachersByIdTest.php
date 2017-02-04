<?php

namespace Tests\Feature\feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;

class UsersCanViewTeachersByIdTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_shows_teacher_name_when_visiting_the_url_and_passing_its_id()
    {
        $teacher = factory(Teacher::class)->create([]);

        $this->get('/teachers/'.$teacher->id)
            ->assertJson($teacher->toArray());
    }

    /** @test */
    public function it_returns_404_when_teacher_not_found()
    {
        $this->get('/teachers/1234')
            ->assertStatus(404);
    }
}
