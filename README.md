# HuggingFace provider for PHP AI SDK

```bash
composer require aisdk/huggingface
```

```php
use AiSdk\Generate;
use AiSdk\HuggingFace;

HuggingFace::create(['apiKey' => $_ENV['HF_TOKEN']]);

$result = Generate::text('Explain this code briefly.')
    ->model(HuggingFace::model('openai/gpt-oss-120b:fastest'))
    ->run();
```

This package uses Hugging Face Inference Providers' official OpenAI-compatible chat API at `https://router.huggingface.co/v1`. It supports chat and streaming generation; tool calling, structured output, reasoning, and vision input pass through when the selected routed model supports them. The OpenAI-compatible router is chat-only; use a Hugging Face native client for other tasks. See [Hugging Face API documentation](https://huggingface.co/docs/inference-providers/en/index) and [PHP AI SDK documentation](https://phpaisdk.com/docs/huggingface).
