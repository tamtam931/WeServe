@echo off
call :sub >weserve_job_batch_buyers_transac_log_file_for_%date:~-4,4%%date:~-7,2%%date:~-10,2%.txt
exit /b


:sub
C:\xampp\php\php.exe C:\xampp\htdocs\weserve\index.php JobController job_buyers_transanc