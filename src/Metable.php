<?php


namespace Imenso;


use Imenso\Meta\Traits\DeleteMeta;
use Imenso\Meta\Traits\GetMeta;
use Imenso\Meta\Traits\MetableBase;
use Imenso\Meta\Traits\MetaClauses;
use Imenso\Meta\Traits\SetMeta;

trait Metable
{
    use MetableBase, GetMeta, SetMeta, DeleteMeta, MetaClauses;
}