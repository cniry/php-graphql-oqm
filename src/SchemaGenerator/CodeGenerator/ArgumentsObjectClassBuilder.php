<?php

namespace GraphQL\SchemaGenerator\CodeGenerator;

use GraphQL\SchemaGenerator\CodeGenerator\CodeFile\ClassFile;
use GraphQL\Util\StringLiteralFormatter;

/**
 * Class ArgumentsObjectClassBuilder
 *
 * @package GraphQL\SchemaGenerator\CodeGenerator
 */
class ArgumentsObjectClassBuilder extends ObjectClassBuilder
{
    /**
     * ArgumentsObjectClassBuilder constructor.
     *
     * @param string $writeDir
     * @param string $objectName
     * @param string $namespace
     */
    public function __construct(string $writeDir, string $objectName, string $namespace = self::DEFAULT_NAMESPACE)
    {
        $this->classFile = new ClassFile($writeDir, $objectName);
        $this->classFile->setNamespace($namespace);
        if ($namespace !== self::DEFAULT_NAMESPACE) {
            $this->classFile->addImport('GraphQL\\SchemaObject\\ArgumentsObject');
        }
        $this->classFile->extendsClass('ArgumentsObject');
    }

    /**
     * @param string $argumentName
     */
    public function addScalarArgument(string $argumentName, string $type)
    {
        $upperCamelCaseArg = StringLiteralFormatter::formatUpperCamelCase($argumentName);
        $this->addProperty($argumentName, $type);
        $this->addScalarSetter($argumentName, $upperCamelCaseArg, $type);
    }

    /**
     * @param string string $argumentName
     * @param string string $typeName
     */
    public function addListArgument(string $argumentName, string $typeName)
    {
        $upperCamelCaseArg = StringLiteralFormatter::formatUpperCamelCase($argumentName);
        $this->addProperty($argumentName, $typeName);
        $this->addListSetter($argumentName, $upperCamelCaseArg, $typeName);
    }

    /**
     * @param string $argumentName
     * @param string $typeName
     */
    public function addInputEnumArgument(string $argumentName, string $typeName)
    {
        $upperCamelCaseArg = StringLiteralFormatter::formatUpperCamelCase($argumentName);
        $this->addProperty($argumentName, $typeName);
        $this->addEnumSetter($argumentName, $upperCamelCaseArg, $typeName);
    }

    /**
     * @param string $argumentName
     * @param string $typeName
     */
    public function addInputObjectArgument(string $argumentName, string $typeName)
    {
        $typeName .= 'InputObject';
        $upperCamelCaseArg = StringLiteralFormatter::formatUpperCamelCase($argumentName);
        $this->addProperty($argumentName, $typeName);
        $this->addObjectSetter($argumentName, $upperCamelCaseArg, $typeName);
    }

    /**
     * @return void
     */
    public function build(): void
    {
        $this->classFile->writeFile();
    }
}