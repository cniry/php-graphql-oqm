<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class WithInputObjectValueInputObject extends InputObject
{
    protected WithListValueInputObject $inputObject;

    public function setInputObject(WithListValueInputObject $withListValueInputObject): self
    {
        $this->inputObject = $withListValueInputObject;

        return $this;
    }
}
