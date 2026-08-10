<?php

namespace App\Support;

use RuntimeException;

class TutorialRepository
{
    public function all(bool $includeUnpublished = false): array
    {
        $path = base_path('content/tutorials/tutorials.json');
        $tutorials = json_decode(file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);

        if (! is_array($tutorials)) {
            throw new RuntimeException('The tutorial catalogue must contain an array.');
        }

        $tutorials = array_values(array_filter(
            $tutorials,
            fn (array $tutorial): bool => $includeUnpublished || ($tutorial['published'] ?? false) === true,
        ));

        usort($tutorials, fn (array $a, array $b): int => strcmp($b['published_at'] ?? '', $a['published_at'] ?? ''));

        return $tutorials;
    }

    public function findPublished(string $slug): ?array
    {
        foreach ($this->all() as $tutorial) {
            if (($tutorial['slug'] ?? null) === $slug) {
                return $tutorial;
            }
        }

        return null;
    }
}
