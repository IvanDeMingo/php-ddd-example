<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Application\Modify;

use CodelyTv\Backoffice\Courses\Domain\BackofficeCourseFinder;
use CodelyTv\Backoffice\Courses\Domain\BackofficeCourseRepository;

final class BackofficeCourseNameModifier
{
    private BackofficeCourseFinder $finder;

    public function __construct(private BackofficeCourseRepository $repository)
    {
        $this->finder = new BackofficeCourseFinder($repository);
    }

    public function __invoke(string $id, string $name)
    {
        $course = $this->finder->__invoke($id);

        $course->setName($name);

        $this->repository->save($course);
    }
}