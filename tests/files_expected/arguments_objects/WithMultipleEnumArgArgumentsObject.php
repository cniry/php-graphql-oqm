<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\ArgumentsObject;
use GraphQL\RawObject;

class WithMultipleEnumArgArgumentsObject extends ArgumentsObject
{
    protected $enumProperty;

    public function setEnumProperty($some): self
    {
        $this->enumProperty = new RawObject($some);

        return $this;
    }
}
