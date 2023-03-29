<style>
    .active{
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
}
</style>
<?php $page = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1); ?>

<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/users/user_profile" >
            <!-- <img src="/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <?php
            $image = $user->user_profile->profile_image;
            ?>
            <img src="/img/<?= $image ?>" class="navbar-brand-img rounded h-100">
            <span class="ms-1 font-weight-bold"><?php

                                                echo $user->user_profile["first_name"] . ' ' . $user->user_profile["last_name"];
                                                ?></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
      
            
            <li class="nav-item">
            <a class="nav-link  <?php echo $page == "dashboard"?'active bg-gradient-secondary':'';?>" href="/users/dashboard">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-tv text-primary text-sm opacity-10"></i>
                </div>
               
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
            
            <?php if ($user->role == 1) { ?>

                <li class="nav-item">
                    <a class="nav-link  <?php echo $page == "users_list"?'active bg-gradient-secondary':'';?>" href="/users/users_list">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "categories"?'active bg-gradient-secondary':'';?>" href="/categories">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-calendar-days text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "products"?'active bg-gradient-secondary':'';?>" href="/products">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-credit-card text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "contactUs"?'active bg-gradient-secondary':'';?>" href="/contactUs">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        <i class="fa-solid fa-message text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Contact Us Requests</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "companies"?'active bg-gradient-secondary':'';?>" href="/companies">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        <i class="fa-solid fa-building text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Companies</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "contacts"?'active bg-gradient-secondary':'';?>" href="/contacts">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-address-book text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Contacts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "leads"?'active bg-gradient-secondary':'';?>" href="/leads">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-file text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Leads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "task"?'active bg-gradient-secondary':'';?>" href="/task">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-file text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Assigned Task</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">My Profile / logout</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "user_profile"?'active bg-gradient-secondary':'';?>" href="/users/user_profile">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo $page == "logout"?'active bg-gradient-secondary':'';?>" href="/users/logout">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-right-from-bracket text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
   
</aside>


