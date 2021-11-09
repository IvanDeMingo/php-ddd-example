<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Application\Modify;

use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class ModifyBackofficeCourseNameCommandHandler implements CommandHandler
{
    public function __construct(private BackofficeCourseNameModifier $modifier)
    {
    }

    public function __invoke(ModifyBackofficeCourseNameCommand $command)
    {
        $this->modifier->__invoke($command->id(), $command->name());
    }
}