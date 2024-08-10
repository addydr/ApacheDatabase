<?php
class Employee {
    private int $emp_no;

    public function __construct(
        private string $first_name,
        private string $last_name,
        private string $birth_date,
        private string $hire_date,
        private string $gender,
    ) { }

    public function getEmpNo() {
        return $this->emp_no;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    
    public function getFullName() {
        return $this->first_name." ".$this->last_name;
    }

    public function getBirthDate() {
        return $this->birth_date;
    }

    public function getHireDate() {
        return $this->hire_date;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setEmpNo($val) {
        $this->emp_no = $val;
    }

    public function setFirstName($val) {
        $this->first_name = $val;
    }

    public function setLastName($val) {
        $this->last_name = $val;
    }

    public function setBirthDate($val) {
        $this->birth_date = $val;
    }

    public function setHireDate($val) {
        $this->hire_date = $val;
    }

    public function setGender($val) {
        $this->gender = $val;
    }
}
?>