<?
session_start();
//session_destroy();
extract($_POST);

if ($action === "add") {
    if (!isset($_SESSION['cart_details'][$id])) {
        $_SESSION['cart_details'][$id]['img'] = $img;
        $_SESSION['cart_details'][$id]['name'] = $name;
        $_SESSION['cart_details'][$id]['price'] = $price;
        $_SESSION['cart_details'][$id]['quantity'] = $quantity;
    } else {
        $_SESSION['cart_details'][$id]['quantity'] += $quantity;
    }
} else if ($action === "del") {
    unset($_SESSION['cart_details'][$id]);
} else if ($action === "increase") {
    $_SESSION['cart_details'][$id]['quantity'] += 1;
} else if ($action === "decrease") {
    $_SESSION['cart_details'][$id]['quantity'] -= 1;
} else if ($action === "edit") {
    $_SESSION['cart_details'][$id]['quantity'] = $quantity;
}
if (isset($_SESSION['cart_details']) && count($_SESSION['cart_details'])>0) {
    $i = 0;
    foreach ($_SESSION['cart_details'] as $key => $value) {
        $price = $value['price'];
        $vipPrice = $price * 0.9;
        echo "<li>
            <span class=\"item\">
                <span class=\"item-left\">
                    <img src=\"img/{$value['img']}\" alt=\"No Image\" style=\"height:50px; width:50px; object-fit: cover; object-position: center;\" />
                    <span class=\"item-info\" style=\"width:140px;\">
                        <span>{$value['name']}</span>";
        if (isset($_COOKIE['user'])) {
            echo "<span><del>$$price</del> <strong class=\"text-danger\">$$vipPrice</strong> x {$value['quantity']}</span>";
        } else {
            echo "<span>\${$value['price']} x {$value['quantity']}</span>";
        }        
        echo "</span>
            </span>
            <span class=\"item-right\">
                <a href=\"\"><img src=\"img/delete.png\" style=\"max-height:25px;\" onclick=\"delFromCart($key)\"></a>
                </span>
            </span>
        </li>";
//        if (++$i==5)
//            break;
    }
    echo "<div class=\"dropdown-divider\"></div>
            <li class=\"text-xs-center\"><a href=\"cart.html\">Watch details ></a></li>";
} else {
    echo "<li class=\"text-xs-center\">No item</li>";
}

//print_r($_SESSION['cart_details']);
?>