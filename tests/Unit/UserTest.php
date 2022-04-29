<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function testLogin(){
        $data = [
            'email' => 'zawadul@gmail.com', 
            'password' => '123456'
        ];
        $this->withoutMiddleware();
        $response = $this->post('/login', $data);

        $response->assertRedirect('/');
    }


    public function testOwnerLogin(){
        $data = [
            'email' => 'zawadul@gmail.com', 
            'password' => '123456'
        ];
        $this->withoutMiddleware();
        $response = $this->post('/ownerLogin', $data);

        $response->assertRedirect('/');
    }


    public function testOwnerLoginView(){
        $response = $this->get('/ownerLogin');

        $response->assertStatus(200);
    }



    public function testRegisterIndex(){
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testOwnerRegisterView(){
        $response = $this->get('/ownerRegister');

        $response->assertStatus(200);
    }

    public function testRegister(){
        $data = [
            'first_name' => 'test', 
            'last_name' => 'doe',
            'email' => 'testCustomer@gmail.com',
            'password' => '123456'
        ];
        $this->withoutMiddleware();
        $response = $this->call('POST', '/register', $data, [], [], ['HTTP_REFERER' => '/register']);
        $response->assertRedirect('/register');
    }
 

    public function testOwnerRegister(){
        $data = [
            'first_name' => 'test', 
            'last_name' => 'doe',
            'restaurant_name' => 'test restro',
            'email' => 'testOwner@gmail.com',
            'password' => '123456'
        ];
        $this->withoutMiddleware();
        $response = $this->call('POST', '/ownerRegister', $data, [], [], ['HTTP_REFERER' => '/register']);
        $response->assertRedirect('/register');
    }
}
