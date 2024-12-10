<?php

namespace App\Tests;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookValidationTest extends KernelTestCase
{
    private function makeBook(): Book
    {
        $book = new Book();
        $book->setId(1);
        $book->setTitle('Test');
        $book->setIsbn('1000000000000000000000000');
        $book->setPublishedAt(new \DateTime('2021-01-01'));
        return $book;
    }

    public function testBookWithBlankTitle(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');
        $user = $this->makeBook();
        $user->setTitle('');
        $errors = $validator->validate($user);
        $this->assertCount(1, $errors);
    }

    public function testBookWithBlankIsbn(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');
        $user = $this->makeBook();
        $user->setIsbn('');
        $errors = $validator->validate($user);
        $this->assertCount(1, $errors);
    }

    public function testBookWithBlankDate(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');
        $user = $this->makeBook();
        $user->setPublishedAt(new \DateTime());
        $errors = $validator->validate($user);
        $this->assertCount(1, $errors);
    }
    public function testBookWithLenghtIsbn(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');
        $user = $this->makeBook();
        $user->setIsbn('100');
        $errors = $validator->validate($user);
        $this->assertCount(1, $errors);


    }
}