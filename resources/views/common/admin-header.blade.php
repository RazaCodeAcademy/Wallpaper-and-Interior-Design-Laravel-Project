<div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
    <div class="row align-items-center py-2">
        <div class="col-md-4">
            <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
        </div>
        <div class="col-md-5">
            <form action="/admin/notifications/show" method="post">
                @csrf
                <div class="input-group">
                    <input type="email" name="search" class="form-control search-input" placeholder="Search" required>
                    <button type="buton" class="btn btn-light search-button">
                        <i class="fa fa-search text-danger" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <ul class="navbar-nav">
                <li class="nav-item icon-parrent">
                    <a href="/admin/notifications" class="nav-link icon-bullet">
                        <i class="fa fa-comments text-muted fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item icon-parrent">
                    <a href="/admin/notifications" class="nav-link icon-bullet">
                        <i class="fa fa-bell text-muted fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item ml-md-auto">
                    <a href="" class="nav-link align-items-center" data-toggle="modal" data-target="#sign-out">
                        <i class="fas fa-sign-out-alt text-danger fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="sign-out">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="sign-out">Want to leave?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6>Press Logout To Leave!</h6>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
            <a type="button" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="btn btn-danger">
                Logout
            </a>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->
