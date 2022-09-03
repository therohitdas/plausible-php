<?php

namespace Plausible\Support;

use LogicException;

class Filters
{
    public const EQUAL = '=';
    public const NOT_EQUAL = '!=';

    public const SUPPORTED_COMPARISONS = [
        self::EQUAL,
        self::NOT_EQUAL,
    ];

    private array $filters;

    private function __construct()
    {
        $this->filters = [];
    }

    public static function create(): self
    {
        return new self();
    }

    public function add(string $name, array $values, string $comparison = self::EQUAL): self
    {
        if (! in_array($comparison, self::SUPPORTED_COMPARISONS)) {
            throw new LogicException('Provided comparison is not supported.');
        }

        $filters = clone $this;

        $filters->filters[] = $name . ($comparison === self::EQUAL ? '=' : '!=') . implode('|', $values);

        return $filters;
    }

    public function __toString()
    {
        return implode(';', $this->filters);
    }
}