 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Dashbaord</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#batch" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-users-cog fa-sm text-white-50"></i>
             <span>HeroAria</span>
         </a>
         <div id="batch" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="heroIndex.php">All Hero</a>
                 <a class="collapse-item" href="heroCreate.php">Create Hero</a>
             </div>
         </div>
     </li>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#About" aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-address-card"></i>
             <span>About</span>
         </a>
         <div id="About" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="aboutIndex.php">All About</a>
                 <a class="collapse-item" href="aboutCreate.php">Create About</a>
             </div>
         </div>
     </li>

               <!-- Divider -->
               <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#wwhy" aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-user"></i>
             <span>Why Us</span>
         </a>
         <div id="wwhy" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="whyIndex.php">All Why</a>
                 <a class="collapse-item" href="whyCreate.php">Create Why</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">
     <li class="nav-item active">
         <a class="nav-link" href="./logout.php">
             <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
             <span>Logout</span></a>
     </li>

         <hr class="sidebar-divider d-none d-md-block">
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button> 
     </div>

 </ul>
 <!-- End of Sidebar -->