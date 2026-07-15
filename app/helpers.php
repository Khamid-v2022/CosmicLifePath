<?php

if (! function_exists('funnel_step_name')) {
    function funnel_step_name(string $base, ?string $ext = null): string
    {
        return $ext === 'no' ? "{$base}_ext_no" : $base;
    }
}

if (! function_exists('funnel_ext_from_request')) {
    function funnel_ext_from_request(?Illuminate\Http\Request $request = null): ?string
    {
        $request ??= request();
        $ext = $request->query('ext') ?? $request->input('ext') ?? $request->session()->get('cosmic.reading.ext');

        return $ext === 'no' ? 'no' : null;
    }
}

if (! function_exists('remember_funnel_ext')) {
    function remember_funnel_ext(Illuminate\Http\Request $request, ?string $ext): void
    {
        if ($ext === 'no') {
            $request->session()->put('cosmic.reading.ext', 'no');
        }
    }
}
