<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Videos;

use CodelyTv\Mooc\Videos\Application\Find\FindAllVideosQuery;
use CodelyTv\Mooc\Videos\Application\Find\VideoResponse;
use CodelyTv\Mooc\Videos\Application\Find\VideosResponse;
use CodelyTv\Mooc\Videos\Domain\LastPublishedVideoNotFound;
use CodelyTv\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use function Lambdish\Phunctional\map;

final class VideosGetController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        /** @var VideosResponse $response */
        $response = $this->ask(new FindAllVideosQuery());

        return new JsonResponse([
            'videos' => map(
                fn(VideoResponse $response) => [
                    'id' => $response->id(),
                    'type' => $response->type(),
                    'title' => $response->title(),
                    'url' => $response->url(),
                    'courseId' => $response->courseId(),
                ],
                $response->videoResponses()
            )
        ]);
    }

    protected function exceptions(): array
    {
        return [
            LastPublishedVideoNotFound::class => Response::HTTP_NOT_FOUND,
        ];
    }
}