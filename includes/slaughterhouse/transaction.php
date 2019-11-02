<?php

$data = $database->select('slaughterhouse_billing',
    [
        "[>]slaughterhouse_schedule" => ["sched_id"=>"sched_id"],
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
        <td><?php echo $d["sched_date"] . $d["sched_time"] ?></td>
        <td><?php echo $d["total_bill"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>