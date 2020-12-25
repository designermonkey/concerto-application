<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use PHPUnit\Framework\TestCase;

class ResponsePayloadTest extends TestCase
{
    /**
     * @dataProvider singleModelProvider
     */
    public function testThatResponsePayloadIsAccessedByStatus(string $status, Model $model)
    {
        $payload = new ResponsePayload(
            $statusInstance = new Status($status),
            $model
        );
        $storedStatus = $payload->status();

        $this->assertTrue($statusInstance->equals($storedStatus));
        $this->assertIsIterable($payload);

        foreach ($payload as $storedModel) {
            $this->assertTrue($model->equals($storedModel));
        }
    }

    public function singleModelProvider(): array
    {
        return [
            [Status::CREATED, new DummyModel],
            [Status::NOT_CREATED, new DummyModel],
            [Status::FOUND, new DummyModel],
            [Status::NOT_FOUND, new DummyModel],
            [Status::CHANGED, new DummyModel],
            [Status::NOT_CHANGED, new DummyModel],
            [Status::REMOVED, new DummyModel],
            [Status::NOT_REMOVED, new DummyModel],
            [Status::COLLECTION, new DummyModel],
            [Status::EMPTY, new DummyModel],
        ];
    }
}
