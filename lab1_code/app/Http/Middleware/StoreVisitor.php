<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class StoreVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->get('https://api.ipify.org?format=json');
        $ip = json_decode($response->getBody())->ip;

        $browser = get_browser(null, true);

        $visitor = new Visitor;
        $visitor->visit_time = now();
        $visitor->web_page = $request->url();
        $visitor->ip_address = $ip;
        $visitor->host_name = gethostbyaddr($request->ip());
        $visitor->browser_name = $browser['browser'];

        $visitor->save();

        return $next($request);
    }
}

