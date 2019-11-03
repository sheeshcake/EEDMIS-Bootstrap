<?php

include "controller/medoo_connect.php";
use Carbon\Carbon;

$data = $database->select('slaughterhouse_billing',
    [
        // The row sched_id from table slaughterhouse_billing is equal the row sched_id from table slaughterhouse_schedule
        "[>]slaughterhouse_schedule" => ["sched_id"=>"sched_id"],

        // The row customer_id from table slaughterhouse_billing is equal the row customer_id from table slaughterhouse_customer
        "[>]slaughterhouse_customer" => ["customer_id"=>"customer_id"],

        "[>]slaughterhouse_pricing" => ["price_id"=>"price_id"],
        "[>]slaughterhouse_payments" => ["billing_id"=>"billing_id"],
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
        "slaughterhouse_pricing.price",
        "slaughterhouse_payments.total_paid",
        "slaughterhouse_payments.total_change",
    ]
);
?>


<table style="width:100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Schedule</th>
        <th>Pricing</th>
        <th>Total</th>
        <th>Change</th>
        <th>Action</th>
    </tr>
    <?php foreach( $data as $d ): ?>
    <tr>
        <td><?php echo $d["billing_id"] ?></td>
        <td><?php echo $d["first_name"] . $d["last_name"] ?></td>
        <td><?php echo Carbon::parse($d["sched_date"])->isoFormat('MMMM Do YYYY') . ", " . $d["sched_time"] ?></td>
        <td>Php <?php echo number_format($d["price"], 2) ?></td>
        <td>Php <?php echo number_format($d["total_bill"], 2) ?></td>
        <td><?php echo $d["total_change"] ?  'Php ' . number_format($d["total_change"], 2) :  'n/a' ?></td>
        <td>
            <?php if( $d['total_paid'] ): ?>
            <p>PAID</p>
            <?php else: ?>
                <a href="javascript:;" onclick="createPayment(<?php echo $d["billing_id"]; ?>, <?php echo $d["price"]; ?>)">
                    <button>Payment</button>
                </a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
    function createPayment(billing_id, price)
    {
        $.confirm({
            title: `Transaction #${billing_id}`,
            content: '' +
                '<form method="POST" id="amount_form" action="controller/slaughterhouse/payment_controller.php" class="amount_form formName">' +
                '<div class="form-group">' +
                '<label>Enter Total Amount To Pay</label>' +
                '<input name="amount" type="number" placeholder="Amount" class="amount form-control" required />' +
                '<input name="billing_id" type="hidden" value="'+billing_id+'"/>' +
                '<input name="price" type="hidden" value="'+price+'"/>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        var amount = this.$content.find('.amount').val();
                        if(!amount){
                            $.alert('provide a valid amount');
                            return false;
                        }
                        $("#amount_form")[0].submit()
                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }
</script>