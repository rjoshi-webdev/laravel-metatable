<?php


namespace Imenso\Meta\Traits;

use Illuminate\Support\Collection;
use Imenso\Meta\Models\Meta;
use Imenso\Meta\Tests\TestingHelpers;

class TestGetMetasMethod extends TestingHelpers
{

    public function test_that_get_metas_method_will_return_all_metas()
    {
        $model = \Imenso\Meta\Models\ExampleModel::factory()->create();
        $model->setMeta([
            'key1' => 'value1',
            'key2' => 'value2',
        ]);

        $metas = $model->getMetas();

        $this->assertTrue($metas instanceof Collection);
        $this->assertCount(2, $metas);
    }

    public function test_that_get_metas_method_will_return_an_empty_collection_if_no_metas_was_set_yet()
    {
        $model = \Imenso\Meta\Models\ExampleModel::factory()->create();

        $metas = $model->getMetas();

        $this->assertTrue($metas instanceof Collection);
        $this->assertCount(0, $metas);
    }
}
