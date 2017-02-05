<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;

class UsersCanVoteTeachersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function teachers_can_be_voted()
    {
        $vote = '0';
        $teacher = factory(Teacher::class)->create([]);

        $this->post('/teachers/'.$teacher->id.'/votes',
            ['vote' => $vote]
        )->assertStatus(201);

        $this->assertCount(1, $teacher->fresh()->votes);
    }
}
