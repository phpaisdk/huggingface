# aisdk/huggingface

<a href="https://github.com/phpaisdk/huggingface/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/huggingface/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/huggingface"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/huggingface"></a>
<a href="https://packagist.org/packages/aisdk/huggingface"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/huggingface"></a>

------

Official Hugging Face provider for the PHP AI SDK. Uses Hugging Face Inference Providers' OpenAI-compatible router.

## Installation

```bash
composer require aisdk/huggingface
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\HuggingFace;

HuggingFace::create(['apiKey' => $_ENV['HF_TOKEN']]);

$result = Generate::text('Explain this code briefly.')
    ->model(HuggingFace::model('openai/gpt-oss-120b:fastest'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `HF_TOKEN` | Hugging Face access token | Required |
| `HUGGINGFACE_BASE_URL` | Base URL for API requests | `https://router.huggingface.co/v1` |

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible router |
| Tool calling, structured output, reasoning, image input | Passed through for supported routed models |

The OpenAI-compatible router package is chat-only. Use a Hugging Face native client for other task types. Use `providerOptions('huggingface', ['raw' => [...]])` for native router fields.

## Documentation

- [Hugging Face Inference Providers documentation](https://huggingface.co/docs/inference-providers/en/index)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/huggingface)
