<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // 📄 List all articles
    public function index()
    {
        $articles = Article::with('author')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // ➕ Show create form
    public function create()
    {
        return view('articles.create');
    }

    // ✅ Store new article
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

      //  $data['author_id'] = Auth::id(); // Make sure the user is logged in
        $data['author_id'] = 1; // Replace 1 with an existing user ID from your database

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    // ✏️ Show edit form
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // 🔁 Update article
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    // ❌ Delete article
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
