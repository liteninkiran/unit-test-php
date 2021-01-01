<?php

    class UserTest extends \PHPUnit\Framework\TestCase
    {
        public function testThatWeCanSetAndGetFirstName()
        {
            $user = new \App\Models\User;
            $firstName = 'Dave';

            $user->setFirstName($firstName);

            $this->assertEquals($user->getFirstName(), $firstName);
        }

        public function testThatWeCanSetAndGetLastName()
        {
            $user = new \App\Models\User;
            $lastName = 'Jones';

            $user->setLastName($lastName);

            $this->assertEquals($user->getLastName(), $lastName);
        }

        public function testFullNameIsReturned()
        {
            $user = new \App\Models\User;
            $firstName = 'Dave';
            $lastName = 'Jones';
            $fullName = $firstName . ' ' . $lastName;

            $user->setFirstName($firstName);
            $user->setLastName($lastName);

            $this->assertEquals($user->getFullName(), $fullName);
        }

        public function testFirstAndLastNameAreTrimmed()
        {
            $user = new \App\Models\User;

            $firstName = ' Dave ';
            $lastName = ' Jones ';

            $user->setFirstName($firstName);
            $user->setLastName($lastName);

            $this->assertEquals($user->getFirstName(), trim($firstName));
            $this->assertEquals($user->getLastName(), trim($lastName));
        }


    }

?>
