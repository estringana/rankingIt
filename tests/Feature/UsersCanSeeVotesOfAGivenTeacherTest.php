<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;
use App\Vote;

class UsersCanSeeVotesOfAGivenTeacherTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_get_all_the_votes_of_a_teacher()
    {
        $this->disableExceptionHandling();

        $teacher = factory(Teacher::class)->create([]);
        $votes = factory(Vote::class, 2)->make([]);
        $votes->each(function ($vote, $key) use ($teacher) {
            $teacher->addVote($vote);
        });

        $this->get('/teachers/'.$teacher->id.'/votes')
            ->assertStatus(200)
            ->assertJson($votes->toArray());
    }

    /** @test */
    public function it_return_empty_array_if_no_votes()
    {
        $expectedResult = [];

        $teacher = factory(Teacher::class)->create([]);

        $this->get('/teachers/'.$teacher->id.'/votes')
            ->assertStatus(200)
            ->assertJson($expectedResult);
    }

    /** @test */
    public function it_returns_404_if_teacher_does_not_exists()
    {
        $inventedTeacherId = 12345;
        $this->get('/teachers/'.$inventedTeacherId.'/votes')
            ->assertStatus(404);
    }
}
