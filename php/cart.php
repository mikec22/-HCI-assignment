<?
session_start();
//session_destroy();
extract($_POST);

if ($action === "add") {
    $_SESSION['cart_details'][$id]['img'] = $img;
    $_SESSION['cart_details'][$id]['name'] = $name;
    $_SESSION['cart_details'][$id]['price'] = $price;
    $_SESSION['cart_details'][$id]['quantity'] = $quantity;
} else if ($action === "del") {
    unset($_SESSION['cart_details'][$id]);
}
if (isset($_SESSION['cart_details']) && count($_SESSION['cart_details'])>0) {
    foreach ($_SESSION['cart_details'] as $key => $value) {
        echo "<li>
            <span class=\"item\">
                <span class=\"item-left\">
                    <img src=\"img/{$value['img']}\" alt=\"No Image\" style=\"height:50px; width:50px; object-fit: cover; object-position: center;\" />
                    <span class=\"item-info\" style=\"width:140px;\">
                        <span>{$value['name']}</span>
                        <span>\${$value['price']} x {$value['quantity']}</span>
                    </span>
                </span>
                <span class=\"item-right\">
                    <button class=\"btn btn-sm btn-danger pull-right\" onclick=\"delFromCart($key)\">x</button>
                </span>
            </span>
        </li>";
    }
} else {
    echo "<li class=\"text-xs-center\">No item</li>";
}

//print_r($_SESSION['cart_details']);
?>