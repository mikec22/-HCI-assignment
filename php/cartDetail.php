<?
session_start();
if (isset($_SESSION['cart_details']) && count($_SESSION['cart_details'])>0) {
    echo "<div class=\"table-responsive\">
            <table class=\"table table-striped\">
                <thead class=\"thead-inverse\">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
    foreach ($_SESSION['cart_details'] as $key => $value) {
        $price = $value['price'];
        $quantity = $value['quantity'];
        $total = $price * $quantity;
        echo "<tr>
                <td class=\"align-middle\"><img src=\"img/{$value['img']}\" style=\"height:70px; width:70px; object-fit: cover; object-position: center;\"></td>
                <td class=\"align-middle\">{$value['name']}</td>
                <td class=\"align-middle\">$$price</td>
                <td class=\"align-middle\">$quantity</td>
                <th class=\"align-middle\" scope=\"row\">$$total</th>
                <td class=\"align-middle\"><a href=\"\"><img src=\"img/delete.png\" style=\"max-height:50px;\" onclick=\"delFromCart($key)\"></a></td>
            </tr>";
    }
}
?>