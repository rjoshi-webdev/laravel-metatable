<?php


namespace Imenso\Meta\Tests\Clauses;


use Imenso\Meta\Models\ExampleModel;
use Imenso\Meta\Tests\TestingHelpers;

class TestOrderByMetaMethod extends TestingHelpers
{
    public function setUp(): void
    {
        parent::setUp();
        $this->modelTruncate();
        $this->metaTruncate();
        $this->seeding();
    }

    public function test_order_by_meta_method()
    {
        $results = ExampleModel::orderByMeta('key1', 'desc')->pluck('id')->toArray();
        $this->assertEquals([4, 2, 3, 1, 5], $results);

        $results = ExampleModel::orderByMeta('key1', 'desc')->orderBy('id', 'desc')->pluck('id')->toArray();
        $this->assertEquals([4, 3, 2, 5, 1], $results);

        $results = ExampleModel::orderByMeta('key1', 'asc')->pluck('id')->toArray();
        $this->assertEquals([1, 5, 2, 3, 4], $results);

        ExampleModel::factory()->create();

        $results = ExampleModel::orderByMeta('key1', 'desc')->pluck('id')->toArray();
        $this->assertEquals([4, 2, 3, 1, 5, 6], $results);

        $results = ExampleModel::orderByMeta('key1', 'asc')->pluck('id')->toArray();
        $this->assertEquals([1, 5, 2, 3, 4, 6], $results);
    }
}
