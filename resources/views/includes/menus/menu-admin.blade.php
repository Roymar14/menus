<li class="sidebar-item active"> 
    <a href={{route('admin.index')}} class="{{ request()->routeIs('admin.index') ? 'active' : '' }}"
    class="sidebar-item">
    <a href="index.html" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Lihat Pengaduan</span>
    </a>
</li>
<li class="sidebar-item active"> 
    <a href={{route('admin.users.index')}} class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
    class="sidebar-item">
    <a href="index.html" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Lihat Pengaduan</span>
    </a>
</li>