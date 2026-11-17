<?php

namespace App\Http\Controllers;

use App\Models\CvProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvProfileController extends Controller
{
    public function index()
    {
        $profiles = CvProfile::latest()->get();
        return view('cv-profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('cv-profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'professional_title' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:40',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'reference' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('cv-photos', 'public');
        }

        $profile = CvProfile::create($validated);
        return redirect()->route('cv-profiles.show', $profile)->with('success', 'CV berhasil ditambahkan.');
    }

    public function show(CvProfile $cv_profile)
    {
        return view('cv-profiles.show', ['profile' => $cv_profile]);
    }

    public function edit(CvProfile $cv_profile)
    {
        return view('cv-profiles.edit', ['profile' => $cv_profile]);
    }

    public function update(Request $request, CvProfile $cv_profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'professional_title' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:40',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'reference' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($cv_profile->photo) {
                Storage::disk('public')->delete($cv_profile->photo);
            }
            $validated['photo'] = $request->file('photo')->store('cv-photos', 'public');
        }

        $cv_profile->update($validated);
        return redirect()->route('cv-profiles.show', $cv_profile)->with('success', 'CV berhasil diperbarui.');
    }

    public function destroy(CvProfile $cv_profile)
    {
        if ($cv_profile->photo) {
            Storage::disk('public')->delete($cv_profile->photo);
        }

        $cv_profile->delete();
        return redirect()->route('cv-profiles.index')->with('success', 'CV berhasil dihapus.');
    }
}
