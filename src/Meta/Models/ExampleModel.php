<?php


namespace Imenso\Meta\Models;

use Illuminate\Database\Eloquent\Model;
use Imenso\Meta\Database\Factories\ExampleModelFactory;
use Imenso\Metable;

class ExampleModel extends Model
{
    protected $table = 'model';
    protected $fillable = ['title'];

    use Metable;

    public static function factory()
    {
        return ExampleModelFactory::new();
    }
}
