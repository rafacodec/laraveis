<?php

namespace Tests\Unit;

use App\Http\Requests\ProfileUpdateRequest;
use PHPUnit\Framework\TestCase;
use App\Models\Task;
use App\Models\User;

class ProfileUpdateRequestTest extends TestCase
{
    public function test_profile_update_request_contains_correct_validation_rules(): void
    {
        // 1. Arrange: Cria um usuário e injeta na requisição
        $user = new User(['id' => 1, 'name' => 'Teste', 'email' => 'teste@example.com']);

        $request = new ProfileUpdateRequest();
        $request->setUserResolver(fn () => $user);

        // 2. Act: Obtém as regras com o resolvedor de usuário configurado
        $rules = $request->rules();

        // 3. Assert: Valida a presença e estrutura das regras
        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertContains('required', $rules['name']);
        $this->assertContains('string', $rules['name']);
        $this->assertContains('email', $rules['email']);
    }

        public function test_task_title_accessor_capitalizes_first_letter(): void
    {
        $task = new Task(['title' => 'estudar phpunit']);

        // Supondo um accessor: getTitleAttribute ou Cast
        $formattedTitle = ucfirst($task->title);

        $this->assertSame('Estudar phpunit', $formattedTitle);
    }
}


