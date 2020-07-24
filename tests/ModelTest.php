<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testThatModelCanGetProperties()
    {
        $dummy = new DummyModel('mushroom');

        $this->assertSame('mushroom', $dummy->badger);
    }

    public function testThatModelCannotReplaceAlreadySetProperties()
    {
        $dummy = new DummyModel('mushroom');

        $dummy->badger = 'snaaake!';

        $this->assertSame('mushroom', $dummy->badger);
    }

    public function testThatModelDisplaysEquality()
    {
        $dummyOne = new DummyModel('mushroom');
        $dummyTwo = new DummyModel('mushroom');
        $dummyThree = new DummyModel('snaaake!');

        $this->assertTrue($dummyOne->equals($dummyTwo));
        $this->assertFalse($dummyOne->equals($dummyThree));
    }
}
