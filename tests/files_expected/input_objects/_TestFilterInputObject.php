<?php

namespace GraphQL\Tests\SchemaObject;

use GraphQL\SchemaObject\InputObject;

class _TestFilterInputObject extends InputObject
{
    protected $first_name;
    protected $lastName;
    protected array $ids;
    protected _TestFilterInputObject $testFilter;

    public function setFirstName($firstName): self
    {
        $this->first_name = $firstName;

        return $this;
    }

    public function setLastName($lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setIds(array $ids): self
    {
        $this->ids = $ids;

        return $this;
    }

    public function setTestFilter(_TestFilterInputObject $testFilterInputObject): self
    {
        $this->testFilter = $testFilterInputObject;

        return $this;
    }
}
