<?php

namespace GraphQL\SchemaGenerator\CodeGenerator;

use GraphQL\SchemaGenerator\CodeGenerator\CodeFile\ClassFile;

/**
 * Class ObjectClassBuilder
 *
 * @package GraphQL\SchemaGenerator\CodeGenerator
 */
abstract class ObjectClassBuilder implements ObjectBuilderInterface
{
    /**
     * @var ClassFile
     */
    protected $classFile;

    protected function addProperty(string $propertyName, string $type = '')
    {
        $this->classFile->addProperty($propertyName, null, $type);
    }

    /**
     * @param string $propertyName
     * @param string $upperCamelName
     */
    protected function addScalarSetter($propertyName, $upperCamelName, $type = '')
    {
        $scalarType = $type ? $type . ' ' : '';
        $lowerCamelName = lcfirst($upperCamelName);
        $method = "public function set$upperCamelName({$scalarType}$$lowerCamelName): self /** addScalarSetter */
{
    \$this->$propertyName = $$lowerCamelName;

    return \$this;
}";
        $this->classFile->addMethod($method);
    }

    /**
     * @param string $propertyName
     * @param string $upperCamelName
     * @param string $propertyType
     */
    protected function addListSetter(string $propertyName, string $upperCamelName, string $propertyType)
    {
        $lowerCamelName = lcfirst($upperCamelName);
        $method = "public function set$upperCamelName(array $$lowerCamelName): self /** addListSetter */
{
    \$this->$propertyName = $$lowerCamelName;

    return \$this;
}";
        $this->classFile->addMethod($method);
    }

    /**
     * @param string $propertyName
     * @param string $upperCamelName
     * @param string $objectClass
     */
    protected function addEnumSetter(string $propertyName, string $upperCamelName, string $objectClass)
    {
        $lowerCamelName = lcfirst(str_replace('_', '', $objectClass));
        $method         = "public function set$upperCamelName($$lowerCamelName): self /** addEnumSetter */
{
    \$this->$propertyName = new RawObject($$lowerCamelName);

    return \$this;
}";
        $this->classFile->addMethod($method);
        $this->classFile->addImport('GraphQL\\RawObject');
    }

    /**
     * @param string $propertyName
     * @param string $upperCamelName
     * @param string $objectClass
     */
    protected function addObjectSetter(string $propertyName, string $upperCamelName, string $objectClass)
    {
        $lowerCamelName = lcfirst(str_replace('_', '', $objectClass));
        $method         = "public function set$upperCamelName($objectClass $$lowerCamelName): self /** addObjectSetter */
{
    \$this->$propertyName = $$lowerCamelName;

    return \$this;
}";
        $this->classFile->addMethod($method);
    }
}