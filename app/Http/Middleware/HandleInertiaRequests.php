<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use App\Models\Category;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'success' => fn()=>$request->session()->get('success'),
            'info' => fn()=>$request->session()->get('info'),
            'danger' => fn()=>$request->session()->get('danger'),
            'category' => fn() => Category::withCount('product')->get(),
            'auth' => fn() => Auth::user() ? Auth::user() : null,
            'cart' => fn() => Auth::user() ? ProductCart::where('user_id',Auth::user()->id)->count() : 'need login',
        ]);
    }
}
