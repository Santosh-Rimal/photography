<?php

include 'partials-frontend/menu.php';
// Check if 'data' parameter is set
if (isset($_GET['data'])) {
    $data = $_GET['data'];

    // Decode the Base64-encoded string
    $decodedString = base64_decode($data);

    // Convert the JSON string to an associative array
    $dataArray = json_decode($decodedString, true);

    // Check if decoding was successful
    if ($dataArray && isset($dataArray['status'], $dataArray['transaction_uuid'])) {
        $status = $dataArray['status'];
        $invoice = $dataArray['transaction_uuid'];
        // Update the database
        $sql = "UPDATE `zoo_ticket_bookings` SET `payment_status`='$status' WHERE `invoice`='$invoice'";
        $insert = mysqli_query($conn, $sql);

        // Message to display
        if ($insert) {
            $message = "Payment status updated successfully to '$status'.";
        } else {
            $message = 'Failed to update payment status: ' . mysqli_error($conn);
        }
    } else {
        $message = 'Invalid data received.';
    }
} else {
    $message = 'No data provided.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status Update</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        .message-box {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            width: 300px;
            color: <?php echo isset($status) && $status === 'COMPLETE' ? 'green' : 'red';
            ?>;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="message-box">
        <?php echo $message; ?>
    </div>

</body>

</html>
