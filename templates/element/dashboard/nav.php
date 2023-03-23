<!-- Get Page URl -->

<?php

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


$page = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
//  dd($page);
//  dd(substr($_SERVER['REQUEST_URI'], 1 ));
$key = "";
if (isset($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}
?>

<?= $page == "dashboard" ? 'active bg-gradient-primary' : ''; ?>
<main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <!-- <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li> -->

                    <?php
                    if ($page == 'dashboard') { ?>
                        <li class="text-capitalize breadcrumb-item text-sm text-white">
                            <?php
                            echo 'Dashboard'; ?></li>
                    <?php
                    } else {
                    ?>
                        <li class="text-capitalize breadcrumb-item text-sm text-white">

                            <?php
                            $url = (substr($_SERVER['REQUEST_URI'], 1));
                            if ($page == 'users_list') {
                                echo 'Users List';
                            } else if ($page == 'contactUs') {
                                echo 'Contact Us Request';
                            } else if ($page == 'categories') {
                                echo 'Categories';
                            } else if ($page == 'products') {
                                echo 'Products';
                            } else if ($page == 'companies') {
                                echo 'companies';
                            } else if ($page == 'contacts') {
                                echo 'contacts';
                            } else if ($url = 'leads/index?key=' . $key) {
                                echo 'Leads';
                            } elseif ($url = 'users/usersList?key=' . $key) {
                                echo 'Users';
                            } else if ($url = 'products/index?key=' . $key) {

                                echo 'Products';
                            } else {
                                echo $page;
                            }
                            ?></li>
                    <?php } ?>
                </ol>


            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <?php if ($page == 'dashboard') {
                    ?>
                        <div class="">
                            <div class="col-12">
                                <div class="cls input-group ">
                                    <form>
                                        <div class="searchBox-fakeInput">
                                            <span class="input-group-text global text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                            <div class="searchBox-inputWrapper">
                                                <input type="text" name="key1" id="key1" class="form-control searchBox-input js-searchBox-input" placeholder="Type here....">
                                            </div>
                                            <div class="searchBox-clearWrapper">

                                                <span class="cls searchBox-clear js-clearSearchBox" id="cls" name="cls"><i class="fa fa-times-circle" style="color:black;"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 search-div ">
                                <ul class="s_result search bg-dark rounded  px-2 py-3 me-sm-n4 text-white" aria-labelledby="dropdownMenuButton">
                                    <?= $this->element('/flash/search'); ?>
                                </ul>
                            </div>
                        </div>

                    <?php
                    } else { ?>
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>

                            <input type="text" class="form-control" value="<?php echo $key ?>" name="key" id="key" placeholder="Type here...">


                        </div>

                    <?php } ?>

                </div>


                <ul class="navbar-nav  justify-content-end">
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
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0 " id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell fa-lg cursor-pointer"></i>

                            <?php
                            // dd($count);
                            if ($count != null) {
                            ?>
                                <sup class="text-white bg-danger count px-1 rounded">
                                    <?= $count ?>
                                </sup>
                            <?php
                            } else {
                            ?>
                                <sup class="text-white bg-danger count px-1 rounded">
                                    <?= $count ?>
                                </sup>
                            <?php
                            }
                            if ($count >= 4) { ?>
                                <style>
                                    ul.dropdown-menu.list-group.table-responsive.dropdown-menu-end.px-2.py-3.me-sm-n4.show {
                                        height: 300px !important;
                                    }
                                </style>
                            <?php } ?>

                        </a>
                        <ul class="dropdown-menu list-group table-responsive dropdown-menu-end notify px-2 py-3 me-sm-n4" id="menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            if ($count == 0) {
                            ?>
                                <li class="mb-2 clear">
                                    <div class="dropdown-item border-radius-md d-flex">
                                        <div class="my-auto">
                                            <img src="/img/default.jpg" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h5 class="text-sm font-weight-normal text-dark mb-1">
                                                <span class="font-weight-bold ">No Messages Yet</span>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>

                            <?php

                            foreach ($contactus as $list) {
                            ?>
                                <li class="mb-2 clear" data="<?= $list->id ?>">
                                    <!-- <button class="dropdown-item border-radius-md flex clear" data="<?= $list->id ?>"> -->
                                    <div class="dropdown-item border-radius-md d-flex">
                                        <div class="my-auto">
                                            <img src="/img/default.jpg" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h5 class="text-sm font-weight-normal text-dark mb-1">
                                                <span class="font-weight-bold ">New Request</span> for <?= $list->query_type ?>
                                            </h5>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                <?= $list->created_date ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- </button> -->
                                </li>
                            <?php
                            }
                            if ($count != 0) {
                            ?>
                                <div class="list-footer">
                                    <a href="javascript:void(0)" type="submit" id="read-all" class="btn btn-secondary w-100 mt-4 mb-0">Read All</a>
                                </div>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <script>
        // $(document).ready(function() {

        $("#read-all").click(function() {
            // var id = $(this).attr("data");
            // alert('id')
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/notification/",
                type: "JSON",
                method: "POST",
                success: function(response) {
                    console.log(response);
                    $('.clear').empty();
                    $('.count').html('0');
                    // $(".count").load(location.href + " .count");
                },
            });

        })
    </script>



    <style>
        ul.s_result.search.px-2.py-3.me-sm-n4 {
            background: white;
            width: 100%;
            display: none;
        }

        span.input-group-text.global.text-body {
            margin: 5px;
            border: none;
            width: 1px;
        }



        @import url('https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css');

        .searchBox-fakeInput {
            background: white;
            border: 1px solid #d6dadc;
            border-radius: 10px;
            display: table;
        }

        .searchBox-fakeInput.is-focussed {
            border: 2px solid #5474df !important;
        }

        .searchBox-inputWrapper,
        .searchBox-clearWrapper {
            width: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .searchBox-input {
            background-color: transparent;
            border: none;
            box-shadow: none;
            outline: none;
            width: 100%;
            padding: 0.5rem;
            font-size: inherit;
        }

        .searchBox-input:focus {
            outline: none;
            background: #FFF;
            box-shadow: none;
        }

        .searchBox-clearWrapper {
            padding-right: 0.5rem;
        }

        .searchBox-clear {
            color: #CCC;
            padding: 0;
            cursor: pointer;
            font-size: inherit;
            cursor: pointer;
            line-height: 1.5;
            -webkit-transition: all 3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .searchBox-clearInput:hover {
            color: #AAA;
        }
    </style>