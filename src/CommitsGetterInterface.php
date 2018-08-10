<?php

namespace Anddroid97\CommitsGetter;

interface CommitsGetterInterface
{
    /**
     * CommitGetterInterface constructor.
     *
     * Get repository name.Inside the implemented class you must instance your model,
     * which has properties of what kind of info from commit you need( e.g $author, $hash)
     * with setters and getters methods
     * CommitInfo model  in TestModel directory given as an example
     *
     * @param string $repositoryName
     */
    public function __construct(string $repositoryName);

    /**
     * Return array of commits objects with info or nothing if repository does not exist.
     *
     * @return array|null
     */
    function fetchCommitsList(): ?array;
}