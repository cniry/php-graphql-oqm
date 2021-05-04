<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class WithListValueInputObject extends InputObject
{
    protected array $listOne;

    public function setListOne(array $listOne): self
    {
        $this->listOne = $listOne;

        return $this;
    }
}
