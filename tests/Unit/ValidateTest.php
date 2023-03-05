<?php

namespace Tests\Unit;
use App\Http\Controllers\Auth\RegisterController;

use PHPUnit\Framework\TestCase;

class ValidateTest extends TestCase
{
    /**
      * @group test
      */
    public function testEmail()
    {
        $this->assertEquals(true, RegisterController::checkEmail('hoang@gmail.com'));
        $this->assertEquals(true, RegisterController::checkEmail('phh242001@hust.edu.vn'));
        $this->assertEquals(true, RegisterController::checkEmail('hoang1@gmail.com'));
        $this->assertEquals(true, RegisterController::checkEmail('2hung@gmail.com'));
        $this->assertEquals(true, RegisterController::checkEmail('Hanghoa@gmail.com'));
        // $this->assertEquals(true, RegisterController::checkEmail('hoang%@gmail.com'));
        // $this->assertEquals(true, RegisterController::checkEmail('#hoang5@gmail.com'));
        // $this->assertEquals(true, RegisterController::checkEmail('hoa ng6@gmail.com'));
        $this->assertEquals(true, RegisterController::checkEmail('1121545@gmail.com'));
        // $this->assertEquals(true, RegisterController::checkEmail('hoang123@@gmail.com'));
    }
    public function testPassword()
    {
        $this->assertEquals(true, RegisterController::checkPassword('12345678'));
        $this->assertEquals(true, RegisterController::checkPassword('hoanghai12'));
        $this->assertEquals(true, RegisterController::checkPassword('hoangday'));
        $this->assertEquals(true, RegisterController::checkPassword('hoang%$'));
        // $this->assertEquals(true, RegisterController::checkPassword('123'));
        
    }
}
