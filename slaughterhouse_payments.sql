CREATE TABLE slaughterhouse_payments (
    payment_id int NOT NULL AUTO_INCREMENT,
    total_paid DOUBLE NOT NULL,
    total_change DOUBLE,
    billing_id int,
    created_at DATETIME,
    PRIMARY KEY (payment_id),
    FOREIGN KEY (billing_id) REFERENCES slaughterhouse_billing(billing_id)
);