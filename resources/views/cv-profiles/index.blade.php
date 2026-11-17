<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daftar CV</title>
<style>
*{box-sizing:border-box}body{margin:0;background:#eef2f6;font:15px Arial,sans-serif;color:#263445}.wrap{max-width:1000px;margin:40px auto;padding:20px}.top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}.btn{display:inline-block;padding:10px 15px;border-radius:6px;background:#24486c;color:#fff;text-decoration:none;border:0;cursor:pointer}.btn.red{background:#b33a43}.btn.gray{background:#657386}.notice{background:#dff3e6;padding:12px;border-radius:6px;margin:16px 0}.card{background:#fff;padding:18px;border-radius:10px;margin-top:14px;box-shadow:0 3px 12px #15263a12;display:flex;gap:18px;align-items:center}.avatar{width:76px;height:76px;object-fit:cover;border-radius:50%;background:#dce4ed}.actions{margin-left:auto;display:flex;gap:8px;flex-wrap:wrap}.muted{color:#68778a}
</style></head><body><main class="wrap">
<div class="top"><div><h1>CV Saya</h1><p class="muted">Kelola data CV: tambah, lihat, edit, dan hapus.</p></div><a class="btn" href="{{ route('cv-profiles.create') }}">+ Tambah CV</a></div>
@if(session('success'))<div class="notice">{{ session('success') }}</div>@endif
@if($profiles->isEmpty())<div class="card"><p>Belum ada data CV. Klik <b>Tambah CV</b> untuk mulai mengisi.</p></div>@endif
@foreach($profiles as $profile)
<div class="card">
@if($profile->photo)<img class="avatar" src="{{ asset('storage/'.$profile->photo) }}" alt="Foto {{ $profile->name }}">@else<div class="avatar"></div>@endif
<div><h3>{{ $profile->name }}</h3><div>{{ $profile->professional_title }}</div><small class="muted">{{ $profile->email }}</small></div>
<div class="actions"><a class="btn" href="{{ route('cv-profiles.show',$profile) }}">Lihat CV</a><a class="btn gray" href="{{ route('cv-profiles.edit',$profile) }}">Edit</a><form method="POST" action="{{ route('cv-profiles.destroy',$profile) }}" onsubmit="return confirm('Yakin ingin menghapus CV ini?')">@csrf @method('DELETE')<button class="btn red" type="submit">Hapus</button></form></div>
</div>
@endforeach
</main></body></html>
