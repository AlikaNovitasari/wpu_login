<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Berhasil di Hapus!</div>');
        redirect('menu');
    }

    public function deleteSubMenu($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Berhasil di Hapus!</div>');
        redirect('menu/submenu');
    }
}
