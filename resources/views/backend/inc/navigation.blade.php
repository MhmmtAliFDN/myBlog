 <!-- Main navbar -->
 <div class="navbar navbar-expand-xl navbar-static shadow">
     <div class="container-fluid">
         <div class="navbar-brand flex-1">
             <a href="index.html" class="d-inline-flex align-items-center">
                 <img src="../../../assets/images/logo_icon.svg" alt="">
                 <img src="../../../assets/images/logo_text_dark.svg"
                     class="d-none d-sm-inline-block h-16px invert-dark ms-3" alt="">
             </a>
         </div>

         <div
             class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0">
             <ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">
                 <li class="nav-item">
                     <a href="index.html" class="navbar-nav-link rounded active">
                         <i class="ph-house me-2"></i>
                         Home
                     </a>
                 </li>

                 <li class="nav-item nav-item-dropdown">
                     <a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown"
                         data-bs-auto-close="outside">
                         <i class="ph-rows me-2"></i>
                         Navigation
                     </a>

                     <div class="dropdown-menu p-0">
                         <div class="d-xl-flex">
                             <div
                                 class="d-flex flex-row flex-xl-column bg-light overflow-auto overflow-xl-visible rounded-top rounded-top-xl-0 rounded-start-xl">
                                 <div class="flex-1 border-bottom border-bottom-xl-0 p-2 p-xl-3">
                                     <div class="fw-bold border-bottom d-none d-xl-block pb-2 mb-2">Navigation</div>
                                     <ul class="nav nav-pills flex-xl-column flex-nowrap text-nowrap justify-content-center wmin-xl-300"
                                         role="tablist">
                                         <li class="nav-item" role="presentation">
                                             <a href="#tab_page" class="nav-link rounded active" data-bs-toggle="tab"
                                                 aria-selected="true" role="tab">
                                                 <i class="ph-layout me-2"></i>
                                                 Page
                                                 <i
                                                     class="ph-arrow-right nav-item-active-indicator d-none d-xl-inline-block ms-auto"></i>
                                             </a>
                                         </li>
                                         <li class="nav-item" role="presentation">
                                             <a href="#tab_navbars" class="nav-link rounded" data-bs-toggle="tab"
                                                 aria-selected="false" tabindex="-1" role="tab">
                                                 <i class="ph-rows me-2"></i>
                                                 Navbars
                                                 <i
                                                     class="ph-arrow-right nav-item-active-indicator d-none d-xl-inline-block ms-auto"></i>
                                             </a>
                                         </li>
                                         <li class="nav-item" role="presentation">
                                             <a href="#tab_sidebar_types" class="nav-link rounded" data-bs-toggle="tab"
                                                 aria-selected="false" tabindex="-1" role="tab">
                                                 <i class="ph-columns me-2"></i>
                                                 Sidebar types
                                                 <i
                                                     class="ph-arrow-right nav-item-active-indicator d-none d-xl-inline-block ms-auto"></i>
                                             </a>
                                         </li>
                                         <li class="nav-item" role="presentation">
                                             <a href="#tab_sidebar_content" class="nav-link rounded"
                                                 data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                                                 role="tab">
                                                 <i class="ph-sidebar-simple me-2"></i>
                                                 Sidebar content
                                                 <i
                                                     class="ph-arrow-right nav-item-active-indicator d-none d-xl-inline-block ms-auto"></i>
                                             </a>
                                         </li>
                                         <li class="nav-item" role="presentation">
                                             <a href="#tab_navigation" class="nav-link rounded" data-bs-toggle="tab"
                                                 aria-selected="false" tabindex="-1" role="tab">
                                                 <i class="ph-list-dashes me-2"></i>
                                                 Navigation
                                                 <i
                                                     class="ph-arrow-right nav-item-active-indicator d-none d-xl-inline-block ms-auto"></i>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="tab-content flex-xl-1">
                                 <div class="tab-pane dropdown-scrollable-xl fade show active p-3" id="tab_page"
                                     role="tabpanel">
                                     <div class="row">
                                         <div class="col-lg-4 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Sections</div>
                                             <a href="layout_no_header.html" class="dropdown-item rounded">No header</a>
                                             <a href="layout_no_footer.html" class="dropdown-item rounded">No footer</a>
                                             <a href="layout_fixed_header.html" class="dropdown-item rounded">Fixed
                                                 header</a>
                                             <a href="layout_fixed_footer.html" class="dropdown-item rounded">Fixed
                                                 footer</a>
                                         </div>

                                         <div class="col-lg-4 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Sidebars</div>
                                             <a href="layout_2_sidebars_1_side.html" class="dropdown-item rounded">2
                                                 sidebars on 1 side</a>
                                             <a href="layout_2_sidebars_2_sides.html" class="dropdown-item rounded">2
                                                 sidebars on 2 sides</a>
                                             <a href="layout_3_sidebars.html" class="dropdown-item rounded">3
                                                 sidebars</a>
                                         </div>

                                         <div class="col-lg-4">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Layout</div>
                                             <a href="layout_static.html" class="dropdown-item rounded">Static
                                                 layout</a>
                                             <a href="layout_boxed_page.html" class="dropdown-item rounded">Boxed
                                                 page</a>
                                             <a href="layout_liquid_content.html" class="dropdown-item rounded">Liquid
                                                 content</a>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="tab-pane dropdown-scrollable-xl fade p-3" id="tab_navbars"
                                     role="tabpanel">
                                     <div class="row">
                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Single</div>
                                             <a href="navbar_single_top_static.html" class="dropdown-item rounded">Top
                                                 static</a>
                                             <a href="navbar_single_top_fixed.html" class="dropdown-item rounded">Top
                                                 fixed</a>
                                             <a href="navbar_single_bottom_static.html"
                                                 class="dropdown-item rounded">Bottom static</a>
                                             <a href="navbar_single_bottom_fixed.html"
                                                 class="dropdown-item rounded">Bottom fixed</a>
                                         </div>

                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Multiple</div>
                                             <a href="navbar_multiple_top_static.html"
                                                 class="dropdown-item rounded">Top static</a>
                                             <a href="navbar_multiple_top_fixed.html"
                                                 class="dropdown-item rounded">Top fixed</a>
                                             <a href="navbar_multiple_bottom_static.html"
                                                 class="dropdown-item rounded">Bottom static</a>
                                             <a href="navbar_multiple_bottom_fixed.html"
                                                 class="dropdown-item rounded">Bottom fixed</a>
                                             <a href="navbar_multiple_top_bottom_fixed.html"
                                                 class="dropdown-item rounded">Top and bottom fixed</a>
                                         </div>

                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Content</div>
                                             <a href="navbar_component_single.html"
                                                 class="dropdown-item rounded">Single navbar</a>
                                             <a href="navbar_component_multiple.html"
                                                 class="dropdown-item rounded">Multiple navbars</a>
                                         </div>

                                         <div class="col-lg-3">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Other</div>
                                             <a href="navbar_colors.html" class="dropdown-item rounded">Color
                                                 options</a>
                                             <a href="navbar_sizes.html" class="dropdown-item rounded">Sizing
                                                 options</a>
                                             <a href="navbar_components.html" class="dropdown-item rounded">Navbar
                                                 components</a>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="tab-pane dropdown-scrollable-xl fade p-3" id="tab_sidebar_types"
                                     role="tabpanel">
                                     <div class="row">
                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Main</div>
                                             <a href="sidebar_default_resizable.html"
                                                 class="dropdown-item rounded">Resizable</a>
                                             <a href="sidebar_default_resized.html"
                                                 class="dropdown-item rounded">Resized</a>
                                             <a href="sidebar_default_collapsible.html"
                                                 class="dropdown-item rounded">Collapsible</a>
                                             <a href="sidebar_default_collapsed.html"
                                                 class="dropdown-item rounded">Collapsed</a>
                                             <a href="sidebar_default_hideable.html"
                                                 class="dropdown-item rounded">Hideable</a>
                                             <a href="sidebar_default_hidden.html"
                                                 class="dropdown-item rounded">Hidden</a>
                                             <a href="sidebar_default_color_dark.html"
                                                 class="dropdown-item rounded">Dark color</a>
                                         </div>

                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Secondary</div>
                                             <a href="sidebar_secondary_collapsible.html"
                                                 class="dropdown-item rounded">Collapsible</a>
                                             <a href="sidebar_secondary_collapsed.html"
                                                 class="dropdown-item rounded">Collapsed</a>
                                             <a href="sidebar_secondary_hideable.html"
                                                 class="dropdown-item rounded">Hideable</a>
                                             <a href="sidebar_secondary_hidden.html"
                                                 class="dropdown-item rounded">Hidden</a>
                                             <a href="sidebar_secondary_color_dark.html"
                                                 class="dropdown-item rounded">Dark color</a>
                                         </div>

                                         <div class="col-lg-3 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Right</div>
                                             <a href="sidebar_right_collapsible.html"
                                                 class="dropdown-item rounded">Collapsible</a>
                                             <a href="sidebar_right_collapsed.html"
                                                 class="dropdown-item rounded">Collapsed</a>
                                             <a href="sidebar_right_hideable.html"
                                                 class="dropdown-item rounded">Hideable</a>
                                             <a href="sidebar_right_hidden.html"
                                                 class="dropdown-item rounded">Hidden</a>
                                             <a href="sidebar_right_color_dark.html"
                                                 class="dropdown-item rounded">Dark color</a>
                                         </div>

                                         <div class="col-lg-3">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Content</div>
                                             <a href="sidebar_content_left.html" class="dropdown-item rounded">Left
                                                 aligned</a>
                                             <a href="sidebar_content_left_stretch.html"
                                                 class="dropdown-item rounded">Left stretched</a>
                                             <a href="sidebar_content_left_sections.html"
                                                 class="dropdown-item rounded">Left sectioned</a>
                                             <a href="sidebar_content_right.html" class="dropdown-item rounded">Right
                                                 aligned</a>
                                             <a href="sidebar_content_right_stretch.html"
                                                 class="dropdown-item rounded">Right stretched</a>
                                             <a href="sidebar_content_right_sections.html"
                                                 class="dropdown-item rounded">Right sectioned</a>
                                             <a href="sidebar_content_color_dark.html"
                                                 class="dropdown-item rounded">Dark color</a>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="tab-pane dropdown-scrollable-xl fade p-3" id="tab_sidebar_content"
                                     role="tabpanel">
                                     <div class="row">
                                         <div class="col-lg-6 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Sticky areas</div>
                                             <a href="sidebar_sticky_header.html"
                                                 class="dropdown-item rounded">Header</a>
                                             <a href="sidebar_sticky_footer.html"
                                                 class="dropdown-item rounded">Footer</a>
                                             <a href="sidebar_sticky_header_footer.html"
                                                 class="dropdown-item rounded">Header and footer</a>
                                             <a href="sidebar_sticky_custom.html" class="dropdown-item rounded">Custom
                                                 elements</a>
                                         </div>

                                         <div class="col-lg-6">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Other</div>
                                             <a href="sidebar_components.html" class="dropdown-item rounded">Sidebar
                                                 components</a>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="tab-pane dropdown-scrollable-xl fade p-3" id="tab_navigation"
                                     role="tabpanel">
                                     <div class="row">
                                         <div class="col-lg-6 mb-3 mb-lg-0">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Vertical</div>
                                             <a href="navigation_vertical_styles.html"
                                                 class="dropdown-item rounded">Navigation styles</a>
                                             <a href="navigation_vertical_collapsible.html"
                                                 class="dropdown-item rounded">Collapsible menu</a>
                                             <a href="navigation_vertical_accordion.html"
                                                 class="dropdown-item rounded">Accordion menu</a>
                                             <a href="navigation_vertical_bordered.html"
                                                 class="dropdown-item rounded">Bordered navigation</a>
                                             <a href="navigation_vertical_right_icons.html"
                                                 class="dropdown-item rounded">Right icons</a>
                                             <a href="navigation_vertical_badges.html"
                                                 class="dropdown-item rounded">Badges</a>
                                             <a href="navigation_vertical_disabled.html"
                                                 class="dropdown-item rounded">Disabled items</a>
                                         </div>

                                         <div class="col-lg-6">
                                             <div class="fw-bold border-bottom pb-2 mb-2">Horizontal</div>
                                             <a href="navigation_horizontal_styles.html"
                                                 class="dropdown-item rounded">Navigation styles</a>
                                             <a href="navigation_horizontal_elements.html"
                                                 class="dropdown-item rounded">Navigation elements</a>
                                             <a href="navigation_horizontal_tabs.html"
                                                 class="dropdown-item rounded">Tabbed navigation</a>
                                             <a href="navigation_horizontal_disabled.html"
                                                 class="dropdown-item rounded">Disabled items</a>
                                             <a href="navigation_horizontal_mega.html"
                                                 class="dropdown-item rounded">Mega menu</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </li>

                 <li class="nav-item nav-item-dropdown-xl dropdown">
                     <a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
                         <i class="ph-note-blank me-2"></i>
                         Starter kit
                     </a>

                     <div class="dropdown-menu">
                         <div class="dropdown-submenu dropdown-submenu-start">
                             <a href="#" class="dropdown-item dropdown-toggle">
                                 <i class="ph-columns me-2"></i>
                                 Sidebars
                             </a>
                             <div class="dropdown-menu">
                                 <a href="../seed/layout_2_sidebars_1_side.html" class="dropdown-item rounded">2
                                     sidebars on 1 side</a>
                                 <a href="../seed/layout_2_sidebars_2_sides.html" class="dropdown-item rounded">2
                                     sidebars on 2 sides</a>
                                 <a href="../seed/layout_3_sidebars.html" class="dropdown-item rounded">3 sidebars</a>
                             </div>
                         </div>
                         <div class="dropdown-submenu dropdown-submenu-start">
                             <a href="#" class="dropdown-item dropdown-toggle">
                                 <i class="ph-rows me-2"></i>
                                 Sections
                             </a>
                             <div class="dropdown-menu">
                                 <a href="../seed/layout_no_header.html" class="dropdown-item rounded">No header</a>
                                 <a href="../seed/layout_no_footer.html" class="dropdown-item rounded">No footer</a>
                                 <a href="../seed/layout_fixed_header.html" class="dropdown-item rounded">Fixed
                                     header</a>
                                 <a href="../seed/layout_fixed_footer.html" class="dropdown-item rounded">Fixed
                                     footer</a>
                             </div>
                         </div>
                         <div class="dropdown-divider"></div>
                         <a href="../seed/layout_static.html" class="dropdown-item rounded">Static layout</a>
                         <a href="../seed/layout_boxed_page.html" class="dropdown-item rounded">Boxed page</a>
                         <a href="../seed/layout_liquid_content.html" class="dropdown-item rounded">Liquid content</a>
                     </div>
                 </li>

                 <li class="nav-item nav-item-dropdown-xl dropdown">
                     <a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
                         <i class="ph-arrows-clockwise me-2"></i>
                         Switch
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                         <div class="dropdown-submenu dropdown-submenu-start">
                             <a href="#" class="dropdown-item dropdown-toggle">
                                 <i class="ph-layout me-2"></i>
                                 Layouts
                             </a>
                             <div class="dropdown-menu">
                                 <a href="../../layout_1/full/index.html" class="dropdown-item">Default layout</a>
                                 <a href="../../layout_2/full/index.html" class="dropdown-item">Layout 2</a>
                                 <a href="../../layout_3/full/index.html" class="dropdown-item">Layout 3</a>
                                 <a href="../../layout_4/full/index.html" class="dropdown-item">Layout 4</a>
                                 <a href="../../layout_5/full/index.html" class="dropdown-item">Layout 5</a>
                                 <a href="index.html" class="dropdown-item active">Layout 6</a>
                                 <a href="../../layout_7/full/index.html" class="dropdown-item disabled">
                                     Layout 7
                                     <span class="opacity-75 fs-sm ms-auto">Coming soon</span>
                                 </a>
                             </div>
                         </div>
                         <div class="dropdown-submenu dropdown-submenu-start">
                             <a href="#" class="dropdown-item dropdown-toggle">
                                 <i class="ph-swatches me-2"></i>
                                 Themes
                             </a>
                             <div class="dropdown-menu">
                                 <a href="index.html" class="dropdown-item active">Default</a>
                                 <a href="../../../LTR/material/full/index.html" class="dropdown-item disabled">
                                     Material
                                     <span class="opacity-75 fs-sm ms-auto">Coming soon</span>
                                 </a>
                                 <a href="../../../LTR/clean/full/index.html" class="dropdown-item disabled">
                                     Clean
                                     <span class="opacity-75 fs-sm ms-auto">Coming soon</span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </li>
             </ul>
         </div>

         <ul class="nav gap-1 flex-xl-1 justify-content-end order-0 order-xl-1">
             <li class="nav-item nav-item-dropdown-xl dropdown">
                 <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill"
                     data-bs-toggle="dropdown">
                     <i class="ph-squares-four"></i>
                 </a>

                 <div class="dropdown-menu dropdown-menu-end dropdown-menu-scrollable-sm wmin-lg-600 p-0">
                     <div class="d-flex align-items-center border-bottom p-3">
                         <h6 class="mb-0">Browse apps</h6>
                         <a href="#" class="ms-auto">
                             View all
                             <i class="ph-arrow-circle-right ms-1"></i>
                         </a>
                     </div>

                     <div class="row row-cols-1 row-cols-sm-2 g-0">
                         <div class="col">
                             <button type="button"
                                 class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom p-3">
                                 <div>
                                     <img src="../../../assets/images/demo/logos/1.svg" class="h-40px mb-2"
                                         alt="">
                                     <div class="fw-semibold my-1">Customer data platform</div>
                                     <div class="text-muted">Unify customer data from multiple sources</div>
                                 </div>
                             </button>
                         </div>

                         <div class="col">
                             <button type="button"
                                 class="dropdown-item text-wrap h-100 align-items-start border-bottom p-3">
                                 <div>
                                     <img src="../../../assets/images/demo/logos/2.svg" class="h-40px mb-2"
                                         alt="">
                                     <div class="fw-semibold my-1">Data catalog</div>
                                     <div class="text-muted">Discover, inventory, and organize data assets</div>
                                 </div>
                             </button>
                         </div>

                         <div class="col">
                             <button type="button"
                                 class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom border-bottom-sm-0 rounded-bottom-start p-3">
                                 <div>
                                     <img src="../../../assets/images/demo/logos/3.svg" class="h-40px mb-2"
                                         alt="">
                                     <div class="fw-semibold my-1">Data governance</div>
                                     <div class="text-muted">The collaboration hub and data marketplace</div>
                                 </div>
                             </button>
                         </div>

                         <div class="col">
                             <button type="button"
                                 class="dropdown-item text-wrap h-100 align-items-start rounded-bottom-end p-3">
                                 <div>
                                     <img src="../../../assets/images/demo/logos/4.svg" class="h-40px mb-2"
                                         alt="">
                                     <div class="fw-semibold my-1">Data privacy</div>
                                     <div class="text-muted">Automated provisioning of non-production datasets</div>
                                 </div>
                             </button>
                         </div>
                     </div>
                 </div>
             </li>

             <li class="nav-item">
                 <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill"
                     data-bs-toggle="offcanvas" data-bs-target="#notifications">
                     <i class="ph-bell"></i>
                     <span
                         class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                 </a>
             </li>

             <li class="nav-item nav-item-dropdown-xl dropdown">
                 <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1"
                     data-bs-toggle="dropdown">
                     <div class="status-indicator-container">
                         <img src="../../../assets/images/demo/users/face11.jpg" class="w-32px h-32px rounded-pill"
                             alt="">
                         <span class="status-indicator bg-success"></span>
                     </div>
                     <span class="d-none d-md-inline-block mx-md-2">Victoria</span>
                 </a>

                 <div class="dropdown-menu dropdown-menu-end">
                     <a href="#" class="dropdown-item">
                         <i class="ph-user-circle me-2"></i>
                         My profile
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="ph-currency-circle-dollar me-2"></i>
                         My subscription
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="ph-shopping-cart me-2"></i>
                         My orders
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="ph-envelope-open me-2"></i>
                         My inbox
                         <span class="badge bg-primary rounded-pill ms-auto">26</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                         <i class="ph-gear me-2"></i>
                         Account settings
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="ph-sign-out me-2"></i>
                         Logout
                     </a>
                 </div>
             </li>
         </ul>
     </div>
 </div>
 <!-- /main navbar -->
