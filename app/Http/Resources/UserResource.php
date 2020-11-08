<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public $token;

    public function __construct($resource, $token = 'null')
    {
        $this->token = $token;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->token == 'null') {
            return [
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
            ];
        } else {
            return [
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'api_token' => $this->token
            ];
        }

    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
