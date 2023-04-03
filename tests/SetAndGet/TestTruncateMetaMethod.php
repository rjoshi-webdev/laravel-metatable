<?php


namespace Imenso\Meta\Tests\SetAndGet;


use Imenso\Meta\Models\Meta;
use Imenso\Meta\Models\ExampleModel;
use Imenso\Meta\Tests\TestingHelpers;

class TestTruncateMetaMethod extends TestingHelpers
{

    //----------------------------------------- Properties ------------------------------------------//

    protected $model;

    //------------------------------------------ Methods --------------------------------------------//

    public function setUp(): void
    {
        parent::setUp();
        $this->modelTruncate();
        $this->metaTruncate();
        $this->model = ExampleModel::factory()->create();
    }

    public function test_trunate_meta_method()
    {
        $this->model->createMeta([
            'test' => 'testvalue',
            'test2' => 'testvalue2',
            'test3' => 'testvalue3'
        ]);
        $this->assertEquals(3, Meta::count());

        $this->model->truncateMeta();

        $this->assertEquals(0, $this->model->getLoadedMeta()->count());
        $this->assertEquals(0, Meta::count());
    }
}
