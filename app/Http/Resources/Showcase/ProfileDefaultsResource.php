<?php

namespace App\Http\Resources\Showcase;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Mirrors ProfileDefaults in resources/js/types/showcase.ts.
 *
 * @property array{display_name: string, bio: string} $resource
 */
class ProfileDefaultsResource extends JsonResource
{
    /**
     * @return array{display_name: string, bio: string}
     */
    public function toArray(Request $request): array
    {
        return [
            'display_name' => $this->resource['display_name'],
            'bio' => $this->resource['bio'],
        ];
    }
}
