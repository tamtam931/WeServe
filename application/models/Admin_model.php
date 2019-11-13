<?php

class Admin_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function get_positions() {
       $this->db->select("*"); 
       $this->db->from('tbl_position');
       $query = $this->db->get();
       return $query->result();
    }

    public function get_positions_by_id($position_id) {
       $this->db->select("*"); 
       $this->db->from('tbl_position');
       $this->db->where('id', $position_id);
       $query = $this->db->get();
       return $query->row();
    }
    
    
    public function get_users() {
       $this->db->select("*, tbl_users.id AS user_id, tbl_position.id AS position_id"); 
       $this->db->from('tbl_users');
       $this-> db -> join('tbl_position', 'tbl_users.position = tbl_position.id');
       $query = $this->db->get();
       return $query->result();
    }

    public function get_user_by_id($user_id) {
       $this->db->select("*, tbl_users.id AS user_id"); 
       $this->db->from('tbl_users');
       $this->db->join('tbl_position', 'tbl_users.position = tbl_position.id');
       $this->db->where('tbl_users.id', $user_id);
       $query = $this->db->get();
       return $query->row();
    }

    public function add_user($data) {
        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }

    public function update_user($user_id, $firstname, $middlename, $lastname, $status) {
        $this->db->set('firstname', $firstname);
        $this->db->set('middlename', $middlename);
        $this->db->set('lastname', $lastname);
        $this->db->set('status', $status);
        $this->db->where('id', $user_id);
        $this->db->update('tbl_users');
        return $this->db->affected_rows();
    }

    public function get_user_by_username($username) {
      $this->db->select("*"); 
      $this->db->from('tbl_users');
      $this->db->where('username', $username);
      $query = $this->db->get();
      return $query->row();
    }

    public function get_all_handover_associate() {
       $this->db->select("*, tbl_users.id AS user_id"); 
       $this->db->from('tbl_users');
       $this->db->join('tbl_position', 'tbl_users.position = tbl_position.id');
       $this->db->where('tbl_users.position', 10);
       $query = $this->db->get();
       return $query->result();
    }


     public function deactivate_user($user_id) {
        $this->db->set('status', 0);
        $this->db->set('password', '');
        $this->db->where('id', $user_id);
        $this->db->update('tbl_users');
        return $this->db->affected_rows();
    }

    public function get_position_by_id($position_id) {
      $this->db->select("*"); 
      $this->db->from('tbl_position');
      $this->db->where('id', $position_id);
      $query = $this->db->get();
      return $query->row();
    }

    public function update_user_password($user_id, $newpassword) {
        $this->db->set('password', $newpassword);
        $this->db->where('id', $user_id);
        $this->db->update('tbl_users');
        return $this->db->affected_rows();
    }

    public function add_user_password_log($data) {
        $this->db->insert('tbl_user_pwd_history', $data);
        return $this->db->insert_id();
    }
    

    public function get_last_password_update_by_id($user_id) {
      $this->db->select("*"); 
      $this->db->from('tbl_user_pwd_history');
      $this->db->where('user_id', $user_id);
      $this->db->order_by('date_changed', 'DESC');
      $query = $this->db->get();
      return $query->row();
    }
    
    public function get_all_unit_floors() {
      $this->db->distinct();
      $this->db->select("unit_number"); 
      $this->db->from('tbl_units');
      $this->db->order_by('unit_number', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }

    public function get_all_unit_floors_by_project_tower($project, $tower) {
      $this->db->distinct();
      $this->db->select("unit_number"); 
      $this->db->from('tbl_units');
      $this->db->where('project', $project);
      $this->db->where('tower', $tower);
      $this->db->order_by('unit_number', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }

    public function get_units_per_floor($unit_floor) {
      $this->db->select("*"); 
      $this->db->from('tbl_units');
      $this->db->where('unit_number', $unit_floor);
      $this->db->order_by('unit_desc', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }

    public function get_all_dashboard_status() {
      $this->db->select("*"); 
      $this->db->from('tbl_dashboard_status');
      $query = $this->db->get();
      return $query->result();
    }

    public function get_color_status_per_unit($status) {
      $this->db->select("color"); 
      $this->db->from('tbl_dashboard_status');
      $this->db->where('id', $status);
      $query = $this->db->get();
      return $query->row();
    }

    public function add_turnover_schedule($data) {
      $this->db->insert('tbl_turnover_schedule', $data);
      return $this->db->insert_id();
    }


    public function get_turnover_schedule_distinct(){
      // $this->db->distinct('schedule');
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->order_by('schedule', 'ASC'); 
      $this->db->group_by('schedule');
      $query = $this->db->get();
      return $query->result();

    }

    public function get_turnover_schedule(){
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->order_by('schedule', 'ASC'); 
      $query = $this->db->get();
      return $query->result();

    }


    public function get_schedules_per_date($date) {
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->like('schedule', $date);
      $this->db->order_by('schedule', 'ASC'); 
      $query = $this->db->get();
      return $query->result();
    }

    public function get_schedules_per_exact_datetime($date) {
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->where('schedule', $date);
      $query = $this->db->get();
      return $query->result();
    }

    public function get_schedules_per_date_handover($date, $handover_associate) {
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->where('assigned_to', $handover_associate);
      $this->db->like('schedule', $date);
      $this->db->order_by('schedule', 'ASC'); 
      $query = $this->db->get();
      return $query->result();
    }


    public function get_unit_types()
    {
      $this->db-> select("*");
      $this->db-> from('tbl_unit_type');
      $this->db->where('status', 0); //active
      $query = $this->db->get();
      return $query->result();
    }

    public function get_unit_types_by_id($id)
    {
      $this->db-> select("unit_type");
      $this->db-> from('tbl_unit_type');
      $this->db->where('id', $id); //active
      $query = $this->db->get();
      return $query->row();

    }

    public function get_checking_areas()
    {
      $this->db-> select("*");
      $this->db-> from('tbl_checking_areas');
      $this->db->where('status', 0); //active
      $query = $this->db->get();
      return $query->result();

    }

    public function get_checking_areas_list()
    {
      $this->db-> select("*");
      $this->db-> from('tbl_checking_areas_list');
      $query = $this->db->get();
      return $query->result();

    }

    public function get_checking_areas_by_unit_type($type_id)
    {
      $this->db-> select("*");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_checking_areas_list', 'tbl_checking_areas.area_id = tbl_checking_areas_list.id');
      $this->db->where('unit_type', $type_id);
      $this->db->where('status', 0); //active
      $query = $this->db->get();
      return $query->result();

    }

    public function add_checking_area($data) {
      $this->db->insert('tbl_checking_areas', $data);
      return $this->db->insert_id();
    }

    public function get_checking_areas_by_id($area_id)
    {
      $this->db-> select("*");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_checking_areas_list', 'tbl_checking_areas.area_id = tbl_checking_areas_list.id');
      $this->db->where('id', $area_id);
      $this->db->where('status', 0); //active
      $query = $this->db->get();
      return $query->row();

    }

  public function delete_checking_area($area_id) {
    $this->db->delete('tbl_checking_areas', array('id' => $area_id));
    return true;
  }

  public function update_checking_area($id, $area_desc, $required) {
    $this->db->set('area_desc', $area_desc);
    $this->db->set('required', $required);
    $this->db->where('id', $id);
    $this->db->update('tbl_checking_areas');
    return true;
  }

  public function get_all_tickets()
  {
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status");
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_tickets.created_by');
    $this->db->where('tbl_tickets.status', 0); //active
    $query = $this->db->get();
    return $query->result();

  }

  public function get_ticket_by_id($ticket_id)
  {
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status");
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_tickets.created_by');
    $this->db->join('tbl_units', 'tbl_units.runitid = tbl_tickets.unit_id AND tbl_units.project = tbl_tickets.project');
    $this->db->where('tbl_tickets.id', $ticket_id); //active
    $query = $this->db->get();
    return $query->row();

  }

  public function add_ticket_images($data) {
    $this->db->insert('tbl_tickets_images', $data);
    return $this->db->insert_id();
  }

  public function get_ticket_images_by_ticketid($ticket_id){
    $this->db-> select("*");
    $this->db-> from('tbl_tickets_images');
    $this->db->where('ticket_number', $ticket_id);
    $query = $this->db->get();
    return $query->result();

  }

  public function get_ticket_images_by_category($ticket_id, $category){
    $this->db-> select("*");
    $this->db-> from('tbl_tickets_images');
    $this->db->where('ticket_number', $ticket_id);
    $this->db->where('image_description', $category);
    $query = $this->db->get();
    return $query->result();

  }

  public function add_ticket_checklist($data) {
    $this->db->insert('tbl_ticket_checklist', $data);
    return $this->db->insert_id();
  }

  public function get_ticket_checklist_by_ticketid($ticket_id){
    $this->db-> select("*");
    $this->db-> from('tbl_ticket_checklist');
    $this->db->where('ticket_number', $ticket_id);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_ticket_checklist_by_ticketid_category($ticket_id, $category){
    $this->db-> select("*");
    $this->db-> from('tbl_ticket_checklist');
    $this->db->where('ticket_number', $ticket_id);
    $this->db->where('area_for_checking', $category);
    $query = $this->db->get();
    return $query->row();
  }

  public function delete_ticket_checklist($ticket_id) {
    $this->db->delete('tbl_ticket_checklist', array('ticket_number' => $ticket_id));
    return true;
  }

  public function get_all_sections() {
    $this->db->select("*"); 
    $this->db->from('tbl_section');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_all_roles() {
    $this->db->select("*"); 
    $this->db->from('tbl_roles');
    $query = $this->db->get();
    return $query->result();
  }

   public function add_checking_area_list($data) {
    $this->db->insert('tbl_checking_areas_list', $data);
    return $this->db->insert_id();
  }

   public function update_checking_area_list($id, $area_desc) {
    $this->db->set('area_desc', $area_desc);
    $this->db->where('id', $id);
    $this->db->update('tbl_checking_areas_list');
    return true;
  }

   public function get_checking_area_list_by_id($area_id)
    {
      $this->db-> select("*");
      $this->db-> from('tbl_checking_areas_list');
      $this->db->where('id', $area_id);
      $query = $this->db->get();
      return $query->row();

    }
 
}