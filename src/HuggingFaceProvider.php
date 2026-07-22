<?php

declare(strict_types=1);

namespace AiSdk\HuggingFace;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\HuggingFace\Models\HuggingFaceTextModel;

final class HuggingFaceProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly HuggingFaceOptions $options) {}
    public function name(): string
    {
        return HuggingFaceOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new HuggingFaceTextModel($modelId, $this->options);
    }
}
