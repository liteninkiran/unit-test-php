<?php

    class DivisionTest extends \PHPUnit\Framework\TestCase
    {
        public function test_Divides_Given_Operands()
        {
            $division = new \App\Calculator\Division;
            $division->setOperands([100, 2]);

            $this->assertEquals(50, $division->calculate());
        }

        public function test_Ignore_Division_By_Zero_Operands()
        {
            $division = new \App\Calculator\Division;
            $division->setOperands([10, 0, 0, 5, 0]);

            $this->assertEquals(2, $division->calculate());
        }

        public function test_No_Operands_Set_Throws_Exception_When_Calculating()
        {
            $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

            $division = new \App\Calculator\Division;
            $division->calculate();
        }
    }

?>
