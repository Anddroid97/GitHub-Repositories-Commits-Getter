# GitHub-Repositories-Commits-Getter

Simple commit's info getter of any repository on GitHub.



Work with guzzle Client and GitHub API, so you must add dependency if you dont't have:
```
composer require guzzlehttp/guzzle:~6.0
```
Usage
-------

1.Go into Anddroid97\CommitsGetter and make your Model like in example (model depends of what you need to get autor,hash,date or other info of commit):

```php
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
    
    ///Another getters and setters
 }
```


2.Go inside CommitsGetter class and find section //TODO. Change to your model and what you want to find
```php

 //TODO: below you can use your model with setters and set what kind of info you need from commit
  foreach ($commitsInfo as $commit) {
       $commitObj = new CommitInfo();
       $commitObj->setHash($commit['sha']);
       $commitObj->setAuthor($commit['commit']['author']['name']);
       $commitObj->setMessage($commit['commit']['message']);
       $filteredCommitsRepository[] = $commitObj;
  }
```

3. And use it as in index.php

```php
use Anddroid97\CommitsGetter\CommitsGetter;

$commitsList = new CommitsGetter('Anddroid97/GitHub-Repositories-Commits-Getter');

$list = $commitsList->fetchCommitsList();

var_dump($list);
```
Results:
```
[1]=>
  object(Anddroid97\CommitsGetter\TestModel\CommitInfo)#24 (4) {
    ["hash":"Anddroid97\CommitsGetter\TestModel\CommitInfo":private]=>
    string(40) "3fb9292694ac0560fa7d906787aa2726d96e4eef"
    ["shortHash":"Anddroid97\CommitsGetter\TestModel\CommitInfo":private]=>
    string(7) "3fb9292"
    ["author":"Anddroid97\CommitsGetter\TestModel\CommitInfo":private]=>
    string(6) "Andrew"
    ["message":"Anddroid97\CommitsGetter\TestModel\CommitInfo":private]=>
    string(90) "Revert "Add Functionallity"

This reverts commit 147523a8b7c8f80345f869a781874dfab5fd1350."
  }
[2]=>
object(Anddroid97\CommitsGetter\TestModel\CommitInfo)#11 (4) {
["hash":"Anddroid97\CommitsGetter\TestModel\CommitInfo":private]=>
    \\\ etc
```
