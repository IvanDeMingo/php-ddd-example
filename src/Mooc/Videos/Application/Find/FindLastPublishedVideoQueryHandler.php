<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindLastPublishedVideoQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(LastPublishedVideoFinder $finder)
    {
        $this->finder = pipe($finder, new VideoResponseConverter());
    }

    public function __invoke(FindLastPublishedVideoQuery $query): VideoResponse
    {
        return apply($this->finder);
    }
}