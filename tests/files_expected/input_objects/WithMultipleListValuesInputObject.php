<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class WithMultipleListValuesInputObject extends InputObject
{
    protected array $listOne;
    protected array $list_two;

    public function setListOne(array $listOne): self
    {
        $this->listOne = $listOne;

        return $this;
    }

    public function setListTwo(array $listTwo): self
    {
        $this->list_two = $listTwo;

        return $this;
    }
}
