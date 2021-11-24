<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

use CodelyTv\Mooc\Videos\Domain\VideoRepository;

final class AllVideosFinder
{
    public function __construct(private VideoRepository $repository)
    {
    }

    public function __invoke()
    {
        return $this->repository->searchAll();
    }
}