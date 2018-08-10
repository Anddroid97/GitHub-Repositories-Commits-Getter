<?php
namespace Anddroid97\CommitsGetter;

interface CommitsGetterInterface
{
    /**
     * CommitsGetterInterface constructor.
     *
     * Get Repository name and model(object) of commit
     * where properties are what kind of info from commit
     * you want to get ( e.g. $author , $hash ) whit getters and setters for these properties.
     *
     * @param string $repositoryName
     */
    public function __construct(string $repositoryName);

    /**
     * Return array of commits with info or nothing ,if repository does not exists.
     *
     * @return array|null
     */
    function fetchCommitsList(): ?array;

}