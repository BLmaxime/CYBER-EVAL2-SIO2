<?php

namespace App\Tests;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;
use App\Service\LateFeeCalculator;

class LateFeeCalculatorTest extends TestCase
{
    public function testCalculateLateFee(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-04');

        $this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
    }

    public function testCalculateLateFeeZero(): void
    {
        $book = new Book();
        $calculator = new LateFeeCalculator();

        $book->setDueDate(new \DateTime('2024-01-01'));
        $book->setReturnDate(new \DateTime('2024-01-01'));
        $this->assertEquals(0, $calculator->calculateLateFee($dueDate, $returnDate));

    }

    public function testCalculateLateFeeNegative(): void
    {
        $book = new Book();
        $calculator = new LateFeeCalculator();

        $book->setDueDate(new \DateTime('2024-01-01'));
        $book->setReturnDate(new \DateTime('2023-12-01'));
        $this->assertEquals(0, $calculator->calculateLateFee($dueDate, $returnDate));

    }
}
