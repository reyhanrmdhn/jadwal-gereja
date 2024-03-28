<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function firstFailedLogin($email, $timeDateTime)
    {
        $failedUpdate = array(
            'first_failed_login' => $timeDateTime,
            'failed_login_count' => 1
        );
        $this->db->where('email', $email);
        $this->db->update('majelis', $failedUpdate);
    }

    public function failedLoginCount($email, $newFailedLoginCount)
    {
        $failedUpdate = array(
            'failed_login_count' => $newFailedLoginCount
        );
        $this->db->where('email', $email);
        $this->db->update('majelis', $failedUpdate);
    }

    public function restoreFailedLoginCount($id)
    {
        $dataSubmit = array(
            'first_failed_login' => null,
            'failed_login_count' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('majelis', $dataSubmit);
    }
}
