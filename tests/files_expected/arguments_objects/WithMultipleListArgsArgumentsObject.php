<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\ArgumentsObject;

class WithMultipleListArgsArgumentsObject extends ArgumentsObject
{
    protected $listProperty;
    protected $another_list_property;

    public function setListProperty(array $listProperty): self
    {
        $this->listProperty = $listProperty;

        return $this;
    }

    public function setAnotherListProperty(array $anotherListProperty): self
    {
        $this->another_list_property = $anotherListProperty;

        return $this;
    }
}
