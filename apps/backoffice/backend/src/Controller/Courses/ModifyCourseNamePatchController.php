<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Backoffice\Backend\Controller\Courses;

use CodelyTv\Backoffice\Courses\Application\Modify\ModifyBackofficeCourseNameCommand;
use CodelyTv\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ModifyCourseNamePatchController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new ModifyBackofficeCourseNameCommand(
                $id,
                $request->request->getAlpha('name')
            )
        );

        return new Response('', Response::HTTP_NO_CONTENT);
    }

    protected function exceptions(): array
    {
        return [];
    }
}