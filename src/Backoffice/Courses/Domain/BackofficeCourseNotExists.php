<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Domain;

use CodelyTv\Shared\Domain\DomainError;

final class BackofficeCourseNotExists extends DomainError
{
    public function __construct(private string $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'backoffice_course_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The backoffice course <%s> does not exist', $this->id);
    }
}