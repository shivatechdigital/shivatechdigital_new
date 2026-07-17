<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost as Blog;
use Illuminate\Support\Str;

class BlogDuplicateController extends Controller
{
    public function check(Request $request)
    {
        $keyword = strtolower(trim($request->keyword ?? ''));
        $slug = strtolower(trim($request->slug ?? ''));

        if (!$keyword && !$slug) {
            return response()->json([
                'error' => 'Keyword or slug is required'
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | 1. Exact Slug Check
        |--------------------------------------------------------------------------
        */

        if (!empty($slug)) {

            $existing = Blog::select('id', 'title', 'slug')
                ->where('slug', $slug)
                ->first();

            if ($existing) {

                return response()->json([
                    'is_duplicate' => true,
                    'similarity_score' => 100,
                    'matched_posts' => [[
                        'id' => $existing->id,
                        'title' => $existing->title,
                        'slug' => $existing->slug,
                        'similarity' => 100
                    ]]
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Exact Title Check
        |--------------------------------------------------------------------------
        */

        if (!empty($keyword)) {

            $existing = Blog::select('id', 'title', 'slug')
                ->whereRaw('LOWER(title) = ?', [$keyword])
                ->first();

            if ($existing) {

                return response()->json([
                    'is_duplicate' => true,
                    'similarity_score' => 100,
                    'matched_posts' => [[
                        'id' => $existing->id,
                        'title' => $existing->title,
                        'slug' => $existing->slug,
                        'similarity' => 100
                    ]]
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Similarity Check
        |--------------------------------------------------------------------------
        */

        $blogs = Blog::select('id', 'title', 'slug')->get();

        $matches = [];

        foreach ($blogs as $blog) {

            $title = strtolower($blog->title);
            $blogSlug = strtolower(str_replace('-', ' ', $blog->slug));

            similar_text($keyword, $title, $titleScore);

            similar_text(
                str_replace('-', ' ', $keyword),
                $blogSlug,
                $slugScore
            );

            $finalScore = max($titleScore, $slugScore);

            if ($finalScore >= 60) {

                $matches[] = [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'slug' => $blog->slug,
                    'similarity' => round($finalScore, 2)
                ];
            }
        }

        usort($matches, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return response()->json([
            'is_duplicate' => count($matches) > 0,
            'similarity_score' => $matches[0]['similarity'] ?? 0,
            'matched_posts' => array_slice($matches, 0, 5)
        ]);
    }

    public function slugs()
    {
        return response()->json([
            'slugs' => Blog::pluck('slug')
        ]);
    }
}