<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class WithMultipleInputObjectValuesInputObject extends InputObject
{
    protected WithListValueInputObject $inputObject;
    protected _TestFilterInputObject $inputObjectTwo;

    public function setInputObject(WithListValueInputObject $withListValueInputObject): self
    {
        $this->inputObject = $withListValueInputObject;

        return $this;
    }

    public function setInputObjectTwo(_TestFilterInputObject $testFilterInputObject): self
    {
        $this->inputObjectTwo = $testFilterInputObject;

        return $this;
    }
}
