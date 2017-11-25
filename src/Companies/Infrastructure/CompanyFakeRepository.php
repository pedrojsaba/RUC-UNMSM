<?php
namespace Companies\Infrastructure;

use Companies\Domain\CompanyRepository;
use Companies\Domain\Company;


class CompanyFakeRepository implements CompanyRepository
{
    public function __construct()
    {
    }

    
    public function getData($code){
         $html = file_get_html(str_replace('%s', $code, 'http://www.razonsocialperu.com/empresa/detalle/%s'));

        $name = $this->get_value($html, NAME_RUC);
        $address = $this->get_value($html, ADDRESS_RUC);
        $phone = $this->get_value($html, PHONE_RUC);

        return new Company($name,$address,$phone);
    }
    
     

    public function get_value($html, $id) {
        $value = explode(": ", $html->find($id, 0)->plaintext);
        $name = "-";
        if (count($value) > 1) {
            $name = $value[1];
        }
        return $name;
    }
}