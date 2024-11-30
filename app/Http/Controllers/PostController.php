<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    //
    protected $PostRepository;
    function __construct(PostRepository $postRepository)
    {
        $this->PostRepository = $postRepository;
    }

    function index()
    {
        $post = $this->PostRepository->getAll();
        return Response()->json($post);
    }

    function show($id)
    {
        $post = $this->PostRepository->findById($id);
        return Response()->json($post);
    }

    function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|max:256",
            "content" => "required|string|max:256"
        ]);

        $post = $this->PostRepository->CreateData($data);
        return Response()->json($post);
    }

    function update(Request $request,$id)
    {
        $data = $request->validate([
            "title"=>"required|string",
            "content"=>"required|string"
        ]);

        $post = $this->PostRepository->updateData($id,$data);
        return Response()->json($post);
    }

    function destroy($id)
    {
        $post = $this->PostRepository->deleteData($id);
        return $post['id'];
    }
}
