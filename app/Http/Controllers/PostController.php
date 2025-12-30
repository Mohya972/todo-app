<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lecture de la liste de posts
        $posts = Post::all();
        // retourner la liste de posts en ressource
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // validation des données entrantes
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',            
            'published' => 'boolean'
        ]);

        // préparation du user
        $validated['user_id'] = 1;
        
        // enregistrement des données
        $post = Post::create($validated);

        // retourner le post créé
        return (new PostResource($post))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // retourne le post en ressource
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // validation des données entrantes
        $validated = $request->validate([
            'title' => 'string|max:255',
            'content' => 'string',
            'published' => 'boolean'
        ]);

        // mise à jour du post
        $post->update($validated);

        // retourne le post mis à jour
        return (new PostResource($post))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // suppression du post
        $post->delete();

        // retourne une réponse de succès
        return response()->json([
            'message' => 'Post supprimé avec succès'
        ], 200);
    }
}
