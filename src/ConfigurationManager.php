<?php

namespace GraphQL;

use GraphQL\SchemaGenerator\CodeGenerator\ObjectBuilderInterface;

class ConfigurationManager
{
    public const CLI = 'cli';
    public const ENDPOINT_URL = 'url';
    public const HEADER_NAME = 'headername';
    public const HEADER_VALUE = 'headervalue';
    public const CLASS_NAMESPACE = 'namespace';
    public const EXPORT_DIR = 'dir';

    private function getRequiredArguments(): array
    {
        return [
            self::ENDPOINT_URL => 'GraphQL endpoint URL',
            self::EXPORT_DIR => 'Custom classes writing dir'
        ];
    }

    private function getAdditionalArguments(): array
    {
        return [
            self::HEADER_NAME => 'Authorization header name',
            self::HEADER_VALUE => 'Authorization header value',
            self::CLASS_NAMESPACE => 'Generated classes namespace (default is '.ObjectBuilderInterface::DEFAULT_NAMESPACE.')',
        ];
    }

    private function getFlagArguments(): array
    {
        return [
            self::CLI => 'Command line mode',
        ];
    }

    private const REQUIRED_ARGUMENT_FLAG = ':';
    private const ADDITIONAL_ARGUMENT_FLAG = '::';

    public function buildConfiguration(): array
    {
        $requiredArguments = $this->getRequiredArguments();
        $additionalParameters = $this->getAdditionalArguments();

        $longOpts = array_merge(
            array_map(function ($value) {
                return $value . self::REQUIRED_ARGUMENT_FLAG;
            }, array_keys($requiredArguments)),

            array_map(function ($value) {
                return $value . self::ADDITIONAL_ARGUMENT_FLAG;
            }, array_keys($additionalParameters)),

            array_map(function ($value) {
                return $value . self::ADDITIONAL_ARGUMENT_FLAG;
            }, array_keys($this->getFlagArguments()))
        );

        $currentArgs = getopt('', $longOpts);

        $isCliMode = array_key_exists(self::CLI, $currentArgs);

        $configuration = [
            self::CLI => $isCliMode,
        ];

        foreach ($requiredArguments as $paramName => $label) {
            $configuration[$paramName] = !empty($currentArgs[$paramName]) ? $currentArgs[$paramName] : $this->missingValue($isCliMode, $paramName, $label);
        }

        foreach ($additionalParameters as $paramName => $label) {
            $configuration[$paramName] = !empty($currentArgs[$paramName])
                ? $currentArgs[$paramName]
                : ($configuration[self::CLI] ? null : $this->missingValue($isCliMode, $paramName, $label));
        }
        return $configuration;
    }

    private function missingValue(bool $isCliMode, string $name, string $label): string
    {
        if ($isCliMode) {
            throw new \Exception('Required argument "%s" - %s, is missing.', $name, $label);
        }
        return readline($label . ': ') ?: '';
    }

}
