<?php

namespace Anddroid97\CommitsGetter\TestModel;

class CommitInfo
{
    private $hash;
    private $shortHash;
    private $author;
    private $message;

    public function getHash():string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->setShortHash($hash);
        $this->hash = $hash;
    }

    public function getAuthor():string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public  function setShortHash(string $hash): void
    {
        $this->shortHash = \substr($hash,0, 7);
    }

    public function getShortHash(): string
    {
        return $this->shortHash;
    }

}