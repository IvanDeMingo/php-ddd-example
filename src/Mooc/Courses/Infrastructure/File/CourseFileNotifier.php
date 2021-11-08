<?php

namespace CodelyTv\Mooc\Courses\Infrastructure\File;

use CodelyTv\Mooc\Courses\Domain\CourseNotifier;

class CourseFileNotifier implements CourseNotifier
{
    private const FILE = __DIR__ . '../../../../../courses_notifications.txt';

    public function notify(string $message)
    {
        file_put_contents(self::FILE, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}