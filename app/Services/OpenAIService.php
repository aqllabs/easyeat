<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class OpenAIService
{
    private PendingRequest $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    public function completion($prompt, $model = 'gpt-3.5-turbo')
    {
        return $this->client->post(config('services.openai.urls.completion'),
            [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an amazing social media content creator',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.5,
                'max_tokens' => 1000,
                'top_p' => 0.5,
                'frequency_penalty' => 0.5,
                'presence_penalty' => 0.5,
            ])->json();
    }

    public function textToSpeech($text): PromiseInterface|Response
    {
        return $this->client->post(config('services.openai.urls.text-to-speech'),
            [
                'model' => config('services.openai.models.tts-1'),
                'input' => $text,
                'voice' => 'alloy',
            ]);
    }

    public function images($prompt)
    {
        return $this->client->post(config('services.openai.urls.images'),
            [
                'prompt' => $prompt,
                'n' => 1,
                'size' => '512x512',
            ])->json();
    }
}
