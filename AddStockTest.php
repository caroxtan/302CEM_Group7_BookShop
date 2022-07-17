<?php
use PHPUnit\Framework\TestCase;

class AddStockTest extends TestCase
{
    public function testIsBookNameString()
    {
        $book_name1='Cognition: Exploring the Science of the Mind';
        $book_name2='Computer Science: An Interdisciplinary Approach';
        $book_name3='All the Math You Missed';
        $this->assertContainsOnly('string', [$book_name1, $book_name2, $book_name3]);
    }

    public function testIsBookAuthorString()
    {
        $book_author1='Daniel Reisberg';
        $book_author2='Robert Sedgewick';
        $book_author3='Ben Orlin';
        $this->assertContainsOnly('string', [$book_author1, $book_author2, $book_author3]);
    }
    
    public function testIsBookCategoryAvailable()
    {
        $book_category1='Information Technology';
        $book_category2='Computer Science';
        $book_category3='Mathematics';
        $this->assertContains('Computer Science', [$book_category1, $book_category2, $book_category3]);
    }

}
?>