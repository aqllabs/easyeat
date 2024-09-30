<?php

namespace App\Http\Controllers;

use App\Models\Changelog;

class ChangelogController extends Controller
{
    public function index()
    {
        $changelogs = Changelog::latest('published_at')->get();

        $changelogs = $changelogs->map(function ($changelog) {
            $changelog->description = \Illuminate\Support\Str::markdown($changelog->description);

            return $changelog;
        });

        return view('pages.changelog', [
            'changelogs' => $changelogs,
        ]);
    }
}
