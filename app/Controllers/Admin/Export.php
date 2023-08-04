<?php

namespace App\Controllers\Admin;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends \App\Controllers\BaseController
{
    public function structure()
    {
        $users = $this->getUsers();
        $spreadsheet = $this->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $this->addHeaders($sheet);
        $this->addUserData($sheet, $users);
        $file_name = 'liste_structure.xlsx';
        $this->exportExcel($spreadsheet, $file_name);
        exit;
    }
    public function acteur()
    {
        $users = $this->getActeurs();
        $spreadsheet = $this->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $this->addHeadersActeur($sheet);
        $this->addActeurData($sheet, $users);
        $file_name = 'liste_acteur.xlsx';
        $this->exportExcel($spreadsheet, $file_name);
        exit;
    }

    private function getActeurs()
    {
        $db = db_connect();
        return $db->table('v_act_struct_user')->get()->getResultArray();
    }

    private function getUsers()
    {
        $db = db_connect();
        return $db->table('v_cs_stru_user_cat')->get()->getResultArray();
    }

    private function createSpreadsheet()
    {
        return new Spreadsheet();
    }

    private function addHeaders($sheet)
    {
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nom Social');
        $sheet->setCellValue('C1', 'Categorie');
        $sheet->setCellValue('D1', 'Siren');
        $sheet->setCellValue('E1', 'E-mail');
    }
    private function addHeadersActeur($sheet)
    {
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nom Social');
        $sheet->setCellValue('C1', 'Poste');
        $sheet->setCellValue('D1', 'Structure');
        $sheet->setCellValue('E1', 'Sigle');
    }

    private function addActeurData($sheet, $users)
    {
        $row = 2;
        foreach ($users as $user) {
            $this->setCellValue($sheet, 'A' . $row, $user['id']);
            $this->setCellValue($sheet, 'B' . $row, $user['nom'] . $user['prenom']);
            $this->setCellValue($sheet, 'C' . $row, $user['poste']);
            $this->setCellValue($sheet, 'D' . $row, $user['nom_social']);
            $this->setCellValue($sheet, 'E' . $row, $user['sigle']);
            $row++;
        }
    }

    private function addUserData($sheet, $users)
    {
        $row = 2;
        foreach ($users as $user) {
            $this->setCellValue($sheet, 'A' . $row, $user['id']);
            $this->setCellValue($sheet, 'B' . $row, $user['nom_social']);
            $this->setCellValue($sheet, 'C' . $row, $user['nomcategorie']);
            $this->setCellValue($sheet, 'D' . $row, $user['siren']);
            $this->setCellValue($sheet, 'E' . $row, $user['email_siege']);
            $row++;
        }
    }

    private function setCellValue($sheet, $cell, $value)
    {
        $sheet->setCellValue($cell, $value);
    }

    private function exportExcel($spreadsheet, $file_name)
    {
        $writer = new Xlsx($spreadsheet);
        $this->setExcelHeaders($file_name);
        $writer->save('php://output');
    }

    private function setExcelHeaders($file_name)
    {
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
    }
}
