<?php

    class UserTest extends \PHPUnit\Framework\TestCase
    {
        protected $user;

        public function setUp(): void
        {
            $this->user = new \App\Models\User;
        }

        public function test_That_We_Can_Set_And_Get_First_Name()
        {
            $firstName = 'Dave';

            $this->user->setFirstName($firstName);

            $this->assertEquals($this->user->getFirstName(), $firstName);
        }

        public function test_That_We_Can_Set_And_Get_Last_Name()
        {
            $lastName = 'Jones';

            $this->user->setLastName($lastName);

            $this->assertEquals($this->user->getLastName(), $lastName);
        }

        public function test_Full_Name_Is_Returned()
        {
            $firstName = 'Dave';
            $lastName = 'Jones';
            $fullName = $firstName . ' ' . $lastName;

            $this->user->setFirstName($firstName);
            $this->user->setLastName($lastName);

            $this->assertEquals($this->user->getFullName(), $fullName);
        }

        public function test_First_And_Last_Name_Are_Trimmed()
        {
            $firstName = ' Dave ';
            $lastName = ' Jones ';

            $this->user->setFirstName($firstName);
            $this->user->setLastName($lastName);

            $this->assertEquals($this->user->getFirstName(), trim($firstName));
            $this->assertEquals($this->user->getLastName(), trim($lastName));
        }

        public function test_Email_Address_Can_Be_Set()
        {
            $email = 'test@test.com';
            $this->user->setEmail($email);
            $this->assertEquals($this->user->getEmail(), $email);
        }

        public function test_Email_Variables_Contain_Correct_Values()
        {
            $firstName = 'Dave';
            $lastName = 'Jones';
            $fullName = $firstName . ' ' . $lastName;
            $email = 'test@test.com';

            $this->user->setFirstName($firstName);
            $this->user->setLastName($lastName);
            $this->user->setEmail($email);

            $emailVars = $this->user->getEmailVariables();

            $this->assertArrayHasKey('full_name', $emailVars);
            $this->assertArrayHasKey('email', $emailVars);

            $this->assertEquals($emailVars['full_name'], $fullName);
            $this->assertEquals($emailVars['email'], $email);
        }


    }

?>
