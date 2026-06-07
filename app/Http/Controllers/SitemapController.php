<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $projects = Project::query()
            ->orderByDesc('updated_at')
            ->get();

        $urls = [];

        $urls[] = [
            'loc' => route('home'),
            'lastmod' => $projects->max('updated_at')?->toAtomString() ?? now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ];

        foreach ($projects as $project) {
            $urls[] = [
                'loc' => route('projects.show', $project->slug),
                'lastmod' => $project->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;

        foreach ($urls as $url) {
            $xml .= "  <url>".PHP_EOL;
            $xml .= "    <loc>{$url['loc']}</loc>".PHP_EOL;
            $xml .= "    <lastmod>{$url['lastmod']}</lastmod>".PHP_EOL;
            $xml .= "    <changefreq>{$url['changefreq']}</changefreq>".PHP_EOL;
            $xml .= "    <priority>{$url['priority']}</priority>".PHP_EOL;
            $xml .= "  </url>".PHP_EOL;
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
