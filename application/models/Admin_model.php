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

    public function get_all_outbound_associate() {
       $this->db->select("*, tbl_users.id AS user_id"); 
       $this->db->from('tbl_users');
       $this->db->join('tbl_position', 'tbl_users.position = tbl_position.id');
       $this->db->where('tbl_users.position', 7);
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

    public function get_units() {
      $this->db->select("*"); 
      $this->db->from('tbl_units');
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
      $this->db->select("color, id"); 
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

    public function get_turnover_schedule_by_project($project){
      // $this->db->distinct('schedule');
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->join('tbl_buyers_transaction','tbl_buyers_transaction.customer_number = tbl_turnover_schedule.customer_number');
      $this->db->where('tbl_turnover_schedule.status', 0); //active
      $this->db->where('tbl_buyers_transaction.project', $project); //active
      $this->db->order_by('tbl_turnover_schedule.schedule', 'ASC'); 
      $this->db->group_by('tbl_turnover_schedule.schedule');
      $query = $this->db->get();
      return $query->result();

    }

    public function get_turnover_schedule_by_project_id($project_id){
      // $this->db->distinct('schedule');
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->join('tbl_buyers_transaction','tbl_buyers_transaction.customer_number = tbl_turnover_schedule.customer_number');
      $this->db->join('tbl_projects','tbl_projects.project_code = tbl_buyers_transaction.project');
      $this->db->where('tbl_turnover_schedule.status', 0); //active
      $this->db->where('tbl_projects.id', $project_id); //active
      $this->db->order_by('tbl_turnover_schedule.schedule', 'ASC'); 
      $this->db->group_by('tbl_turnover_schedule.schedule');
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

    public function get_schedules_per_customer_number($customer_number) {
      $this->db-> select("*");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->where('status', 0); //active
      $this->db->where('customer_number', $customer_number);
      $this->db->order_by('schedule', 'DESC'); 
      $query = $this->db->get();
      return $query->row();
    }

    public function get_schedules_per_exact_datetime($date) {
      $this->db-> select("*, tbl_projects.id AS project_id");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->join('tbl_buyers_transaction','tbl_buyers_transaction.customer_number = tbl_turnover_schedule.customer_number');
      $this->db->join('tbl_projects','tbl_buyers_transaction.project = tbl_projects.project_code');
      $this->db->where('tbl_turnover_schedule.status', 0); //active
      $this->db->where('tbl_turnover_schedule.schedule', $date);
      $query = $this->db->get();
      return $query->result();
    }

    public function get_schedules_per_exact_datetime_associate($date, $associate) {
      $this->db-> select("*, tbl_projects.id AS project_id");
      $this->db-> from('tbl_turnover_schedule');
      $this->db->join('tbl_buyers_transaction','tbl_buyers_transaction.customer_number = tbl_turnover_schedule.customer_number');
      $this->db->join('tbl_projects','tbl_buyers_transaction.project = tbl_projects.project_code');
      $this->db->where('tbl_turnover_schedule.status', 0); //active
      $this->db->where('tbl_turnover_schedule.schedule', $date);
      $this->db->where('tbl_turnover_schedule.assigned_to', $associate);
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

    public function get_unit_types_by_id_project($id, $project)
    {
      $this->db-> select("*, tbl_projects.project as project_desc, tbl_projects.id as project_id");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_unit_type', 'tbl_checking_areas.unit_type = tbl_unit_type.id');
      $this->db->join('tbl_projects', 'tbl_checking_areas.project = tbl_projects.id');
      $this->db->where('tbl_checking_areas.unit_type', $id);
      $this->db->where('tbl_checking_areas.project', $project);
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
      $this->db-> select("*, tbl_unit_type.unit_type AS unit_desc");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_checking_areas_list', 'tbl_checking_areas.area_id = tbl_checking_areas_list.id');
      $this->db->join('tbl_unit_type', 'tbl_checking_areas.unit_type = tbl_unit_type.id');
      $this->db->where('tbl_checking_areas.unit_type', $type_id);
      $this->db->where('tbl_checking_areas.status', 0); //active
      $query = $this->db->get();
      return $query->result();

    }

    public function get_checking_areas_by_unit_type_project($type_id, $project)
    {
      $this->db-> select("*, tbl_unit_type.unit_type AS unit_desc");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_checking_areas_list', 'tbl_checking_areas.area_id = tbl_checking_areas_list.id');
      $this->db->join('tbl_unit_type', 'tbl_checking_areas.unit_type = tbl_unit_type.id');
      $this->db->where('tbl_checking_areas.unit_type', $type_id);
      $this->db->where('tbl_checking_areas.project', $project);
      $this->db->where('tbl_checking_areas.status', 0); //active
      $query = $this->db->get();
      return $query->result();

    }

    public function get_unit_types_in_checking_areas()
    {
      $this->db-> select("*, tbl_checking_areas.id as area_id, tbl_checking_areas.unit_type AS unit_type_id, tbl_unit_type.unit_type AS unit_desc, tbl_checking_areas.project as project_id");
      $this->db-> from('tbl_checking_areas');
      $this->db->join('tbl_unit_type', 'tbl_checking_areas.unit_type = tbl_unit_type.id');
      $this->db->join('tbl_projects', 'tbl_checking_areas.project = tbl_projects.id');
      $this->db->group_by(array("tbl_checking_areas.project", "tbl_checking_areas.unit_type")); 
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
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status, assigned_to.firstname AS a_firstname, assigned_to.lastname AS a_lastname, tbl_projects.project AS project_name, tbl_projects.id AS project_id, tbl_unit_type.id AS unit_type_id");
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_users created_by', 'created_by.id = tbl_tickets.created_by' , 'left');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers_transaction.customer_number = tbl_tickets.customer_number');
    $this->db->join('tbl_buyers', 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->join('tbl_users assigned_to', 'tbl_tickets.assigned_to = assigned_to.id');
    $this->db->join('tbl_units', 'tbl_units.runitid = tbl_buyers_transaction.runitid AND tbl_units.project = tbl_buyers_transaction.project');
    $this->db->join('tbl_unit_type', 'tbl_units.unit_type = tbl_unit_type.unit_type');
    $this->db->join('tbl_projects', 'tbl_units.project = tbl_projects.project_code');
    $this->db->where('tbl_tickets.id', $ticket_id); //active
    $query = $this->db->get();
    return $query->row();

  }

  public function get_tickets_by_assigned_to($assigned_to)
  {
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status");
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_tickets.created_by' , 'left');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers_transaction.customer_number = tbl_tickets.customer_number');
    $this->db->join('tbl_units', 'tbl_units.runitid = tbl_buyers_transaction.runitid AND tbl_units.project = tbl_buyers_transaction.project');
    $this->db->where('tbl_tickets.assigned_to', $assigned_to); //active
    $query = $this->db->get();
    return $query->result();

  }

  public function get_ticket_by_customer_number($customer_number)
  {
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status, tbl_projects.id AS project_id");
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_tickets.created_by');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers_transaction.customer_number = tbl_tickets.customer_number');
    $this->db->join('tbl_buyers', 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->join('tbl_units', 'tbl_units.runitid = tbl_buyers_transaction.runitid AND tbl_units.project = tbl_buyers_transaction.project');
    $this->db->join('tbl_projects', 'tbl_projects.project_code = tbl_units.project');
    $this->db->where('tbl_tickets.customer_number', $customer_number); //active
    $query = $this->db->get();
    return $query->row();

  }

  public function get_all_tickets_by_customer_number($customer_number)
  {
    $this->db->select("*, tbl_tickets.id AS ticket_id, tbl_tickets.status AS ticket_status, tbl_projects.id AS project_id, assigned_to.firstname AS a_firstname, assigned_to.lastname AS a_lastname, tbl_projects.project AS project_name, tbl_tickets.status AS ticket_status");
    $this->db->from('tbl_tickets');
     $this->db->join('tbl_users created_by', 'created_by.id = tbl_tickets.created_by');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers_transaction.customer_number = tbl_tickets.customer_number');
    $this->db->join('tbl_buyers', 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->join('tbl_units', 'tbl_units.runitid = tbl_buyers_transaction.runitid AND tbl_units.project = tbl_buyers_transaction.project');
     $this->db->join('tbl_users assigned_to', 'tbl_tickets.assigned_to = assigned_to.id');
    $this->db->join('tbl_projects', 'tbl_projects.project_code = tbl_units.project');
    $this->db->where('tbl_tickets.customer_number', $customer_number); //active
    $query = $this->db->get();
    return $query->result();

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
    $this->db->set('area_description', $area_desc);
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

  public function delete_checking_area_list($area_id) {
    $this->db->delete('tbl_checking_areas_list', array('id' => $area_id));
    return true;
  }

  public function add_position($data) {
    $this->db->insert('tbl_position', $data);
    return $this->db->insert_id();
  }

  public function get_section_by_id($section_id) {
     $this->db->select("*"); 
     $this->db->from('tbl_section');
     $this->db->where('id', $section_id);
     $query = $this->db->get();
     return $query->row();
  }

  public function get_role_by_id($role_id) {
     $this->db->select("*"); 
     $this->db->from('tbl_roles');
     $this->db->where('id', $role_id);
     $query = $this->db->get();
     return $query->row();
  }

  public function delete_position($position_id) {
    $this->db->delete('tbl_position', array('id' => $position_id));
    return true;
  }

  public function update_position($position_id, $section, $role, $position_desc){
    $this->db->set('position_desc', $position_desc);
    $this->db->set('role_id', $role);
    $this->db->set('section_id', $section);
    $this->db->where('id', $position_id);
    $this->db->update('tbl_position');
    return true;
  }

  public function get_projects() {
     $this->db->select("*"); 
     $this->db->from('tbl_projects');
     $query = $this->db->get();
     return $query->result();
  }

  public function get_project_by_id($project_id) {
     $this->db->select("*"); 
     $this->db->from('tbl_projects');
     $this->db->where('id', $project_id);
     $query = $this->db->get();
     return $query->row();
  }

  public function get_project_distance_by_project($project_id) {
     $this->db->select("*, tbl_project_distance.id as distance_id,from.project AS project_fr, to.project AS project_to"); 
     $this->db->from('tbl_project_distance');
     $this->db->join('tbl_projects from', 'from.id = tbl_project_distance.project_from');
     $this->db->join('tbl_projects to', 'to.id = tbl_project_distance.project_to');
     $this->db->where('project_from', $project_id);
     $query = $this->db->get();
     return $query->result();
  }

   public function add_project_distance($data) {
    $this->db->insert('tbl_project_distance', $data);
    return $this->db->insert_id();
  }

  public function get_project_distance_by_id($distance_id) {
     $this->db->select("*, tbl_project_distance.id as distance_id,from.project AS project_fr, from.id AS project_fr_id, to.project AS project_to, to.id AS to_id"); 
     $this->db->from('tbl_project_distance');
     $this->db->join('tbl_projects from', 'from.id = tbl_project_distance.project_from');
     $this->db->join('tbl_projects to', 'to.id = tbl_project_distance.project_to');
     $this->db->where('tbl_project_distance.id', $distance_id);
     $query = $this->db->get();
     return $query->row();
  }

  public function get_project_distance_by_to_from($from, $to) {
     $this->db->select("*, tbl_project_distance.id as distance_id,from.project AS project_fr, to.project AS project_to, to.id AS to_id"); 
     $this->db->from('tbl_project_distance');
     $this->db->join('tbl_projects from', 'from.id = tbl_project_distance.project_from');
     $this->db->join('tbl_projects to', 'to.id = tbl_project_distance.project_to');
     $this->db->where('tbl_project_distance.project_from', $from);
     $this->db->where('tbl_project_distance.project_to', $to);
     $query = $this->db->get();
     return $query->row();
  }

 public function delete_project_distance($position_id) {
    $this->db->delete('tbl_project_distance', array('id' => $position_id));
    return true;
  }

  public function update_project_distance($distance_id, $distance){
    $this->db->set('distance', $distance);
    $this->db->where('id', $distance_id);
    $this->db->update('tbl_project_distance');
    return true;
  }

  public function get_customers(){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_customer_by_id($buyer_id){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers');
    $this->db->where('id', $buyer_id);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_customer_by_custnum($customer_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->where('tbl_buyers.customer_number', $customer_number);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_customer_turnover_date_by_tin($tin, $date, $project, $customer_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers_transaction');
    $this->db->join('tbl_buyers', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->where('tbl_buyers.tin', $tin);
    $this->db->where('tbl_buyers_transaction.project', $project);
    $this->db->where('tbl_buyers_transaction.approved_turnover <', $date);
    $this->db->where('tbl_buyers_transaction.customer_number <>', $customer_number);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_customer_transaction(){
    $this->db->select("*, tbl_buyers_transaction.customer_number AS customer_number, tbl_projects.project AS project"); 
    $this->db->from('tbl_buyers');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->join('tbl_units', 'tbl_units.project = tbl_buyers_transaction.project AND tbl_units.runitid = tbl_buyers_transaction.runitid');
    $this->db->join('tbl_projects', 'tbl_units.project = tbl_projects.project_code');

    $query = $this->db->get();
    return $query->result();
  }

  public function get_customer_transaction_by_unit($unit_id){
    $this->db->select("*, tbl_buyers_transaction.customer_number AS customer_number, tbl_projects.project AS project"); 
    $this->db->from('tbl_buyers');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->join('tbl_units', 'tbl_units.project = tbl_buyers_transaction.project AND tbl_units.runitid = tbl_buyers_transaction.runitid');
    $this->db->join('tbl_projects', 'tbl_units.project = tbl_projects.project_code');
     $this->db->where('tbl_units.id', $unit_id);
    $query = $this->db->get();
    return $query->row();
  }


   public function get_customer_transaction_by_customer_number($customer_number){
    $this->db->select("*, tbl_projects.id AS project_id");
    $this->db->from('tbl_buyers');
    $this->db->join('tbl_buyers_transaction', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->join('tbl_units', 'tbl_units.project = tbl_buyers_transaction.project AND tbl_units.runitid = tbl_buyers_transaction.runitid');
    $this->db->join('tbl_projects', 'tbl_units.project = tbl_projects.project_code');
    $this->db->where('tbl_buyers.customer_number', $customer_number);

    $query = $this->db->get();
    return $query->row();
  }

   public function get_all_properties_by_tin($tin_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers_transaction');
     $this->db->join('tbl_buyers', 'tbl_buyers.customer_number = tbl_buyers_transaction.customer_number');
    $this->db->join('tbl_units', 'tbl_units.project = tbl_buyers_transaction.project AND tbl_units.runitid = tbl_buyers_transaction.runitid');
    $this->db->join('tbl_projects', 'tbl_units.project = tbl_projects.project_code');
    $this->db->where('tbl_buyers.tin', $tin_number);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_documents_by_customer_number($customer_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers_documents');
    $this->db->where('customer_number', $customer_number);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_charges_by_customer_number($customer_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers_advance_charges');
    $this->db->where('customer_number', $customer_number);
    $query = $this->db->get();
    return $query->result();
  }

    public function get_payments_by_customer_number($customer_number){
    $this->db->select("*"); 
    $this->db->from('tbl_buyers_payment');
    $this->db->where('customer_number', $customer_number);
    $query = $this->db->get();
    return $query->result();
  }


  public function add_ticket($data) {
    $this->db->insert('tbl_tickets', $data);
    return $this->db->insert_id();
  }

  // public function get_head_assoc_per_sched($status , $assigned_to ,$schedule){
  //     $this->db->select("* ,  tbl_projects.id AS Origin");
  //     $this->db->from('tbl_turnover_schedule');
  //     $this->db->join('tbl_projects' ,'SUBSTRING_INDEX(ticket_number, "-" , 1) = tbl_projects.project_code');
  //     $this->db->where('status', $status);
  //     $this->db->where('assigned_to' , $assigned_to);
  //     $this->db->like('schedule' , $schedule);
  //     return $this->db->get()->result();
  // }

  public function get_head_assoc_per_sched($assigned_to ,$schedule , $project_to){
      $this->db->select("* ,(SELECT distance FROM tbl_project_distance WHERE project_from = (SELECT id FROM tbl_projects WHERE project_code = SUBSTRING_INDEX(ticket_number, '-' , 1)) and project_to = '".$project_to."') as distance ");
      $this->db->from('tbl_turnover_schedule');
      $this->db->join('tbl_projects' ,'SUBSTRING_INDEX(ticket_number, "-" , 1) = tbl_projects.project_code');
      $this->db->where('status', '0');
      $this->db->where('assigned_to' , $assigned_to);
      $this->db->like('schedule' , $schedule);
      return $this->db->get()->result();
  }

  public function get_project_id($project_code){
    $this->db->select("*");
    $this->db->from('tbl_projects');
    $this->db->where('project_code', $project_code);
    return $this->db->get()->result();
  }

  public function get_project_distance($project_from , $project_to){
    $this->db->select("*");
    $this->db->from('tbl_project_distance');
    $this->db->where('project_from', $project_from);
    $this->db->where('project_to', $project_to);
    return $this->db->get()->result();
  }

  //Get All user with the position tag 10 means hand over assoc and has a status of 1
  public function get_hand_over_assoc(){
    $this->db->select("*");
    $this->db->from('tbl_users');
    $this->db->where('position' , 10);
    $this->db->where('status' , 1);
    return $this->db->get()->result();
  }

  //Get all schedule that assign to hand over assoc with the fully sched 9AM , 11AM , 2PM
  public function get_full_sched_hand_over(){

  }

  //Get the sched of select hand over assoc 
  public function get_sched_of_hand_over($date , $assigned_to){
    $this->db->select("*");
    $this->db->from('tbl_turnover_schedule');
    $this->db->join('tbl_users','tbl_turnover_schedule.assigned_to = tbl_users.id');
    $this->db->where('tbl_users.position' , '10');
    $this->db->where('tbl_turnover_schedule.assigned_to' , $assigned_to);
    $this->db->like('schedule' , $date , 'both');
    return $this->db->get()->result();
  }

   //Get the sched of select hand over assoc 
   public function get_sched_of_outbond_assoc($date , $assigned_to){
    $this->db->select("*");
    $this->db->from('tbl_turnover_schedule');
    $this->db->join('tbl_users','tbl_turnover_schedule.assigned_to = tbl_users.id');
    $this->db->where('tbl_users.position' , '7');
    $this->db->where('tbl_turnover_schedule.assigned_to' , $assigned_to);
    $this->db->like('schedule' , $date , 'both');
    return $this->db->get()->result();
  }

  public function get_sched_of_hand_overs($date , $assigned_to){
    $this->db->select("*");
    $this->db->from('tbl_turnover_schedule');
    $this->db->join('tbl_users','tbl_turnover_schedule.assigned_to = tbl_users.id');
    $this->db->where('tbl_users.position' , '10');
    $this->db->where('tbl_turnover_schedule.assigned_to' , $assigned_to);
    $this->db->where('schedule' , $date);
    return $this->db->get()->result();
  }
  

  public function get_project_id_assoc($project_code){
    $this->db->select("id");
    $this->db->from("tbl_projects");
    $this->db->where('project_code' , $project_code);
    return $this->db->get()->row();
  }

  public function get_distance_project($origin , $distination){
    $this->db->select("distance");
    $this->db->from("tbl_project_distance");
    $this->db->where("project_from" , $origin);
    $this->db->where("project_to" , $distination);
    return $this->db->get()->row();    
  }

  public function get_availability_by_distance($sched , $assigned_to ){

  }

  //For Jobs
  public function get_unit_to_turnover(){
    $this->db->select("* , tbl_buyers.*");
    $this->db->from('tbl_buyers_transaction');
    $this->db->join('tbl_buyers' , 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->where('DATE(tbl_buyers_transaction.building_turnover)');
    $this->db->where('DATE(tbl_buyers_transaction.schedule_date)');
    $this->db->where('tbl_buyers_transaction.status' , 0);
    return $this->db->get()->result();
  }

  public function get_schedule_by_project_code($project_code){
    $this->db->select("*");
    $this->db->from("tbl_turnover_schedule");
    $this->db->where('SUBSTRING_INDEX(tbl_turnover_schedule.ticket_number, "-" , 1) =' , $project_code);
    return $this->db->get()->result(); 
  }


  public function get_turn_over_qualified($date){
    $this->db->select("* , TIME(qualified_turnover_date) as TIME");
    $this->db->from('tbl_buyers_transaction');
   // $this->db->like('qualified_turnover_date',$date , 'both');
    return $this->db->get()->result();
  }

  public function get_turn_over_qualifieds(){
    $this->db->select("*");
    $this->db->from('tbl_buyers_transaction');
    $this->db->join('tbl_buyers' , 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->where('tbl_buyers_transaction.status' , 0);
    return $this->db->get()->result();
  }

  //For parking
  public function get_turn_over_parking(){
    $this->db->select("*");
    $this->db->from('tbl_buyers_transaction');
    $this->db->join('tbl_buyers' , 'tbl_buyers_transaction.customer_number = tbl_buyers.customer_number');
    $this->db->where('tbl_buyers_transaction.status' , 0);
    return $this->db->get()->result();
  }

  public function update_qualified_turnover_date($date , $customer_number){
    $this->db->set('qualified_turnover_date' , $date);
    $this->db->set('status' , 1);
    $this->db->where('customer_number' , $customer_number);
    $this->db->update('tbl_buyers_transaction');
    return $this->db->affected_rows();
  }

  public function get_schedule_for_turnover($customer_number){
    $this->db->select('*');
    $this->db->from("tbl_turnover_schedule");
    $this->db->where('customer_number' ,$customer_number);
    return $this->db->get()->result();
  }

  public function update_status_unit($project , $runitid){
    $this->db->set('status' , 8);
    $this->db->where('project' , $project);
    $this->db->where('runitid' , $runitid);
    return $this->db->affected_rows();
  }

  public function get_buyers_by_customer_number($customer_number){
    $this->db->select("*");
    $this->db->from('tbl_buyers');
    $this->db->where('customer_number' , $customer_number);
    return $this->db->get()->result();
  }

  public function get_ticket_number_by_customer_number($customer_number){
    $this->db->select('tbl_tickets.id as id , tbl_buyers.email_address');
    $this->db->from('tbl_tickets');
    $this->db->join('tbl_buyers' , 'tbl_tickets.customer_number = tbl_buyers.customer_number');
    $this->db->where('tbl_tickets.customer_number' , $customer_number);
    $this->db->where('tbl_tickets.status' , 0);
    return $this->db->get()->result();
  }
}