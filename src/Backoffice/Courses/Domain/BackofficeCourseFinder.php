<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Domain;

final class BackofficeCourseFinder
{
    public function __construct(private BackofficeCourseRepository $repository)
    {
    }

    /** @throws BackofficeCourseNotExists */
    public function __invoke(string $id): BackofficeCourse
    {
        $course = $this->repository->find($id);

        if (null === $course) {
            throw new BackofficeCourseNotExists($id);
        }

        return $course;
    }
}