<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Selection and Payment Options</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Login Successful!!!</h1>
        <h2>Select Your Car</h2>

        <form method="post" action="">
            <label for="car">Choose a car brand:</label>
            <select name="car" id="car">
                <option value="Toyota">Toyota</option>
                <option value="Honda">Honda</option>
                <option value="Ford">Ford</option>
                <option value="Nissan">Nissan</option>
                <option value="Mitsubishi">Mitsubishi</option>
            </select>
            <br><br>

            <input type="submit" name="select_car" value="Select Car">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_car'])) {
            $car = $_POST['car'];
            $models = [];

            switch ($car) {
                case 'Toyota':
                    $models = [
                        ['name' => 'Corolla', 'price' => 1000000],
                        ['name' => 'Camry', 'price' => 1500000],
                        ['name' => 'Fortuner', 'price' => 2000000],
                        ['name' => 'Hilux', 'price' => 1800000],
                        ['name' => 'RAV4', 'price' => 1700000]
                    ];
                    break;
                case 'Honda':
                    $models = [
                        ['name' => 'Civic', 'price' => 1200000],
                        ['name' => 'Accord', 'price' => 1600000],
                        ['name' => 'CR-V', 'price' => 1800000],
                        ['name' => 'HR-V', 'price' => 1400000],
                        ['name' => 'Brio', 'price' => 700000]
                    ];
                    break;
                case 'Ford':
                    $models = [
                        ['name' => 'Fiesta', 'price' => 900000],
                        ['name' => 'Focus', 'price' => 1300000],
                        ['name' => 'Mustang', 'price' => 2800000],
                        ['name' => 'Explorer', 'price' => 2200000],
                        ['name' => 'Ranger', 'price' => 1600000]
                    ];
                    break;
                case 'Nissan':
                    $models = [
                        ['name' => 'Almera', 'price' => 850000],
                        ['name' => 'Navara', 'price' => 1400000],
                        ['name' => 'Terra', 'price' => 1700000],
                        ['name' => 'Patrol', 'price' => 3000000],
                        ['name' => 'X-Trail', 'price' => 1600000]
                    ];
                    break;
                case 'Mitsubishi':
                    $models = [
                        ['name' => 'Mirage', 'price' => 750000],
                        ['name' => 'Lancer', 'price' => 1100000],
                        ['name' => 'Pajero', 'price' => 2500000],
                        ['name' => 'Montero', 'price' => 1900000],
                        ['name' => 'Strada', 'price' => 1600000]
                    ];
                    break;
            }

            echo '<form method="post" action="">';
            echo '<label for="model">Choose a model:</label>';
            echo '<select name="model" id="model">';
            foreach ($models as $model) {
                echo '<option value="' . $model['name'] . '|' . $model['price'] . '">' . $model['name'] . '</option>';
            }
            echo '</select>';
            echo '<br><br>';
            echo '<input type="hidden" name="car" value="' . $car . '">';
            echo '<input type="submit" name="select_model" value="Select Model">';
            echo '</form>';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_model'])) {
            list($model, $price) = explode('|', $_POST['model']);
            $car = $_POST['car'];

            echo '<h3>Selected Car: ' . $car . ' ' . $model . '</h3>';
            echo '<h4>Price: PHP ' . number_format($price, 2) . '</h4>';

            echo '<form method="post" action="">';
            echo '<input type="hidden" name="car" value="' . $car . '">';
            echo '<input type="hidden" name="model" value="' . $model . '">';
            echo '<input type="hidden" name="price" value="' . $price . '">';
            echo '<label for="payment">Choose a payment plan:</label>';
            echo '<select name="payment" id="payment">';
            echo '<option value="monthly">Monthly</option>';
            echo '<option value="quarterly">Quarterly</option>';
            echo '<option value="yearly">Yearly</option>';
            echo '<option value="full">Fully Paid</option>';
            echo '</select>';
            echo '<br><br>';
            echo '<input type="submit" name="select_payment" value="Select Payment">';
            echo '</form>';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_payment'])) {
            $car = $_POST['car'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $payment = $_POST['payment'];

            $payment_breakdown = [];

            switch ($payment) {
                case 'monthly':
                    $payment_breakdown['term'] = 'Monthly';
                    $payment_breakdown['amount'] = number_format($price / 12, 2);
                    break;
                case 'quarterly':
                    $payment_breakdown['term'] = 'Quarterly';
                    $payment_breakdown['amount'] = number_format($price / 4, 2);
                    break;
                case 'yearly':
                    $payment_breakdown['term'] = 'Yearly';
                    $payment_breakdown['amount'] = number_format($price / 1, 2);
                    break;
                case 'full':
                    $payment_breakdown['term'] = 'Fully Paid';
                    $payment_breakdown['amount'] = number_format($price, 2);
                    break;
            }

            echo '<h3>Payment Plan</h3>';
            echo '<p>Car: ' . $car . ' ' . $model . '</p>';
            echo '<p>Payment Term: ' . $payment_breakdown['term'] . '</p>';
            echo '<p>Amount to Pay: PHP ' . $payment_breakdown['amount'] . '</p>';
        }
        ?>
    </div>
</body>
</html>
