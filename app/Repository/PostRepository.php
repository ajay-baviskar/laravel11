<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    function getAll()
    {
        $getAllPost = Post::all();
        return $getAllPost;
    }

    function findById($id)
    {
        $findData = Post::findOrFail($id);
        return $findData;
    }

    function CreateData(array $data)
    {
        $createData = Post::create($data);
        return $createData;
    }

    function updateData($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    function deleteData($id)
    {
        $deleteData = Post::findOrFail($id);
        $deleteData->delete();
        return $deleteData;

    }
}
