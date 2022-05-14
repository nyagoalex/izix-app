<?php

namespace App\Domain\Article\DataTransferObjects;

class ArticleData
{
    public function __construct(
        public string  $title,
        public string  $author,
        public string     $content,
    ) {
    }

    public function toArray()
    {
        return (array) $this;
    }
}
