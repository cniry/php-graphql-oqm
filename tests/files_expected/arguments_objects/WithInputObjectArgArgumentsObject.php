<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\ArgumentsObject;

class WithInputObjectArgArgumentsObject extends ArgumentsObject
{
    protected SomeInputObject $objectProperty;

    public function setObjectProperty(SomeInputObject $someInputObject): self
    {
        $this->objectProperty = $someInputObject;

        return $this;
    }
}
