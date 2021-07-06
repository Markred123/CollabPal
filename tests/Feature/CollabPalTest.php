<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class CollabPalTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_creates_a_folder(){

        $this->withoutExceptionHandling();


        $this->actingAs(User::factory()->create());

        $this->post('/newFolder',[
            'folderName'=>'MarkFolder'
        ]);

        $this->assertDatabaseHas('folders',['FolderName'=>'MarkFolder']);


    }
//    public function test_guests_should_not_make_folders(){
//        $this->withoutExceptionHandling();
//        $this->post('/newFolder');
//    }
    public function test_user_creates_a_group(){

        $this->withoutExceptionHandling();


        $this->actingAs(User::factory()->create());

        $this->post('/groupCreate',[
            'name'=>'MarkGroup',
        ]);

        $this->assertDatabaseHas('groups',['name'=>'MarkGroup']);


    }
}
