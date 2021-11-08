<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Videos;

use CodelyTv\Mooc\Videos\Application\Find\FindLastPublishedVideoQuery;
use CodelyTv\Mooc\Videos\Application\Find\VideoResponse;
use CodelyTv\Mooc\Videos\Domain\LastPublishedVideoNotFound;
use CodelyTv\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LastPublishedVideoGetController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        /** @var VideoResponse $response */
        $response = $this->ask(new FindLastPublishedVideoQuery());

        return new JsonResponse([
            'id' => $response->id(),
            'type' => $response->type(),
            'title' => $response->title(),
            'url' => $response->url(),
            'courseId' => $response->courseId(),
        ]);
    }

    protected function exceptions(): array
    {
        return [
            LastPublishedVideoNotFound::class => Response::HTTP_NOT_FOUND,
        ];
    }
}