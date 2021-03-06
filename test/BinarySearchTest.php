<?php
declare(strict_types=1);
namespace AntoineTB\PhpBinarySearch\Tests;

use AntoineTB\PhpBinarySearch\BinarySearch;
use PHPUnit\Framework\TestCase;


final class BinarySearchTest extends TestCase {
  public function testBinarySearchWhenNeedleDoesNotExistInArrayWithNoDupes(){
    $needle = 'bradley@gmail.com';
    $haystack = array(
      'aaron@gmail.com',
      'james@gmail.com',
      'john@gmail.com',
      'michael@gmail.com',
      'peter@gmail.com',
    );
    $this->assertEquals(-1, BinarySearch::binarySearch($needle, $haystack, null, count($haystack) -1, 0, false));
  }
  public function testBinarySearchWhenNeedleDoesNotExistInArrayWithDupes(){
    $needle = 'bradley@gmail.com';
    $haystack = array(
      'aaron@gmail.com',
      'james@gmail.com',
      'john@gmail.com',
      'michael@gmail.com',
      'peter@gmail.com',
      'peter@gmail.com',
    );
    $this->assertEquals(-1, BinarySearch::binarySearch($needle, $haystack, null, count($haystack) -1, 0, true));
  }
  public function testBinarySearchWhenNeedleExistsInArrayWithNoDupes(){
    $haystack = array(
      'aaron@gmail.com',
      'james@gmail.com',
      'john@gmail.com',
      'michael@gmail.com',
      'peter@gmail.com',
    );
    foreach ($haystack as $key => $needle) {
      $this->assertEquals($key, BinarySearch::binarySearch($needle, $haystack, null, count($haystack) -1, 0, false));
    }
  }
  public function testBinarySearchWhenNeedleExistsInArrayWithDupesWhenNeedleIsNotOneOfTheDupes(){
    $needle = 'john@gmail.com';
    $haystack = array(
      'aaron@gmail.com',
      'james@gmail.com',
      'james@gmail.com',
      'john@gmail.com',
      'michael@gmail.com',
      'michael@gmail.com',
      'peter@gmail.com',
      'peter@gmail.com',
    );
    $this->assertEquals(3, BinarySearch::binarySearch($needle, $haystack, null, count($haystack) -1, 0, false));
  }
  public function testBinarySearchWhenNeedleExistsInArrayWithDupesWhenNeedleIsOneOfTheDupes(){
    $needle = 'peter@gmail.com';
    $haystack = array(
      'aaron@gmail.com',
      'james@gmail.com',
      'james@gmail.com',
      'john@gmail.com',
      'michael@gmail.com',
      'michael@gmail.com',
      'peter@gmail.com',
      'peter@gmail.com',
    );
    $this->assertEquals(6, BinarySearch::binarySearch($needle, $haystack, null, count($haystack) -1, 0, false));
  }
}
