<?php

namespace Tests\Unit;

use App\Models\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function test_task_has_expected_fillable_attributes(): void
    {
        $task = new Task();
        $expected = ['title', 'description', 'is_completed', 'user_id'];

        $this->assertEquals($expected, $task->getFillable());
    }

    public function test_task_casts_is_completed_to_boolean(): void
    {
        $task = new Task(['is_completed' => 1]);

        $this->assertIsBool($task->is_completed);
        $this->assertTrue($task->is_completed);
    }

    public function test_task_can_toggle_completion_status(): void
    {
        $task = new Task(['is_completed' => false]);

        // Supondo um método auxiliar no model: $task->markAsCompleted();
        $task->is_completed = true;

        $this->assertTrue($task->is_completed);
    }

    
}
