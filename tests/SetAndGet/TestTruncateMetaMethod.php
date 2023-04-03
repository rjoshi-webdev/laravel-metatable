<?php


namespace Zoha\Meta\Tests\SetAndGet;


use Zoha\Meta\Models\Meta;
use Zoha\Meta\Models\ExampleModel;
use Zoha\Meta\Tests\TestingHelpers;

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
