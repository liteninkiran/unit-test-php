<?php

    class CollectionTest extends \PHPUnit\Framework\TestCase
    {
        public function test_Empty_Instantiated_Collection_Returns_No_Items()
        {
            $collection = new \App\Support\Collection;

            $this->assertEmpty($collection->get());
        }

        public function test_Count_Is_Correct()
        {
            $collection = new \App\Support\Collection(['one', 'two', 'three']);

            $this->assertEquals(3, $collection->count());
        }

        public function test_Count_Of_Items_Returned_Matches_Count_Of_Items_Passed_In()
        {
            $collection = new \App\Support\Collection(['one', 'two', 'three']);

            $this->assertCount(3, $collection->get());
        }

        public function test_Items_Returned_Matches_Items_Passed_In()
        {
            // Define array
            $data = ['one', 'two', 'three'];

            // Create new collection
            $collection = new \App\Support\Collection($data);

            // Loop through input array and check return values
            for($i = 0; $i < count($data); $i++)
            {
                $this->assertEquals($collection->get()[$i], $data[$i]);
            }
        }

        public function test_Collection_Is_Instance_Of_Iterator_Aggregate()
        {
            $collection = new \App\Support\Collection;

            $this->assertInstanceOf(IteratorAggregate::class, $collection);
        }

        public function test_Collection_Can_Be_Iterated()
        {
            // Define array
            $data = ['one', 'two', 'three'];

            $collection = new \App\Support\Collection($data);

            $items = [];

            foreach($collection as $item)
            {
                $items[] = $item;
            }

            $this->assertCount(count($data), $items);
            $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
        }

        public function test_Add_To_Existing_Collection()
        {
            $collection = new \App\Support\Collection(['one', 'two']);
            $collection->add(['three']);

            $this->assertEquals(3, $collection->count());
            $this->assertCount(3, $collection->get());
        }

        public function test_Collection_Can_Be_Merged_With_Another_Collection()
        {
            // Define arrays
            $data1 = ['one', 'two'];
            $data2 = ['three', 'four', 'five'];

            $collection1 = new \App\Support\Collection($data1);
            $collection2 = new \App\Support\Collection($data2);

            $collection1->merge($collection2);

            $this->assertCount(count($data1) + count($data2), $collection1->get());
            $this->assertEquals(count($data1) + count($data2), $collection1->count());
        }

        public function test_Returns_Json_Encoded_Items()
        {
            $collection = new \App\Support\Collection([
                ['username' => 'alex'],
                ['username' => 'billy']
            ]);

            $this->assertIsString($collection->toJson());
            $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
        }

        public function test_Json_Encoding_A_Collection_Object_Returns_Json()
        {
            $collection = new \App\Support\Collection([
                ['username' => 'alex'],
                ['username' => 'billy']
            ]);

            $encoded = json_encode($collection);

            $this->assertIsString($encoded);
            $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
        }
    }

?>
