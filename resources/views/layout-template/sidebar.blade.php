 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Hotel Aku</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Control
     </div>

     @if (Auth::user()->role == 'admin')
         <li class="nav-item">
             <a class="nav-link" href="{{ route('kamar') }}">
                 <i class="fas fa-fw fa-bed"></i>
                 <span>Kamar</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('faska') }}">
                 <i class="fas fa-fw fa-couch"></i>
                 <span>Fasilitas Kamar</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('fasha') }}">
                 <i class="fas fa-fw fa-hotel"></i>
                 <span>Fasilitas Hotel</span></a>
         </li>
     @else
         <li class="nav-item">
             <a class="nav-link" href="{{ route('daftar') }}">
                 <i class="fas fa-fw fa-clipboard-list"></i>
                 <span>Daftar Tamu</span></a>
         </li>
     @endif


 </ul>
