<?php


namespace Imenso\Meta\Tests\SetAndGet;

use Imenso\Meta\Models\Meta;
use Imenso\Meta\Tests\TestingHelpers;

class TestCascadeMeta extends TestingHelpers
{

    public function test_that_if_an_model_will_be_deleted_all_associated_meta_will_be_deleted_too()
    {
        $model = \Imenso\Meta\Models\ExampleModel::factory()->create();
        $model->setMeta([
            'key1' => 'value1',
            'key2' => 'value2',
        ]);
        $this->assertEquals(1, \Imenso\Meta\Models\ExampleModel::count());
        $this->assertEquals(2, Meta::count());
        $model->delete();
        $this->assertEquals(0, \Imenso\Meta\Models\ExampleModel::count());
        $this->assertEquals(0, Meta::count());
    }

    public function if_a_model_item_was_deleted_other_items_model_will_not_be_deleted()
    {
        $model = \Imenso\Meta\Models\ExampleModel::factory()->create();
        $model2 = \Imenso\Meta\Models\ExampleModel::factory()->create();
        $model2->setMeta([
            'key1' => 'value1',
            'key2' => 'value2',
        ]);
        $this->assertEquals(1, \Imenso\Meta\Models\ExampleModel::count());
        $this->assertEquals(2, Meta::count());
        $model->delete();
        $this->assertEquals(0, \Imenso\Meta\Models\ExampleModel::count());
        $this->assertEquals(2, Meta::count());
    }
}
