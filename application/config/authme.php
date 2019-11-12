<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$config['authme_password_min_length'] = 4;
$config['authme_portable_hashes'] = false;

/*
  |---------------------------------------------------
  | Database table config
  |---------------------------------------------------
 */

$config['tbl_accounts'] = 'tbl_accounts';
/*$config['db_tbl_users_data'] = 'tbl_users_data';
$config['db_tbl_unknown'] = 'tbl_unknown';*/

/* End of file: authme.php */
/* Location: application/config/authme.php */