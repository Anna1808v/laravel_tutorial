<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ADMIN PANEL</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
            <i class="fa-light fa-fish-fins"></i>
              <p>
                Pets
                <span class="badge badge-info right">{{ $pets->total() }}</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>