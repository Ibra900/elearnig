<?php

namespace Database\Factories;

use App\Models\Boxmail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BoxmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Boxmail::class;
    public function definition()
    {
        return [
            'sender' => fake()->name(),
            'receiver' => 'E_learning',
            'senderEmail' => fake()->safeEmail(),
            'receiverEmail' => "e_learning@example.com",
            'subject' => fake()->sentence(),
            'message' => fake()->sentence(),
        ];
    }
}
