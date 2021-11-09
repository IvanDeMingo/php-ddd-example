<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Application\Modify;

use CodelyTv\Shared\Domain\Bus\Command\Command;

final class ModifyBackofficeCourseNameCommand implements Command
{
    public function __construct(private string $id, private string $name)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}