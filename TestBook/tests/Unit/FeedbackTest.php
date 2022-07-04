<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Models\Feedback;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

use DB;

class FeedbackTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
 /*   public function test_example()
    {
        $this->assertTrue(true);
    }*/


    public function test_feedback()
    {
        
       /* $feedback = array("username"=>"customer1", "name" =>"Customer");  

        $this->assertArrayHasKey('username', $feedback);*/
       /* $this->seed();

        $response = $this->get('/feedback', [
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'service' => 'Good',
            'suggestion' => 'None'
        ]);

        $response->assertRedirect('/feedback');*/

       /*$feedback = new Feedback(['Customer', 'customer@gmail.com', 'Good', 'None']);

       $this->assertTrue($feedback->has('Customer'));*/



       //Feedback->assertValid(['username', 'name', 'email', 'service', 'suggestion']);
    }

  /*  public function test_feedbackName()
    {
        $feedback = Feedback::array(['Customer', 'customer@gmail.com', 'Good', 'None']);
        
        $this->assertTrue($feedback->has('customer1'));

    }*/

    public function testFeedbackTable()
    {
        $this->seed();

        $feedback = $this->get('/feedback', [
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'service' => 'Good',
            'suggestion' => 'None'
        ]);
      

        $this->assertDatabaseHas('feedback', [
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'service' => 'Good',
            'suggestion' => 'None'
        ]);
    }

}
