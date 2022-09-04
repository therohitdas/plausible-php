<?php

namespace Plausible\Support;

class Metric
{
    public const VISITORS = 'visitors';
    public const PAGEVIEWS = 'pageviews';
    public const BOUNCE_RATE = 'bounce_rate';
    public const VISIT_DURATION = 'visit_duration';
    public const EVENTS = 'events';
    public const VISITS = 'visits';

    public const SUPPORTED_METRICS = [
        self::VISITORS,
        self::PAGEVIEWS,
        self::BOUNCE_RATE,
        self::VISIT_DURATION,
        self::EVENTS,
        self::VISITS,
    ];

    private array $metrics;

    private function __construct()
    {
        $this->metrics = [];
    }

    public static function create(): self
    {
        return new self();
    }

    public function add(string $metric): self
    {
        $metrics = clone $this;

        $metrics->metrics[] = $metric;

        return $metrics;
    }

    public function toString(): string
    {
        return implode(',', $this->metrics);
    }

    public function __toString()
    {
        return $this->toString();
    }
}