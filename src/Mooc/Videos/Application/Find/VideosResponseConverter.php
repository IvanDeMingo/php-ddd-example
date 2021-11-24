<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\Videos;
use function Lambdish\Phunctional\map;

final class VideosResponseConverter
{
    public function __construct(private VideoResponseConverter $videoResponseConverter)
    {
    }

    public function __invoke(Videos $videos): VideosResponse
    {
        return new VideosResponse(map(
            fn(Video $video) => $this->videoResponseConverter->__invoke($video),
            $videos
        ));
    }
}