<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\QueryObject;

class SimpleSelectorQueryObject extends QueryObject
{
    const OBJECT_NAME = 'SimpleSelector';

    public function selectName(): self
    {
        $this->selectField('name');

        return $this;
    }
}
