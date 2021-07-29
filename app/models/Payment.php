<?php
class Payment
{
    private $db;
    private $dbCore;

    public function __construct()
    {
        $this->db = new Database;
        $this->dbCore = new coreDb;
    }
    public function getPagination($offset,$no_of_records_per_page){
        $this->db->query("SELECT * FROM payments LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRow()
    {
        $this->db->query("SELECT COUNT(*) as total_row FROM payments");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function pendingpayment($data)
    {
        $this->dbCore->query("INSERT INTO payments  (payment_status, fname, lname, mail, phone, zip, address, user_id, products_ids,site_id) VALUES ('pending',:fname,:lname,:mail,:phone,:zip,:address,:user_id,:products_ids,'1')");
        $this->dbCore->bind(':fname',$data['fname']);
        $this->dbCore->bind(':lname',$data['lname']);
        $this->dbCore->bind(':mail',$data['email']);
        $this->dbCore->bind(':phone',$data['phone']);
        $this->dbCore->bind(':zip',$data['zip']);
        $this->dbCore->bind(':address',$data['address']);
        $this->dbCore->bind(':user_id',$data['user_id']);
        $this->dbCore->bind(':products_ids',$data['product_ids']);
        $results = $this->dbCore->execute();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function paymentsuccess($payment){
        $this->dbCore->query("UPDATE payments SET payment_id=':payment_id', payer_id=':payer_id', payer_email=':payer_email', amount=':amount', currency=':currency', payment_status=':payment_status' where id=':id'");
        $this->dbCore->bind(':payment_id',$payment['payment_id']);
        $this->dbCore->bind(':payer_id',$payment['payer_id']);
        $this->dbCore->bind(':payer_email',$payment['payer_email']);
        $this->dbCore->bind(':amount',$payment['amount']);
        $this->dbCore->bind(':currency',$payment['currency']);
        $this->dbCore->bind(':payment_status',$payment['payment_status']);
        $this->dbCore->bind(':id',$payment['id']);
        $results = $this->dbCore->execute();
    }
    public function lastId(){
        $this->dbCore->query("SELECT id FROM payments ORDER BY id DESC LIMIT 1");
        $results = $this->dbCore->resultSet();
        if ($results) {
            return $results[0]->id;
        } else {
            return $results;
        }
    }
    public function findPaymentByUser($id){
        $this->db->query("SELECT * FROM payments where mail=:id and payment_status='approved'");
        $this->db->bind(':id',$id);
        $result = $this->db->resultSet();
        return $result;
    }
}