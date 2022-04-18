<?php

namespace App\Http\Controllers;

use App\Http\Requests\linkrequest;
use App\Models\ShortLink;
use App\Services\LinkService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use function MongoDB\BSON\toJSON;


class linkcontroller extends Controller
{
    public function show()
    {
        return view('links.show');
    }

    public function send(linkrequest $request, LinkService $service)
    {

        $source = $request->original_link;

        $prefix = $service->prefixGenerate();

        $link = ShortLink::create([
            'original_link' => $source,
            'short_link' => $prefix,
        ]);

        if($link) {

            return redirect()->back()->with('success', route('links.away', ['prefix' => $prefix]));
            /*return response()->json([
                'original_link' => $link,
            ]);*/

        }
        else return back()->with('error', 'Ошибка!');

    }
    public function away($prefix)
    {
        $link = ShortLink::query()->where('short_link', '=', $prefix)->firstOrFail();

        if ($link) {
            return redirect()->away($link->original_link);
        }

    }

}
