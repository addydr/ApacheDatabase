<?php
class DepartmentDB {
    //          WHERE categoryID = :category_id

    public static function getDeprtments() 
    {
    // NEW DATABASE OBJECT
    $_DB = new DB();    
    
    $query = 'SELECT dept_no, '
            . 'dept_name '
            . ' FROM example_departments'
            . ' ORDER BY dept_name';
    $rows = $_DB->select($query,);        
    unset($_DB);
    foreach ($rows as $row) {
        $dept = new Department($row['dept_no'],
                            $row['dept_name']);
        $departments[] = $dept;
    }
    return $departments;
    }

}
?>