<?php

namespace NickKlein\Tags\Services;

use NickKlein\Tags\Repositories\TagsRepository;
use Exception;

class TagsService
{
    private $repository;

    public function __construct(TagsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * destroy tags for user
     *
     * @return collection
     */
    public function destroyUserTag(int $userId, string $tagName): array
    {
        $tag = $this->repository->findTag($tagName);
        if (empty($tag)) {
            return [];
        }

        $userTag = $this->repository->findUserTag($userId, $tag->tag_id);
        if (!$userTag->delete()) {
            return [];
        }

        return ['action' => 'success'];
    }
}
