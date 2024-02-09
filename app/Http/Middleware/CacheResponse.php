<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CacheResponse
{
    public function handle($request, Closure $next)
    {
        // Créez une clé unique pour la requête, par exemple en utilisant l'URI
        $key = 'response_cache_' . $request->getRequestUri();
    
        // Vérifiez si la réponse est déjà en cache
        if (Cache::has($key)) {
            // Renvoyez la réponse mise en cache
            return response(Cache::get($key));
        }
    
        // Sinon, générez la réponse
        $response = $next($request);
    
        // Mettez en cache le contenu de la réponse, pas la réponse elle-même
        // Notez que vous devriez ajuster la durée de mise en cache selon vos besoins
        Cache::put($key, $response->getContent(), 60);
    
        // Renvoyez la réponse
        return $response;
    }
}    
