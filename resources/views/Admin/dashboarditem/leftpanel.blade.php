<div class="dashboard-nav w-10 p-2">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="#" class="brand-logo"><i class="fas fa-anchor"></i> <span>AdminPanel</span></a>
        </header>
        <nav class="dashboard-nav-list">
                <a href="{{route('mainpage')}}" class="dashboard-nav-item"><i class="fas fa-home"></i>Home </a>
               
                <a href="{{route('adminaboutpage')}}" class="dashboard-nav-item"><i class="fas fa-tachometer-alt"></i>About</a>
                <a href="{{route('adminServicePage')}}" class="dashboard-nav-item"><i class="fas fa-user"></i> Service </a>                           <div class='dashboard-nav-dropdown dropdown'>
                <a href="#" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                <i class="fas fa-photo-video"></i> Blog</a>
                <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{route('adminBLogPage')}}" class="dashboard-nav-dropdown-item">Blog Gride</a>
                        <a href="{{route('adminBLogdetailPage')}}" class="dashboard-nav-dropdown-item">Blog Detail</a></div>
                </div>
              <div class='dashboard-nav-dropdown dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-users"></i> Page </a>
                <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{route('adminpricepage')}}" class="dashboard-nav-dropdown-item">Princing</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Our Feature</a>
                        <a href="{{route('adminTeamdetailpage')}}" class="dashboard-nav-dropdown-item">Team Member</a>
                        <a href="{{route('admintestimonialpage')}}" class="dashboard-nav-dropdown-item">Testimonial</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Free Quate</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Contact</a>
                 </div>
                </div>
            <a href="{{route('logout')}}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i>Logout</a>
          <div class="nav-item-divider"></div>
        </nav>
    </div>


    
<script>
    $(document).ready(function() {
    $(".dashboard-nav-dropdown-toggle").click(function(e) {
        e.preventDefault();
        $(this).siblings(".dashboard-nav-dropdown-menu").slideToggle();
    });
});
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
