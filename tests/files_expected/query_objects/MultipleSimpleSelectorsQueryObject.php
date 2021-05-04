<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\QueryObject;

class MultipleSimpleSelectorsQueryObject extends QueryObject
{
    const OBJECT_NAME = 'MultipleSimpleSelectors';

    public function selectFirstName(): self
    {
        $this->selectField('first_name');

        return $this;
    }

    /**
     * @deprecated is deprecated
     */
    public function selectLastName(): self
    {
        $this->selectField('last_name');

        return $this;
    }

    public function selectGender(): self
    {
        $this->selectField('gender');

        return $this;
    }
}
