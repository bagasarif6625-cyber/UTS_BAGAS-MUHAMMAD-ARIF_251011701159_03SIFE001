<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Support\Str;

class SnackController extends Controller
{
    public function index()
    {
        $brands = Snack::query()
            ->whereNotNull('brand')
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        $requestedBrand = request('brand');
        $selectedBrand = $brands->contains($requestedBrand) ? $requestedBrand : null;

        $brandSnacks = Snack::query()
            ->whereIn('brand', $brands)
            ->orderBy('name')
            ->get();

        $snackQuery = Snack::query();
        if ($selectedBrand) {
            $snackQuery->where('brand', $selectedBrand);
        }

        $snacks = $snackQuery
            ->orderByRaw('(id * 7) % 29')
            ->orderBy('id')
            ->paginate(8)
            ->withQueryString();

        return view('snacks.index', compact('snacks', 'brands', 'brandSnacks', 'selectedBrand'));
    }

    public function brand(string $slug)
    {
        $brand = Snack::query()
            ->whereNotNull('brand')
            ->distinct()
            ->pluck('brand')
            ->first(fn ($name) => Str::slug($name) === $slug);

        abort_unless($brand, 404);

        $brandLogos = [
            'Chitato' => 'logo chitato.png',
            "Lay's" => 'logo lays.jpg',
            'Piattos' => 'logo piattos.jpg',
            'Taro' => 'logo taro.webp',
            'Qtela' => 'logo qtela.webp',
            'Kusuka' => 'logo kusuka.jpg',
        ];

        $brandLogo = $brandLogos[$brand] ?? null;
        $snacks = Snack::query()
            ->where('brand', $brand)
            ->orderByRaw('(id * 7) % 29')
            ->orderBy('id')
            ->paginate(8);

        return view('snacks.brand', compact('brand', 'brandLogo', 'snacks'));
    }

    public function show(Snack $snack)
    {
        return view('snacks.show', compact('snack'));
    }
}
