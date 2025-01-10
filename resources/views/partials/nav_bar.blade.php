<nav class="navbar bg-base-100 fixed top-0">
          <div class="navbar-start">

              <div class="dropdown">
                  <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                      <i class="bx bx-menu-alt-left bx-md"></i>
                  </div>
                  <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                      <li><a href="{{ route('blogs.index') }}"><i class="bx bx-book-reader bx-sm"></i> Blogs</a></li>
                      @guest
                        <li><a href="{{ route('auth.signin.get') }}"><i class="bx bx-log-in bx-sm"></i> Signin</a></li>
                        <li><a href="{{ route('auth.signup.get') }}"><i class="bx bx-user bx-sm"></i> Signup</a></li>
                      @endguest
                      @auth
                        <li><a href="{{ route('auth.signout') }}"><i class="bx bx-log-out bx-sm"></i> Signout</a></li>
                      @endauth
                  </ul>
              </div>
          </div>
          <div class="navbar-center">
              <a class="btn btn-ghost text-xl">MoxieMedia</a>
          </div>
          <div class="navbar-end">
              <button class="btn btn-ghost btn-circle">
                  <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor">
                      <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
              </button>
            @auth
                <div class="tooltip tooltip-left" data-tip="{{ auth()->user()->name }}">
                    <button class="btn btn-ghost btn-circle">
                        <div class="indicator">
                            <i class="bx bx-user-circle bx-sm"></i>
                        </div>
                    </button>
                </div>
          @endauth
          </div>
      </nav>

