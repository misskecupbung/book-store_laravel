<div class="links">
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/daftar-buku">Daftar Buku</a>
    <a href="/help">Help</a>
    @if (Auth::check() && Auth::user()->level == 'admin')
    <a href="/buku">Buku</a>
    @endif
</div>
