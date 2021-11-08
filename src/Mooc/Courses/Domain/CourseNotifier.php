<?php

namespace CodelyTv\Mooc\Courses\Domain;

interface CourseNotifier
{
    public function notify(string $message);
}