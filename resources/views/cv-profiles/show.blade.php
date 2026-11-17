<!doctype html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>CV {{ $profile->name }}</title>
<style>
*{box-sizing:border-box}body{margin:0;background:#e8edf2;color:#273343;font:14px Arial,sans-serif}.actions{max-width:920px;margin:20px auto;display:flex;gap:8px;flex-wrap:wrap;padding:0 10px}.btn{padding:10px 14px;border-radius:5px;background:#24486c;color:#fff;text-decoration:none;border:0;cursor:pointer}.btn.gray{background:#657386}.paper{max-width:920px;min-height:900px;margin:0 auto 40px;background:#fff;display:grid;grid-template-columns:31% 69%;box-shadow:0 6px 25px #172b4017}.side{background:#24466b;color:#fff;padding:36px 25px}.main{padding:36px 36px 30px}.photo{width:145px;height:145px;object-fit:cover;border-radius:50%;display:block;margin:0 auto 26px;border:5px solid #ffffff30;background:#dbe3eb}.side h3{font-size:15px;text-transform:uppercase;border-bottom:1px solid #ffffff8c;padding-bottom:8px;margin:25px 0 12px;letter-spacing:.6px}.side p,.main p{white-space:pre-line;line-height:1.55;margin:7px 0}.main h1{font-size:28px;letter-spacing:1px;text-transform:uppercase;margin:0 0 4px}.subtitle{color:#52667b;text-transform:uppercase;font-size:14px;margin-bottom:26px}.section{margin-top:23px}.section h2{font-size:15px;text-transform:uppercase;border-bottom:2px solid #aeb9c4;padding-bottom:9px;margin-bottom:12px}.item{margin:12px 0 17px;white-space:pre-line;line-height:1.55}.skill{margin:7px 0}.skill:before{content:'▸';margin-right:8px;color:#c5d9ef}@media(max-width:650px){.paper{grid-template-columns:1fr;margin:0 10px}.side{padding:25px}.main{padding:25px}.photo{width:120px;height:120px}.main h1{font-size:24px}}
</style></head><body>
<nav class="actions"><a class="btn gray" href="{{ route('cv-profiles.index') }}">← Daftar CV</a><a class="btn" href="{{ route('cv-profiles.edit',$profile) }}">Edit CV</a><button class="btn" onclick="window.print()">Cetak / Simpan PDF</button></nav>
<article class="paper"><aside class="side">
@if($profile->photo)<img class="photo" src="{{ asset('storage/'.$profile->photo) }}" alt="Foto {{ $profile->name }}">@else<div class="photo"></div>@endif
<h3>Kontak</h3><p>☎ {{ $profile->phone ?: 'Nomor telepon belum diisi' }}</p><p>✉ {{ $profile->email ?: 'Email belum diisi' }}</p><p>⌖ {{ $profile->address ?: 'Alamat belum diisi' }}</p>
@if($profile->education)<h3>Pendidikan</h3><p>{{ $profile->education }}</p>@endif
@if($profile->skills)<h3>Keahlian</h3>@foreach(preg_split('/\r\n|\r|\n/', $profile->skills) as $skill)@if(trim($skill))<div class="skill">{{ $skill }}</div>@endif @endforeach @endif
</aside><section class="main">
<h1>{{ $profile->name }}</h1><div class="subtitle">{{ $profile->professional_title }}</div>
@if($profile->about)<div class="section"><h2>Tentang Saya</h2><p>{{ $profile->about }}</p></div>@endif
@if($profile->experience)<div class="section"><h2>Pengalaman</h2><div class="item">{{ $profile->experience }}</div></div>@endif
@if($profile->reference)<div class="section"><h2>Referensi</h2><div class="item">{{ $profile->reference }}</div></div>@endif
</section></article></body></html>
