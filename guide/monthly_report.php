<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';

$guide_email = $_SESSION['email'];

$sql_guide = "SELECT id FROM guide WHERE email = '$guide_email'";
$result_guide = $con->query($sql_guide);
$row_guide = $result_guide->fetch_assoc();
$guide_id = $row_guide['id'];

// Fetch data from the database for the specific guide
$sql = "SELECT * FROM booking_guide WHERE guide_id = '$guide_id' AND checkIn BETWEEN '2024-01-01' AND '2024-12-31'";
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

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Initialize variables
$total_bookings = 0;
$total_amount = 0;
$total_pending = 0;
$total_confirmed = 0;
$total_completed = 0;
$total_cancelled = 0;
$guide_bookings = 0;
$taxi_bookings = 0;
$guide_amount = 0;
$taxi_amount = 0;
$hourly_bookings = 0;
$half_day_bookings = 0;
$full_day_bookings = 0;
$hourly_amount = 0;
$half_day_amount = 0;
$full_day_amount = 0;

// Table structure for Guide bookings
$html_guide = '<h2>Guide Bookings</h2>
            <table border="1" cellpadding="5">
            <tr>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th>Reference number</th>
                <th>Booking Type</th>
                <th>Booking Status</th>
            </tr>';

// Fetch and display each row of the result
while($row = $result->fetch_assoc()) {
    $total_bookings++;
    $total_amount += $row['amount'];

    switch ($row['booking_status']) {
        case 0:
            $total_pending++;
            break;
        case 1:
            $total_confirmed++;
            break;
        case 2:
            $total_completed++;
            break;
        case 3:
            $total_cancelled++;
            break;
    }

    if ($row['bookingType'] == 'guide') {
        $guide_bookings++;
        $guide_amount += $row['amount'];
        $html_guide .= '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['checkIn'].'</td>
                    <td>'.$row['reference_number'].'</td>
                    <td>'.$row['bookingType'].'</td>
                    <td>'.$row['booking_status'].'</td>
                </tr>';

        switch ($row['bookingType']) {
            case 'hourly':
                $hourly_bookings++;
                $hourly_amount += $row['amount'];
                break;
            case 'half_day':
                $half_day_bookings++;
                $half_day_amount += $row['amount'];
                break;
            case 'full_day':
                $full_day_bookings++;
                $full_day_amount += $row['amount'];
                break;
        }
    }
}

$html_guide .= '</table>';

$html_guide .= '<h2>Summary</h2>';
$html_guide .= '<p>Total Guide Bookings: '.$guide_bookings.'</p>';
$html_guide .= '<p>Total Hourly Bookings: '.$hourly_bookings.'</p>';
$html_guide .= '<p>Total Half Day Bookings: '.$half_day_bookings.'</p>';
$html_guide .= '<p>Total Full Day Bookings: '.$full_day_bookings.'</p>';
$html_guide .= '<p>Total Amount Earned: '.$guide_amount.'</p>';
$html_guide .= '<p>Total Hourly Amount: '.$hourly_amount.'</p>';
$html_guide .= '<p>Total Half Day Amount: '.$half_day_amount.'</p>';
$html_guide .= '<p>Total Full Day Amount: '.$full_day_amount.'</p>';

// Output
$pdf->writeHTML($html_guide, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('guide_booking_report.pdf', 'D');

// Close connection
$con->close();
?>
