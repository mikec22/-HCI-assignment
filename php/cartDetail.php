<?
session_start();
if (isset($_SESSION['cart_details']) && count($_SESSION['cart_details'])>0) {
    echo "<h2>Shopping Cart</h2>
            <div class=\"table-responsive\">
            <table class=\"table table-striped\">
                <thead class=\"thead-inverse\">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th class=\"text-xs-center\">Unit Price</th>
                        <th class=\"text-xs-center\">Quantity</th>
                        <th class=\"text-xs-center\">Price</th>
                        <th class=\"text-xs-center\">Action</th>
                    </tr>
                </thead>
                <tbody>";
    $total = 0;
    foreach ($_SESSION['cart_details'] as $key => $value) {
        $unit = $value['price'];
        $vipUnit = $unit * 0.9;
        $quantity = $value['quantity'];
        $price = $unit * $quantity;
        $vipPrice = $price * 0.9;
        $total += $price;
        $vipTotal += $vipPrice;
        echo "<tr>
                <td class=\"align-middle\"><img src=\"img/{$value['img']}\" style=\"height:70px; width:70px; object-fit: cover; object-position: center;\"></td>
                <td class=\"align-middle\">{$value['name']}</td>";
        if (isset($_COOKIE['user'])) {
            echo "<td class=\"align-middle text-xs-center\"><del>$$unit</del> <strong class=\"text-danger\">$$vipUnit</strong></td>";
        } else {
            echo "<td class=\"align-middle text-xs-center\">$$unit</td>";
        }    
        echo "<td class=\"align-middle text-xs-center\">
                <div class=\"row\">
                    <div class=\"input-group\" style=\"width: 150px; margin:auto;\">
                      <span class=\"input-group-btn\">
                        <button class=\"btn btn-secondary\" type=\"button\" id=\"decrease\">-</button>
                      </span>
                      <input type=\"number\" class=\"form-control\" value=\"$quantity\" name=\"$key\" min=\"1\">
                      <span class=\"input-group-btn\">
                        <button class=\"btn btn-secondary\" type=\"button\" id=\"increase\">+</button>
                      </span>
                    </div>
                </div>
                </td>";
        if (isset($_COOKIE['user'])) {
            echo "<th class=\"align-middle text-xs-center text-danger\" scope=\"row\">$$vipPrice</th>";
        } else {
            echo "<th class=\"align-middle text-xs-center\" scope=\"row\">$$price</th>";
        }           
        echo "<td class=\"align-middle text-xs-center\"><a href=\"\"><img src=\"img/delete.png\" style=\"max-height:50px;\" onclick=\"delFromCart($key)\"></a></td>
            </tr>";
    }
    if (isset($_COOKIE['user'])) {
        echo "<th colspan=\"5\" scope=\"row\" class=\"align-middle text-xs-right table-info h3\"><small class=\"text-muted\">Saved $".($total-$vipTotal)."</small> Total Price: $$vipTotal</th>
                <td class=\"align-middle table-info text-xs-right\"><button class=\"btn btn-primary btn-block\">Checkout</button></td>
                </tbody>
                </table>
            </div>";
    } else {
        echo "<th colspan=\"5\" scope=\"row\" class=\"align-middle text-xs-right table-info h3\">Total Price: $$total</th>
                <td class=\"align-middle table-info text-xs-right\"><button class=\"btn btn-primary btn-block\">Checkout</button></td>
                </tbody>
                </table>
            </div>";
    }
}
?>