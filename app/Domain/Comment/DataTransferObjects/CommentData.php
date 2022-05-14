<?php

namespace App\Domain\Comment\DataTransferObjects;

class CommentData
{
    public function __construct(
        public string $content,
    ) {
    }

    public function toArray()
    {
        return (array) $this;
    }
}
