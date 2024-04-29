<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';

// Start the session
session_start();

$guide_email = $_SESSION['email'];

$sql_guide = "SELECT id FROM guide WHERE email = '$guide_email'";
$result_guide = $con->query($sql_guide);
$row_guide = $result_guide->fetch_assoc();
$guide_id = $row_guide['id'];

// Fetch data for the previous month
$current_month = date('m');
$current_year = date('Y');

// Fetch data for the previous month
$previous_month = $current_month - 1;
$previous_month_year = $current_year;
if ($previous_month == 0) {
    $previous_month = 12;
    $previous_month_year = $current_year - 1;
}

// Calculate the first and last day of the previous month
$first_day_of_previous_month = date('Y-m-01', strtotime("$previous_month_year-$previous_month-01"));
$last_day_of_previous_month = date('Y-m-t', strtotime("$previous_month_year-$previous_month-01"));

// Fetch data from the database for the specific guide and previous month
$sql = "SELECT * FROM booking_guide WHERE guide_id = '$guide_id' AND checkIn BETWEEN '$first_day_of_previous_month' AND '$last_day_of_previous_month'";
$result = $con->query($sql);

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Guide Booking Report');
$pdf->SetSubject('Guide Booking Report');
$pdf->SetKeywords('TCPDF, PDF, guide, booking, report');

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
$total_earnings = 0;
$total_completed = 0;
$total_cancelled = 0;
$guide_bookings = 0;
$hourly_bookings = 0;
$half_day_bookings = 0;
$full_day_bookings = 0;
$hourly_amount = 0;
$half_day_amount = 0; 
$full_day_amount = 0;

// Fetch and calculate data
while($row = $result->fetch_assoc()) {
    $total_bookings++;
    $total_earnings += $row['amount'];

    switch ($row['booking_status']) {
        case 2:
            $total_completed++;
            break;
        case 3:
            $total_cancelled++;
            break;
    }

    if ($row['bookingType'] == 'guide') {
        $guide_bookings++;

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

// Print the data into the PDF
$html = '<h1>Guide Booking Report - ' . date('F Y', strtotime("$previous_month_year-$previous_month-01")) . '</h1>';
$html .= '<p>Total Guide Bookings: '.$guide_bookings.'</p>';
$html .= '<p>Total Earnings: LKR '.$total_earnings.'</p>';
$html .= '<p>Total Completed Bookings: '.$total_completed.'</p>';
$html .= '<p>Total Cancelled Bookings: '.$total_cancelled.'</p>';
$html .= '<p>Total Hourly Bookings: '.$hourly_bookings.'</p>';
$html .= '<p>Total Half Day Bookings: '.$half_day_bookings.'</p>';
$html .= '<p>Total Full Day Bookings: '.$full_day_bookings.'</p>';


// Print the HTML content into the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close connection
$con->close();

// Close and output PDF document
ob_end_clean(); // Clean the output buffer
$pdf->Output("guide_booking_report_" . date('F_Y', strtotime("$previous_month_year-$previous_month-01")) . ".pdf", 'D');
?>
