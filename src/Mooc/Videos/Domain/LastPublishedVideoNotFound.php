<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Shared\Domain\DomainError;

final class LastPublishedVideoNotFound extends DomainError
{
    public function errorCode(): string
    {
        return 'last_published_video_not_found';
    }

    protected function errorMessage(): string
    {
        return 'The last published video has not been found';
    }
}
