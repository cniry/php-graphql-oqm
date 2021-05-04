<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\ArgumentsObject;

class WithMultipleInputObjectArgsArgumentsObject extends ArgumentsObject
{
    protected SomeInputObject $objectProperty;
    protected AnotherInputObject $another_object_property;

    public function setObjectProperty(SomeInputObject $someInputObject): self
    {
        $this->objectProperty = $someInputObject;

        return $this;
    }

    public function setAnotherObjectProperty(AnotherInputObject $anotherInputObject): self
    {
        $this->another_object_property = $anotherInputObject;

        return $this;
    }
}
