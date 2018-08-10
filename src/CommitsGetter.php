<?php

namespace Anddroid97\CommitsGetter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Anddroid97\CommitsGetter\TestModel\CommitInfo;

class CommitsGetter implements  CommitsGetterInterface
{
    private $repositoryName;

    public function __construct(string $repositoryName)
    {
        $this->repositoryName = $repositoryName;
    }

    public function fetchCommitsList(): ?array
    {
        $client = new Client();
        $endpoint = 'https://api.github.com/repos/'.$this->repositoryName.'/commits';

        try {
            $response = $client->request('GET', $endpoint);
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return null;
            }
        }

        $json = (string)$response->getBody();
        $commitsInfo = \json_decode($json, true);

        $filteredCommitsRepository = [];

        //TODO: below you can use your model with setters and set what kind of info you need from commit
        foreach ($commitsInfo as $commit) {
            $commitObj = new CommitInfo();
            $commitObj->setHash($commit['sha']);
            $commitObj->setAuthor($commit['commit']['author']['name']);
            $commitObj->setMessage($commit['commit']['message']);
            $filteredCommitsRepository[] = $commitObj;
        }

        return $filteredCommitsRepository;
    }

}
