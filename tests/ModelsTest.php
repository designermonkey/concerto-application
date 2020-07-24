<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use PHPUnit\Framework\TestCase;

class ModelsTest extends TestCase
{
    public function testThatModelsAreIterable()
    {
        $models = new Models(
            $model = new DummyModel('mushroom')
        );

        $this->assertIsIterable($models);

        $iterated = null;

        foreach ($models as $item) {
            $iterated = $item;
        }

        $this->assertSame($model, $iterated);
    }

    public function testThatModelsAreCountable()
    {
        $models = new Models(
            new DummyModel('mushroom')
        );

        $this->assertCount(1, $models);

        $models = new Models(
            new DummyModel('mushroom'),
            new DummyModel('mushroom')
        );

        $this->assertCount(2, $models);
    }

    public function testThatModelsCanBePushedOnto()
    {
        $models = new Models(
            new DummyModel('mushroom')
        );

        $models->push(new DummyModel('badger'));

        $this->assertCount(2, $models);
    }

    public function testThatModelsCanBePoppedFrom()
    {
        $models = new Models(
            new DummyModel('mushroom'),
            $model = new DummyModel('badger')
        );

        $popped = $models->pop();

        $this->assertCount(1, $models);
        $this->assertTrue($model->equals($popped));
    }
}
