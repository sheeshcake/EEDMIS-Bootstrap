<?php

include "controller/medoo_connect.php";
use Carbon\Carbon;

$data = $database->select('slaughterhouse_billing',
    [
        // The row sched_id from table slaughterhouse_billing is equal the row sched_id from table slaughterhouse_schedule
        "[>]slaughterhouse_schedule" => ["sched_id"=>"sched_id"],

        // The row customer_id from table slaughterhouse_billing is equal the row customer_id from table slaughterhouse_customer
        "[>]slaughterhouse_customer" => ["customer_id"=>"customer_id"],
    ],
    [
        "slaughterhouse_billing.billing_id",
        "slaughterhouse_billing.sched_id",
        "slaughterhouse_billing.customer_id",
        "slaughterhouse_billing.price_id",
        "slaughterhouse_billing.total_bill",
        "slaughterhouse_schedule.sched_time",
        "slaughterhouse_schedule.sched_date",
        "slaughterhouse_customer.first_name",
        "slaughterhouse_customer.last_name",
    ]
);
?>


<table style="width:100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Schedule</th>
        <th>Total</th>
    </tr>
    <?php foreach( $data as $d ): ?>
    <tr>
        <td><?php echo $d["billing_id"] ?></td>
        <td><?php echo $d["first_name"] . $d["last_name"] ?></td>
        <td><?php echo Carbon::parse($d["sched_date"])->isoFormat('MMMM Do YYYY') . ", " . $d["sched_time"] ?></td>
        <td><?php echo $d["total_bill"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>