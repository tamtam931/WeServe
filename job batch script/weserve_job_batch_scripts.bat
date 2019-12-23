@echo off
call :sub >weserve_job_script_log_file_for_%date:~-4,4%%date:~-7,2%%date:~-10,2%.txt
exit /b

:sub
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_check_for_qualified_turnover_date
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_check_for_qualified_exceed_24hrs
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_for_parking
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_send_link_for_scheduling
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_for_deemed_legally_accepted
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_acceptance_of_units_from_qcd
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_no_schedule_beyond_15_working_days
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php Admin job_daily_notify_for_qualified_no_shed_status