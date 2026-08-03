<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
{
    $sliders = Slider::orderBy('urutan')
        ->get();

    return view(
        'slider.index',
        compact('sliders')
    );
}

    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $gambar = null;

    if ($request->hasFile('gambar')) {

        $gambar = $request
            ->file('gambar')
            ->store('slider', 'public');
    }

    Slider::create([
        'judul'     => $request->judul,
        'subjudul'  => $request->subjudul,
        'gambar'    => $gambar,
        'aktif'     => $request->aktif,
        'urutan'    => $request->urutan,
    ]);

    return redirect()
        ->route('slider.index')
        ->with(
            'success',
            'Slider berhasil ditambahkan'
        );
}

    public function show(Slider $slider)
    {
        return redirect()->route('slider.index');
    }

    public function edit(Slider $slider)
    {
        return view(
            'slider.edit',
            compact('slider')
        );
    }

    public function update(
        Request $request,
        Slider $slider
    ) {
        $request->validate([
            'judul' => 'required',
        ]);

        $data = [
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'aktif' => $request->aktif ?? 0,
            'urutan' => $request->urutan ?? 0,
        ];

        if ($request->hasFile('gambar')) {

            if (
                $slider->gambar &&
                Storage::disk('public')
                    ->exists($slider->gambar)
            ) {
                Storage::disk('public')
                    ->delete($slider->gambar);
            }

            $data['gambar'] = $request
                ->file('gambar')
                ->store('slider', 'public');
        }

        $slider->update($data);

        return redirect()
            ->route('slider.index')
            ->with(
                'success',
                'Slider berhasil diperbarui'
            );
    }

    public function destroy(Slider $slider)
    {
        if (
            $slider->gambar &&
            Storage::disk('public')
                ->exists($slider->gambar)
        ) {
            Storage::disk('public')
                ->delete($slider->gambar);
        }

        $slider->delete();

        return redirect()
            ->route('slider.index')
            ->with(
                'success',
                'Slider berhasil dihapus'
            );
    }
}