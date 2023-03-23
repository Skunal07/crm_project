<?php
if ($countall != null) {
    $i = 0;
    $j = 0;
    $k = 0;


    foreach ($countall['user'] as $user) {
        if ($user != null) {
            if ($i == 0) {
                echo "<h4>Users</h4>";
                echo '<hr class="my-0">';
            }
            $i++;
            echo '<li class="nav-link py-1">' . '<a href="/users/usersList?key=' . $user->first_name . '">' . $user->first_name . '</a>' . '</li>';
        } else {
            echo '';
        }
    }

    foreach ($countall['lead'] as $lead) {
        if ($lead != null) {
            if ($j == 0) {
                echo "<h4>Leads</h4>";
                echo '<hr class="my-0">';
            }
            $j++;
            echo '<li class="nav-link py-1">' . '<a href="/leads/index?key=' . $lead->name . '">' . $lead->name . '</a></li>';
        } else {
            echo '';
        }
    }

    foreach ($countall['product'] as $product) {
        if ($product != null) {
            if ($k == 0) {
                echo "<h4>Products</h4>";
                echo '<hr class="my-0">';
            }
            $k++;
            echo '<li class="nav-link py-1">' . '<a href="/products/index?key=' . $product->product_name . '">' . $product->product_name . '</a></li>';
        } else {
            echo '';
        }
    }

    if ($i == 0 && $j == 0 && $k == 0) {
        echo '<li class="nav-link">' . '<h6 class="text-white">No Data Found<h6></li>';
    } elseif ($i != 0 || $j != 0 || $k != 0) {
        echo '<hr class="my-0">';
        echo '<li class="text-center pt-3">' . '<h6><a href="/users/viewAll?key=' . $key . '">View All</a><h6></li>';
    }
}
