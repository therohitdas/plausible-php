<?php

namespace Plausible\Response;

/**
 * @property AggregatedMetric $visitors
 * @property AggregatedMetric $pageviews
 * @property AggregatedMetric $bounce_rate
 * @property AggregatedMetric $visit_duration
 * @property AggregatedMetric $events
 * @property AggregatedMetric $visits
 */
class AggregatedMetrics extends BaseObject
{
    /**
     * @param string $json
     * @return static
     */
    public static function fromApiResponse(string $json): self
    {
        $data = json_decode($json, true)['results'];

        $aggregated_metrics = new self();

        $aggregated_metrics->createProperties($data);

        return $aggregated_metrics;
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    protected function createProperty($name, $value): void
    {
        $this->$name = AggregatedMetric::fromArray($value);
    }
}