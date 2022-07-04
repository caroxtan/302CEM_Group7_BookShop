<?php
 
namespace Tests\Feature;

 
//use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
 
class FeedbackTest extends TestCase
{

    public function test_feedbackUserInput()
    {

        $feedback = $this->get('/feedback', [
        'name' => 'Customer',
        'email' => 'customer@gmail.com',
        'service' => 'Good',
        'suggestion' => 'None'
        ]);

        $feedback->assertStatus(200);
        //$feedback->assertSee('feedback');
    }


    public function testViewFeedbackPage()
    {
         $feedback = $this->get('/feedback', [
        'name' => 'Customer',
        'email' => 'customer@gmail.com',
        'service' => 'Good',
        'suggestion' => 'None'
        ]);

         $feedback->assertSee('feedback');

     /* $feedback = new Feedback('name','email', 'service', 'suggestion', ['Customer', 'customer@gmail.com', "Good", 'None']);
      $this->assertTrue($feedback->has('customer'));
      $this->assertFalse($feedback->has('John'));*/
    }


    /**
     * A basic test example.
     *
     * @return void
     */

   /* public function test_feedback()
    {
       // $this->assertTrue(true);

       $feedback = new Feedback(['name'=> 'Customer', 'email'=> 'customer@gmail.com', 'service'=>'Good', 'suggestion'=>'None']);

       $this->assertTrue($feedback->has('Customer'));

       //$this->assertSame('email', $feedback);
    }*/

    /*public function test_feedbackView()
    {

       // $feedback = $this->get('/feedback');
        $feedback = array('name', 'username','email', 'service', 'suggestion', ['username' => 'customer1', 'name' => 'Customer', 'email' => 'customer@gmail.com', 'service' => "Good", 'suggestion' => 'None']);
        
        //$this->assertTrue($feedback->has('customer1'));

        $this->assertContains('name', $feedback);
        $this->assertContains('email', $feedback);
        //$this->assertSame('Customer', $feedback->name);
    }
    */


    /*public function test_feedback_has_name()
    {
        $request = new \App\Http\Requests\FeedbackRequest();

        $res = $this->post('/feedback', ['name' => 'customer']);

        $hasData = $request->has('name');

        $this->assertTrue(true, $hasData);

    }*/

}
