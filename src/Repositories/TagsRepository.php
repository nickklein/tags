<?php

namespace NickKlein\Tags\Repositories;

use NickKlein\Habits\Models\HabitTime;
use NickKlein\Habits\Models\HabitTimesTag;
use NickKlein\Tags\Models\Tags;
use NickKlein\Tags\Models\UserTags;
use Illuminate\Database\Eloquent\Collection;

class TagsRepository
{
    /**
     * Find Tag
     *
     * @return collection
     */
    public function findTag(string $tag)
    {
        return Tags::where('tag_name', $tag)->first();
    }

    /**
     * Find Tag
     *
     * @return collection
     */
    public function findUserTag(int $userId, int $tagId)
    {
        return UserTags::where('tag_id', $tagId)
            ->where('user_id', $userId)
            ->first();
    }

    /**
     * create tags for user
     *
     * @return collection
     */
    public function createUserTag(int $userId, string $tagName)
    {
        // Find Tag through repo
        $tags = Tags::firstOrCreate([
            'tag_name' => $tagName
        ]);

        return UserTags::create([
            'tag_id' => $tags->tag_id,
            'user_id' => $userId,
        ]);
    }

    /**
     * Get list of personalized tags
     *
     * @return collection
     */
    public function listTags(int $userId)
    {
        return UserTags::get()
            ->load('tag')
            ->where('user_id', $userId);
    }
}
