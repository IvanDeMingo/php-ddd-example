<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Domain;

final class LastPublishedVideoFinder
{
    public function __construct(private VideoRepository $repository)
    {
    }

    public function __invoke(): Video
    {
        $video = $this->repository->searchLastPublished();

        if (null === $video) {
            throw new LastPublishedVideoNotFound();
        }

        return $video;
    }
}
