<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application\Notify;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseNotifier as DomainCourseNotifier;

final class CourseNotifier
{
    public function __construct(
        private DomainCourseNotifier $notifier
    ) {
    }

    public function __invoke(CourseId $courseId, string $occurredOn): void
    {
        $this->notifier->notify(sprintf('Course with id %s was created on %s', $courseId->value(), $occurredOn));
    }
}
