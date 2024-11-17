<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../libs/tcpdf/tcpdf.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kapcsolatadmin_Export_Controller
{
    public function main($vars)
    {
        $type = $_GET['type'] ?? '';
        require_once __DIR__ . '/../includes/database.inc.php';
        $connection = Database::getConnection();
        $sql = "SELECT id, csaladi_nev, utonev, bejelentkezes FROM felhasznalok";
        $stmt = $connection->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($type === 'pdf') {
            $this->exportToPDF($users);
        } elseif ($type === 'excel') {
            $this->exportToExcel($users);
        } else {
            echo "Hibás export típus.";
        }
    }

    private function exportToPDF($users)
    {
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Felhasználói adatok');
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 10);

        $html = '<h1>Felhasználói adatok</h1><table border="1" cellpadding="5">';
        $html .= '<tr><th>ID</th><th>Családi Név</th><th>Utónév</th><th>Bejelentkezés</th></tr>';
        foreach ($users as $user) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($user['id']) . '</td>';
            $html .= '<td>' . htmlspecialchars($user['csaladi_nev']) . '</td>';
            $html .= '<td>' . htmlspecialchars($user['utonev']) . '</td>';
            $html .= '<td>' . htmlspecialchars($user['bejelentkezes']) . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('users_export.pdf', 'D');
        exit();
    }

    private function exportToExcel($users)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Családi Név');
        $sheet->setCellValue('C1', 'Utónév');
        $sheet->setCellValue('D1', 'Bejelentkezés');

        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user['id']);
            $sheet->setCellValue('B' . $row, $user['csaladi_nev']);
            $sheet->setCellValue('C' . $row, $user['utonev']);
            $sheet->setCellValue('D' . $row, $user['bejelentkezes']);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="users_export.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }
}

$exportController = new Kapcsolatadmin_Export_Controller();
$exportController->main($_GET);
?>
