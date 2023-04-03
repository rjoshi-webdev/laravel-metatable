<?php


namespace Imenso\Meta\Models;


use Illuminate\Database\Eloquent\Model;
use Imenso\Metable;

class CustomMetaTableModel extends Model
{
    use Metable;

    protected $metaTable = 'tests_meta';
    protected $table = 'model';
    protected $fillable = ['title'];
}