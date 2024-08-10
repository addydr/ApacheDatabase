<?php
class Department {

    public function __construct(
        private string $dept_no,
        private string $dept_name,
    ) { }

    public function getDeptNo() {
        return $this->dept_no;
    }

    public function getDeptName() {
        return $this->dept_name;
    }

    public function setDeptNo($val) {
        $this->dept_no = $val;
    }

    public function setDeptName($val) {
        $this->dept_name = $val;
    }

 }
?>