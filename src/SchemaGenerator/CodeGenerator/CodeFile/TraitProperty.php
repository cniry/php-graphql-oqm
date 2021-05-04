<?php

namespace GraphQL\SchemaGenerator\CodeGenerator\CodeFile;

class TraitProperty
{
    private string $name;
    private $value;
    private ?string $type = null;

    public function __construct(string $name, $value, ?string $type)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

}
