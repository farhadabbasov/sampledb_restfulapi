<?php

namespace App\Services;

class Employer
{
    private $salaryAmount;

    private $employerName;
    public function getName(){
        return $this->employerName;
    }

    public function setName($name){
        $this->employerName = $name;
    }

    public function setSalary($amount){
        $this->salaryAmount = $amount;
    }

    public function getSalary(){
        return $this->salaryAmount;
    }

    public function calculateTaxes(){
        return $this->getSalary()*0.2;
    }

    public function getSalaryAfterTaxes(){
        return $this->getSalary()-$this->calculateTaxes();
    }
}
