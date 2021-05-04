<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\ArgumentsObject;

class WithMultipleScalarArgsArgumentsObject extends ArgumentsObject
{
    protected $scalarProperty;
    protected $another_scalar_property;

    public function setScalarProperty($scalarProperty): self
    {
        $this->scalarProperty = $scalarProperty;

        return $this;
    }

    public function setAnotherScalarProperty($anotherScalarProperty): self
    {
        $this->another_scalar_property = $anotherScalarProperty;

        return $this;
    }
}
