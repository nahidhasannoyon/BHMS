  <div class="right-sidebar">
      <div class="sidebar-title">
          <h3 class="weight-600 font-16 text-blue">
              Layout Settings
              <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
          </h3>
          <div class="close-sidebar" data-toggle="right-sidebar-close">
              <i class="icon-copy ion-close-round"></i>
          </div>
      </div>
      <div class="right-sidebar-body customscroll">
          <div class="right-sidebar-body-content">
              <h4 class="weight-600 font-18 pb-10">Header Background</h4>
              <div class="sidebar-btn-group pb-30 mb-10">
                  <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                  <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
              </div>

              <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
              <div class="sidebar-btn-group pb-30 mb-10">
                  <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                  <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
              </div>

              <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
              <div class="sidebar-radio-group pb-10 mb-10">
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                          value="icon-style-1" checked="" />
                      <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                          value="icon-style-2" />
                      <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                          value="icon-style-3" />
                      <label class="custom-control-label" for="sidebaricon-3"><i
                              class="fa fa-angle-double-right"></i></label>
                  </div>
              </div>

              <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
              <div class="sidebar-radio-group pb-30 mb-10">
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                          value="icon-list-style-1" checked="" />
                      <label class="custom-control-label" for="sidebariconlist-1"><i
                              class="ion-minus-round"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                          value="icon-list-style-2" />
                      <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                              aria-hidden="true"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                          value="icon-list-style-3" />
                      <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                          value="icon-list-style-4" checked="" />
                      <label class="custom-control-label" for="sidebariconlist-4"><i
                              class="icon-copy dw dw-next-2"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                          value="icon-list-style-5" />
                      <label class="custom-control-label" for="sidebariconlist-5"><i
                              class="dw dw-fast-forward-1"></i></label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                          class="custom-control-input" value="icon-list-style-6" />
                      <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                  </div>
              </div>

              <div class="reset-options pt-30 text-center">
                  <button class="btn btn-danger" id="reset-settings">
                      Reset Settings
                  </button>
              </div>
          </div>
      </div>
  </div>
  <div class="left-side-bar">
      <div class="brand-logo">
          <a href="{{ route('admin.dashboard') }}">
              <img src="{{ asset('vendors/images/logo-bhms-light.png') }}" alt="" class="dark-logo" />
              <img src="{{ asset('vendors/images/logo-bhms-dark.png') }}" alt="" class="light-logo" />
          </a>
          <div class="close-sidebar" data-toggle="left-sidebar-close">
              <i class="ion-close-round"></i>
          </div>
      </div>
      <div class="menu-block customscroll">
          <div class="sidebar-menu">
              <ul id="accordion-menu">
                  <li class="dropdown">
                      <a href="{{ route('admin.dashboard') }}"
                          class="dropdown-toggle no-arrow {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                          <span class="micon dw dw-home"></span>
                          <span class="mtext">Dashboard</span>
                      </a>
                  </li>
                  @can('see-users')
                      <li>
                          <a href="{{ route('admin.users.list') }}"
                              class="dropdown-toggle no-arrow {{ Request::is('admin/users') ? 'active' : '' }}">
                              <span class="micon fa fa-address-card-o"></span>
                              <span class="mtext">Users</span>
                          </a>
                      </li>
                  @endcan
                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle ">
                          <span class="micon bi  bi-file-person"></span><span class="mtext"> Students </span>
                      </a>
                      <ul class="submenu">
                          @can('add-student')
                              <li><a href="{{ route('admin.student.admit') }}"
                                      class="dropdown-toggle no-arrow {{ Request::is('admin/student/admit') ? 'active' : '' }}">
                                      <span class="mtext">Admit New Student</span>
                                  </a>
                              </li>
                          @endcan
                          @can('see-students')
                              <li>
                                  <a href="{{ route('admin.student.list') }}"
                                      class="dropdown-toggle no-arrow {{ Request::is('admin/student/list') ? 'active' : '' }}">
                                      <span class="mtext">Student List</span>
                                  </a>
                              </li>
                          @endcan
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle">
                          <span class="micon fa  fa-building-o"></span><span class="mtext"> Hostel </span>
                      </a>
                      <ul class="submenu">
                          <li><a href="{{ route('admin.hostel.list') }}"
                                  class="dropdown-toggle no-arrow {{ Request::is('admin/hostel/*') ? 'active' : '' }} ">
                                  <span class="mtext">Hostel Buildings</span>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle">
                          <span class="micon dw dw-invoice-1"></span><span class="mtext"> Bill </span>
                      </a>
                      <ul class="submenu">

                          <li>
                              <a href="{{ route('admin.bill.types') }}"
                                  class="dropdown-toggle no-arrow {{ Request::is('admin/bill/types') ? 'active' : '' }}">
                                  <span class="mtext">Types of Bill</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('admin.monthly_bill.find') }}"
                                  class="dropdown-toggle no-arrow  {{ Request::is('admin/monthly_bill/generate') ? 'active' : '' }} {{ Request::is('admin/monthly_bill/find') ? 'active' : '' }}">
                                  <span class="mtext">Generate Bill</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('admin.monthly_bill.search') }}"
                                  class="dropdown-toggle no-arrow  {{ Request::is('admin/monthly_bill/search') ? 'active' : '' }} {{ Request::is('admin/monthly_bill/find') ? 'active' : '' }}">
                                  <span class="mtext">Total Monthly Bill</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('admin.monthly_bill.my') }}"
                                  class="dropdown-toggle no-arrow  {{ Request::is('admin/monthly_bill/my') ? 'active' : '' }}">
                                  <span class="mtext">My Monthly Bill</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle">
                          <span class="micon dw dw-invoice-1"></span><span class="mtext"> Meal </span>
                      </a>
                      <ul class="submenu">
                          @can('edit-meal')
                              <li>
                                  <a href="{{ route('admin.meal.list') }}"
                                      class="dropdown-toggle no-arrow {{ Request::is('admin/meal/list') ? 'active' : '' }}">
                                      <span class="mtext">Meals list</span>
                                  </a>
                              </li>
                          @endcan
                          @can('see-booked-meals')
                              <li>
                                  <a href="{{ route('admin.meal.booked') }}"
                                      class="dropdown-toggle no-arrow {{ Request::is('admin/meal/booked') ? 'active' : '' }}">
                                      <span class="mtext">Booked Meals</span>
                                  </a>
                              </li>
                          @endcan
                          <li><a href="{{ route('admin.meal.chart') }}"
                                  class="dropdown-toggle no-arrow {{ Request::is('admin/meal/chart') ? 'active' : '' }}">
                                  <span class="mtext">Chart</span>
                              </a>
                          </li>
                          @can('book-meal')
                              <li>
                                  <a href="{{ route('admin.meal.book') }}"
                                      class="dropdown-toggle no-arrow {{ Request::is('admin/meal/book') ? 'active' : '' }} {{ Request::is('admin/meal/store') ? 'active' : '' }}">
                                      <span class="mtext">Book</span>
                                  </a>
                              </li>
                          @endcan
                          <li>
                              <a href="{{ route('admin.meal.history') }}"
                                  class="dropdown-toggle no-arrow {{ Request::is('admin/meal/history') ? 'active' : '' }} ">
                                  <span class="mtext">My History</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('admin.meal.time') }}"
                                  class="dropdown-toggle no-arrow {{ Request::is('admin/meal/time') ? 'active' : '' }} ">
                                  <span class="mtext">Meal Times</span>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="mobile-menu-overlay"></div>
