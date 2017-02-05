<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Teacher;
use App\Institution;

class UsersCanAddTeachersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function teachers_can_be_added_to_an_institution()
    {
        $this->disableExceptionHandling();

        $institution = factory(Institution::class)->create([]);
        $name = 'Some teacher name';

        $this->assertCount(0, Teacher::all());

        $this->post('/teachers',
            [
                'name' => $name,
                'institution_id' => $institution->id
            ]
        )->assertStatus(201);

        $this->assertCount(1, Teacher::all());
    }

    /** @test */
    public function teachers_can_not_be_added_to_a_instituion_which_dont_exists()
    {
        $name = 'Some teacher name';
        $nonExistentInstitution = 12345;

        $this->post('/teachers',
            [
                'name' => $name,
                'institution_id' => $nonExistentInstitution
            ]
        )->assertStatus(404);
    }
}
