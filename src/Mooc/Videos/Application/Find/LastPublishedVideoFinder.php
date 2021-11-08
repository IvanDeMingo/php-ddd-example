<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

use CodelyTv\Mooc\Videos\Domain\LastPublishedVideoFinder as DomainVideoFinder;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;

final class LastPublishedVideoFinder
{
    private DomainVideoFinder $finder;

    public function __construct(VideoRepository $repository)
    {
        $this->finder = new DomainVideoFinder($repository);
    }

    public function __invoke()
    {
        return $this->finder->__invoke();
    }
}
