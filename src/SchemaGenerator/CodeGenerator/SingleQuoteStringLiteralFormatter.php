<?php

namespace GraphQL\SchemaGenerator\CodeGenerator;

class SingleQuoteStringLiteralFormatter
{

    /**
     * Converts the value provided to the equivalent RHS value to be put in a file declaration
     *
     * @param string|int|float|bool $value
     *
     * @return string
     */
    public static function formatValueForRHS($value): string
    {
        if (is_string($value)) {
            if (!self::isVariable($value)) {
                $value = str_replace('\'', '\'', $value);
                if (strpos($value, "\n") !== false) {
                    $value = '\'' . $value . '\'';
                } else {
                    $value = "'$value'";
                }
            }
        } elseif (is_bool($value)) {
            if ($value) {
                $value = 'true';
            } else {
                $value = 'false';
            }
        } elseif ($value === null) {
            $value = 'null';
        } else {
            $value = (string) $value;
        }

        return $value;
    }

    /**
     * Treat string value as variable if it matches variable regex
     *
     * @param string $value
     *
     * @return bool
     */
    public static function isVariable(string $value): bool {
        return preg_match('/^\$[_A-Za-z][_0-9A-Za-z]*$/', $value);
    }
}
