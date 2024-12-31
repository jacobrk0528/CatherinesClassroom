<?php

namespace App\Http\Middleware;

use App\Models\Campaign;
use App\Models\Medium;
use App\Models\Source;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class EntryVisitorTracking
{
    private const SOCIAL_SITES = [
        'facebook.com',
        'instagram.com',
        'twitter.com',
        'linkedin.com',
        'pinterest.com',
        'youtube.com',
        'snapchat.com',
        'reddit.com',
        'tumblr.com',
        'whatsapp.com',
        'wechat.com',
        'tiktok.com',
        'vimeo.com',
        'discord.com',
        'telegram.org',
        'dailymotion.com',
        'quora.com',
        'medium.com',
        'flickr.com',
    ];

    private const BROWSERS = [
        'google.com',
        'bing.com',
        'yahoo.com',
        'mozilla.org',
        'safari.com',
        'duckduckgo.com',
        'brave.com',
        'opera.com',
        'vivaldi.com',
        'edge.microsoft.com',
        'chromium.org',
        'netscape.com',
        'torproject.org',
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $trackingID = $request->cookie("visitor_id", $this->generateUUID());
        if (!$request->cookie("visitor_id")) {
            Cookie::queue("visitor_id", $trackingID, 60 * 24); // 24 hour expire time
        }

        if ($request->isMethod('get')) {
            $attribution = $this->getAttribution($request);

            Visitor::firstOrCreate(
                ["visitor_id" => $trackingID],
                [
                    "campaign_id" => $attribution["campaign"],
                    "source_id" => $attribution["source"],
                    "medium_id" => $attribution["medium"],
                    "entry_url" => $request->fullUrl(),
                    "entry_referrer" => $request->header('referrer'),
                    "user_agent" => $request->userAgent()
                ]
            );
        }

        return $next($request);
    }

    private function generateUUID(): String
    {
        $id = random_bytes(16);

        $id[6] = chr(ord($id[6]) & 0x0f | 0x40);
        $id[8] = chr(ord($id[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($id), 4));
    }

    private function getAttribution(Request $request): array
    {
        $utm_campaign = $request->get("utm_campaign") ?? null;
        $utm_source = $request->get("utm_source") ?? null;
        $utm_medium = $request->get("utm_medium") ?? null;

        if (in_array($utm_source, self::SOCIAL_SITES)){
            $utm_source = "(socials)";
        } else if (in_array($utm_source, self::BROWSERS)){
            $utm_campaign = "(direct)";
            $utm_medium = "(direct)";
        }

        $campaign = Campaign::firstOrCreate([
            "name" => $utm_campaign ?? "(unknown)"
        ]);

        $source = Source::firstOrCreate([
            "name" => $utm_source ?? "(unknown)"
        ]);

        $medium = Medium::firstOrCreate([
            "name" => $utm_medium ?? "(unknown)"
        ]);

        return [
            "campaign" => $campaign->id,
            "source" => $source->id,
            "medium" => $medium->id
        ];
    }
}
