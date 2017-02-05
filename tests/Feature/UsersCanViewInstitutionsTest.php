<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Institution;

class UsersCanViewInstitutionsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function uses_can_view_a_list_containing_all_institutions()
    {
        $this->disableExceptionHandling();

        $institutions = factory(Institution::class, 2)->create([]);

        $this->get('/institutions')
            ->assertStatus(200)
            ->assertJson($institutions->toArray());
    }
}
