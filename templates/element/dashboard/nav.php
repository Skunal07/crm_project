<?php $page = substr( $_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1); ?>
<?=$page=="dashboard"?'active bg-gradient-primary':''; ?>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0 text-capitalize"><?php echo $page ?></h6>
                
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control"id="key" placeholder="Type here...">
                    </div>
                
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center" id="count">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell fa-lg cursor-pointer"></i><?php if ($count != null) {  ?><sup class="text-white bg-danger  px-1 rounded"><?= $count ?></sup><?php } ?>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <?php if($count == null){
                                echo 'No Message Yet';
                            }
                            foreach ($contactus as $list) { ?>
                                <li class="mb-2">
                                    <button class="dropdown-item border-radius-md flex clear" data="<?= $list->id ?>">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="/img/default.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New Request</span> for <?= $list->query_type ?>
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    <?= $list->created_date ?>
                                                </p>
                                            </div>
                                        </div>
                                    </buttons>
                                </li>
                            <?php  } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <script>
        $(document).on("click", ".clear", function() {
            var id = $(this).attr("data");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/notification/"+id,
                type: "JSON",
                method: "POST",
                data:id,
                success: function(response) {
$('#count').load('/users/dashboard #count')
                },
            });

        })
    </script>