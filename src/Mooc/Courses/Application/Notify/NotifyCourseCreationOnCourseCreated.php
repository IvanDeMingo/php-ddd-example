<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application\Notify;

use CodelyTv\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class NotifyCourseCreationOnCourseCreated implements DomainEventSubscriber
{
    public function __construct(private CourseNotifier $notifier)
    {
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $courseId = new CourseId($event->aggregateId());

        apply($this->notifier, [$courseId, $event->occurredOn()]);
    }
}
