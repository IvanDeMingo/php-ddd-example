<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

final class BackofficeCourseNameModifiedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $name,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['name'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'backoffice_course.name.modified';
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}