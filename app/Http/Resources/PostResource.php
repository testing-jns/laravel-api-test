<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    private bool $success;
    private string $message;
    
    /**
     * __construct
     * 
     * @param bool $success
     * @param string $message
     * @param mixed$resource
     * @return void
     */
    public function __construct(bool $success, string $message, mixed $resource) {
        parent::__construct($resource);
        $this->success = $success;
        $this->message = $message;
    }
  
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'meta' => [
                'description' => '',
                'total' => $this->resource->count()
            ],
            'data' => $this->resource
        ];
    }
}
