
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
<li>
      <li class="nav-item ">
        <a class="nav-link " href={{route('admin.dashboard')}}>
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item ">
        <a class="nav-link" href={{route('admin.users.index')}}>
          <i class="bi bi-people"></i></i><span>User</span>
        </a>
    </li>
    

      {{-- <li class="nav-item ">
        <a class="nav-link collapsed" href={{route('admin.pets.index')}}>
        <i class="bi bi-arrow-through-heart"></i><span>Pet</span>
        </a>
      </li> --}}

      <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.categories.index')}}>
        <i class="bi bi-bookmarks"></i><span>Category</span>
        </a>
      </li><!-- End Tables Nav -->

      {{-- <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.appointments.index')}}>
        <i class="bi bi-journals"></i><span>Appointment</span>
        </a>
      </li><!-- End Charts Nav --> --}}

      <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.items.index')}}>
        <i class="bi bi-list-ol"></i></i><span>Item</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.orders.index')}}>
        <i class="bi bi-basket"></i><span>Order</span>
        </a>
      </li><!-- End Charts Nav -->

      {{-- <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.services.index')}}>
        <i class="bi bi-capsule"></i>
<span>Service</span>
        </a>
      </li><!-- End Charts Nav --> --}}


      {{-- <li class="nav-item ">
        <a class="nav-link collapsed"  href={{route('admin.wishList.index')}}>
          <i class="bi bi-heart"></i>
<span>Wish List</span>
        </a>
      </li>
       --}}
      <!-- End Charts Nav -->


    </ul>

  </aside>
  <script>

document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            // Check if the current link is already active
            if (this.classList.contains('active')) {
                event.preventDefault(); // Prevent default navigation
                location.reload();      // Force reload
            }
        });
    });
});

  </script>

