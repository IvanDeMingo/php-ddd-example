<?php

namespace CodelyTv\Tests\Mooc\Courses\Infrastructure\File;

use CodelyTv\Tests\Mooc\Courses\CoursesModuleInfrastructureTestCase;

class CourseFileNotifierTest extends CoursesModuleInfrastructureTestCase
{
    private const MESSAGE = 'integration-test';

    /** @test */
    public function it_should_create_file_and_notify_message()
    {
        $this->notifier()->notify(self::MESSAGE);

        $contents = file_get_contents(__DIR__ . '../../../../../courses_notifications.txt');

        $this->assertEquals(self::MESSAGE . PHP_EOL, $contents);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unlink(__DIR__ . '../../../../../courses_notifications.txt');
    }
}
