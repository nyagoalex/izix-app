<?php

namespace App\Domain\Article\Http\Resources;

use App\Domain\Comment\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VistorArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "author" => $this->author,
            "content" => $this->content,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "comments" =>  CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
