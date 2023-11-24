<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function search(Request $request)
    {
        if (!empty($request->q)) {
            $data = DB::select(DB::raw("SELECT *, MATCH (`topic`) AGAINST ('$request->q') AS topic_relevance from guides WHERE (match (`topic`) against ('$request->q' in natural language mode) or match (`content`) against ('$request->q' in natural language mode)) and published=1 order by topic_relevance desc"));
            $guides = Guide::hydrate($data);
        } else {
            $guides = collect();
        }

        return view('search', [
            'guides' => $guides,
            'query' => $request->q,
        ]);
    }

    public function show()
    {
        $trendingGuides = Guide::popularWeek()
            ->where('published', 1)
            ->take(6)
            ->get();

        $recentGuides = Guide::where('published', 1)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $randomGuides = GUIDE::where('published', 1)->get();

        if ($randomGuides->isNotEmpty()) {
            $randomGuides = $randomGuides->random(15);
        }

        $cond1 = $trendingGuides->pluck('topic');
        $cond2 = $recentGuides->pluck('topic');

        $filtered = $randomGuides->whereNotIn('topic', $cond1)->whereNotIn('topic', $cond2);

        return view('dashboard', [
            'trendingGuides' => $trendingGuides,
            'recentGuides' => $recentGuides,
            'randomGuides' => $filtered,
        ]);
    }
}
