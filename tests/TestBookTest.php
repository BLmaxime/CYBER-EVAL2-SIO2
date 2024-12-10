<?php

namespace App\Tests;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class TestBookTest extends TestCase
{
    public function testSomething(): void
    {
        $book = new Book();
        $book->setId(1);
        $book->setTitle('Test');
        $book->setIsbn(10);
        $book->setPublishedAt(new \DateTime('2021-01-01'));

        $this->assertEquals(1, $book->getId());
        $this->assertEquals('Test', $book->getTitle());
        $this->assertEquals(10, $book->getIsbn());
        $this->assertEquals(new \DateTime('2021-01-01'), $book->getPublishedAt());



    }
}
