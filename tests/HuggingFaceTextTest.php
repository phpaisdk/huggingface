<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\HuggingFace;
use AiSdk\HuggingFace\Tests\Fakes\FakeHttpClient;
use AiSdk\Support\Sdk;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    HuggingFace::reset();
});
it('uses HuggingFace general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'huggingface-chat', 'model' => 'gpt-oss-120b', 'choices' => [['message' => ['content' => 'Hello from HuggingFace Inference'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    HuggingFace::create(['apiKey' => 'huggingface-test']);
    $result = Generate::text('Hi')->model(HuggingFace::model('gpt-oss-120b'))->run();
    expect($result->text)->toBe('Hello from HuggingFace Inference')->and((string) $client->lastRequest?->getUri())->toBe('https://router.huggingface.co/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer huggingface-test')->and($client->sentBody()['model'])->toBe('gpt-oss-120b');
});
it('accepts opaque HuggingFace model identifiers', function (): void {
    HuggingFace::create(['apiKey' => 'huggingface-test']);
    expect(HuggingFace::model('private-gpt-oss-120b-model')->modelId())->toBe('private-gpt-oss-120b-model');
});
