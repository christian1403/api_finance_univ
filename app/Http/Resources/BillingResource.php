<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function withResponse(Request $request, $response): void
    {
        $response->setData(array_merge([
            'status' => true,
            'message' => 'Billing retrieved successfully',
        ], $response->getData(true)));
    }
}
