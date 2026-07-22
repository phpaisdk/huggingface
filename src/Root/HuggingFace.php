<?php

declare(strict_types=1);

namespace AiSdk;

use AiSdk\Contracts\Model;
use AiSdk\HuggingFace\HuggingFaceOptions;
use AiSdk\HuggingFace\HuggingFaceProvider;

final class HuggingFace
{
    private static ?HuggingFaceProvider $default = null;
    /** @param array<string, mixed> $config */
    public static function create(array $config = []): HuggingFaceProvider
    {
        return self::$default = new HuggingFaceProvider(HuggingFaceOptions::fromArray($config));
    }
    public static function default(): HuggingFaceProvider
    {
        return self::$default ??= self::create();
    }
    public static function reset(): void
    {
        self::$default = null;
    }
    public static function model(string $modelId): Model
    {
        return self::default()->model($modelId);
    }
}
