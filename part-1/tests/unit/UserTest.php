<?php

    class UserTest extends \PHPUnit\Framework\TestCase
    {

        public function test_That_We_Can_Set_And_Get_First_Name()
        {
            $user = new \App\Models\User;
            $firstName = 'Dave';

            $user->setFirstName($firstName);

            $this->assertEquals($user->getFirstName(), $firstName);
        }

        public function test_That_We_Can_Set_And_Get_Last_Name()
        {
            $user = new \App\Models\User;
            $lastName = 'Jones';

            $user->setLastName($lastName);

            $this->assertEquals($user->getLastName(), $lastName);
        }

        public function test_Full_Name_Is_Returned()
        {
            $user = new \App\Models\User;
            $firstName = 'Dave';
            $lastName = 'Jones';
            $fullName = $firstName . ' ' . $lastName;

            $user->setFirstName($firstName);
            $user->setLastName($lastName);

            $this->assertEquals($user->getFullName(), $fullName);
        }

        public function test_First_And_Last_Name_Are_Trimmed()
        {
            $user = new \App\Models\User;

            $firstName = ' Dave ';
            $lastName = ' Jones ';

            $user->setFirstName($firstName);
            $user->setLastName($lastName);

            $this->assertEquals($user->getFirstName(), trim($firstName));
            $this->assertEquals($user->getLastName(), trim($lastName));
        }

        public function test_Email_Address_Can_Be_Set()
        {
            $user = new \App\Models\User;

            $email = 'test@test.com';

            $user->setEmail($email);

            $this->assertEquals($user->getEmail(), $email);
        }

        public function test_Email_Variables_Contain_Correct_Values()
        {
            $user = new \App\Models\User;

            $firstName = 'Dave';
            $lastName = 'Jones';
            $fullName = $firstName . ' ' . $lastName;
            $email = 'test@test.com';

            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setEmail($email);

            $emailVars = $user->getEmailVariables();

            $this->assertArrayHasKey('full_name', $emailVars);
            $this->assertArrayHasKey('email', $emailVars);

            $this->assertEquals($emailVars['full_name'], $fullName);
            $this->assertEquals($emailVars['email'], $email);
        }


    }

?>
