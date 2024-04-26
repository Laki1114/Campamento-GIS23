<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';


$driver_email = $_SESSION['email'];

// Fetch data from the database for the specific driver
$sql = "SELECT * FROM bookings WHERE email = '$driver_email' AND booking_date BETWEEN '2024-01-01' AND '2024-12-31'";
$result = $con->query($sql);

// Extend TCPDF
class MYPDF extends TCPDF {
    // Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 10, 'Booking Report', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Booking Report');
$pdf->SetSubject('Booking Report');
$pdf->SetKeywords('TCPDF, PDF, booking, report');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Table structure
$html = '<table border="1" cellpadding="5">
            <tr>
                <th>Booking Date</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Pickup Location</th>
                <th>Drop-off Location</th>
        
                <th>Time</th>
              
            </tr>';

// Fetch and display each row of the result
while($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>'.$row['booking_date'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['contact'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['pickup_location'].'</td>
                <td>'.$row['dropoff_location'].'</td>
                
                <td>'.$row['booking_time'].'</td>
             
            </tr>';
}

$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
ob_end_clean(); // Clear any previously generated PDF output
$pdf->Output('booking_report.pdf', 'D');

// Close connection
$con->close();
?>
