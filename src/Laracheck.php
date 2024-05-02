<?php

namespace Andr3a\Laracheck;

use Illuminate\Support\Facades\Http;

class Laracheck
{
    public function track($exceptions): void
    {
        $exceptions->report(function (\Throwable $exception) {
            if(config('laracheck.api_key') && config('laracheck.endpoint')) {
                $this->sendTrack($exception);
            }
        });
    }

    private function sendTrack($exception): void
    {
        try {
            Http::post(config('laracheck.endpoint'), [
                'site_id' => config('laracheck.site_id'),
                'env' => config('app.env'),
                'url' => config('app.url'),
                'user' => auth()->check() ? auth()->id() : null,
                'ip' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'method' => request()->method(),
                'path' => request()->path(),
                'code' => $exception->getCode(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(), 
            ], [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.config('laracheck.api_key'),
            ]);
        } catch (\Throwable $th) {
            //
        }
    }
}
