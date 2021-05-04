<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class WithEnumValueInputObject extends InputObject
{
    protected $enumVal;

    public function setEnumVal($enumVal): self
    {
        $this->enumVal = $enumVal;

        return $this;
    }
}
