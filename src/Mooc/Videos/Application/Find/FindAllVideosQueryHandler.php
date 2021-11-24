<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Application\Find;

use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindAllVideosQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(AllVideosFinder $finder)
    {
        $this->finder = pipe($finder, new VideosResponseConverter(new VideoResponseConverter()));
    }

    public function __invoke()
    {
        return apply($this->finder);
    }
}