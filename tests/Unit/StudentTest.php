<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Student;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $stu = new Student();
        $s = $this->getName();
        dd($s);
        $this->assertEquals($s , 'hassan');
    }
}
