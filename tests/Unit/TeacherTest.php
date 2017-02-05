<?php

namespace Tests\Feature\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;
use App\Institution;
use App\Vote;

class TeacherTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function teachers_can_be_voted()
    {
        $teacher = factory(Teacher::class)->create();

        $vote = new Vote();
        $vote->vote = 'something';
        $teacher->addVote($vote);

        $this->assertCount(1, $teacher->fresh()->votes);
    }
}
