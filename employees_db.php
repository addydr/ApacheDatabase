<?php
class EmployeesDB {
    //          WHERE categoryID = :category_id

    public static function getEmployeesByLastName($lastName="",$start=0,$limit=50) 
    {
    // NEW DATABASE OBJECT
    $_DB = new DB();    
        
     if ($start ==0)
    {
        // (B) SEARCH FOR USERS
        $results = $_DB->returnOne(
        "SELECT count(*) as num "
        . "FROM `example_employees` "
        . "where lcase(last_name) like ?",
        ["%". strtolower($lastName)."%"],
        );        

        if ($results != null)
        {
            // Set session variables
            $_SESSION["NumResults"] = $results['num'];
        }
    }    
    
    $query = 'SELECT emp_no, '
            . 'first_name,last_name,'
            . 'date_format(birth_date,\'%m/%d/%Y\') as birth_date,' 
            . 'date_format(hire_date,\'%m/%d/%Y\') as hire_date,' 
            . 'gender'
            . ' FROM example_employees'
            . ' where lcase(last_name) like ?'
            . ' ORDER BY emp_no'
            . ' limit '.$limit.' Offset '.$start;

    $rows = $_DB->select($query,["%". strtolower($lastName)."%"],);        
    unset($_DB);
    foreach ($rows as $row) {
        $emp = new Employee($row['first_name'],
                            $row['last_name'],
                            $row['birth_date'],
                            $row['hire_date'],
                            $row['gender']);
        $emp->setEmpNo($row['emp_no']);
        $employees[] = $emp;
    }
    return $employees;
    }

    public static function getEmployee($emp_no) {
        // NEW DATABASE OBJECT
        $_DB = new DB();    
        $query = 'SELECT emp_no, '
            . 'first_name,last_name,'
            . 'date_format(birth_date,\'%m/%d/%Y\') as birth_date,' 
            . 'date_format(hire_date,\'%m/%d/%Y\') as hire_date,' 
            . 'gender '
            . ' FROM example_employees'
            . ' WHERE emp_no = ?';
        $rows = $_DB->select($query,[$emp_no]);
        unset($_DB);

        foreach ($rows as $row) {
            $emp = new Employee($row['first_name'],
                            $row['last_name'],
                            $row['birth_date'],
                            $row['hire_date'],
                            $row['gender']);
            $emp->setEmpNo($row['emp_no']);
            $employees[] = $emp;
        }
        return $employees[0];
    }

    
        public static function addEmployee($employee) {
        $_DB = new DB(); 
        $query = 'INSERT INTO example_employees '.
                  '  (emp_no, birth_date, first_name, last_name,'.
                  '   gender, hire_date)' .
                  '  select max(emp_no)+1, ?, ?, ?, ?, ? from example_employees';
        
         try {

          $_DB->execute($query,
                   [$employee->getBirthDate(),
                    $employee->getFirstName(),   
                    $employee->getLastName(),   
                    $employee->getGender(),
                    $employee->getHireDate()],);        

          
          $query = 'SELECT emp_no '
            . ' FROM example_employees'
            . ' WHERE first_name = ? and last_name = ?'
            . ' and birth_date = ?'
            . ' and hire_date = ?'
            . ' and gender  = ?';

          $rows = $_DB->select($query,
                    [
                    $employee->getFirstName(),   
                    $employee->getLastName(),   
                    $employee->getBirthDate(),
                    $employee->getHireDate(),
                    $employee->getGender()]);
        unset($_DB);

        foreach ($rows as $row) 
             $emp_no = $row['emp_no'];
        
        return $emp_no;   
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function updateEmployee($employee) {
        $_DB = new DB(); 
        $query = 'Update example_employees '.
                 '   set birth_date = ?,  first_name = ?,'. 
                 '  last_name = ?,'.
                 '    gender = ?, hire_date = ? '.
                 '   WHERE emp_no = ?';
        try {

           $NumResults =  $_DB->execute($query,
                   [
                    $employee->getBirthDate(),
                    $employee->getFirstName(),   
                    $employee->getLastName(),   
                    $employee->getGender(),
                    $employee->getHireDate(),
                    $employee->getEmpNo()],);  
           unset($_DB);
           return $NumResults;
           
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function deleteEmployee($emp_no) {
        $_DB = new DB(); 
        $query = 'DELETE FROM example_employees
                  WHERE emp_no = ?';
        try {

           $NumResults = $_DB->execute($query,[$emp_no],);        
           unset($_DB);
           return $NumResults;

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    
        public static function assignEmployeeDept($emp_no,$dept_no) 
        {
        $_DB = new DB(); 
        $query = 'Update example_dept_emp '.
                 '   set to_date = NOW() '. 
                 '   WHERE emp_no = ? and to_date = "9999-01-01"';
        try {

           $_DB->execute($query,
                   [$emp_no],);  
           
           
            $query = 'Insert into example_dept_emp '.
                 '   (emp_no, dept_no, from_date, to_date) '. 
                 '   values(?, ?,NOW(),"9999-01-01")';
           
           $_DB->execute($query,
                   [$emp_no,$dept_no],);  
           
           
           unset($_DB);
           
           
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

}
?>