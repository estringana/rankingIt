<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Institution;
use App\Teacher;

class UsersCanSeeTeachersOfAGivenInstitutionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_get_all_the_teachers_of_a_institution()
    {
        $this->disableExceptionHandling();

        $institution = factory(Institution::class)->create([]);
		$teachers = factory(Teacher::class, 2)->create([
			'institution_id' => $institution->id
		]);

        $this->get('/institutions/'.$institution->id.'/teachers')
            ->assertStatus(200)
            ->assertJson($teachers->toArray());
    }
}
