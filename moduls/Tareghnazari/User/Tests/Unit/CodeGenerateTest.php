<?php


namespace Tareghnazari\User\Tests\Unit;



use Tareghnazari\User\Services\VerifyCodeService;
use Tests\TestCase;

class CodeGenerateTest extends TestCase
{

    public function test_generated_random_code()
    {
        $code = VerifyCodeService::generate();
        $this->assertNotNull($code);

    }


    public function test_generated_code_can_store(){

     VerifyCodeService::store(1,1234);
     $this->assertEquals(1234,cache()->get('verify_code_1'));

     }

}
