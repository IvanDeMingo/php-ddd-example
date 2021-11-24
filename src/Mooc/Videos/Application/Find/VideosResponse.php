<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

final class VideosResponse
{
    public function __construct(private array $videoResponses)
    {
    }

    public function videoResponses(): array
    {
        return $this->videoResponses;
    }
}