<?php
  $connect = mysqli_connect('localhost','root','');
  mysqli_select_db($connect,'test1');
  
// Include the main TCPDF library (search for installation path).
include('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P','mm','A4');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', ' Complaints Reports  <hr />', 0, 0, 0, true, '', true);

$html .= '<table border =".5" cellspacing="0" style="text-align:center; line-height:40px; width:100%;">
      <tr>
      <td>name</td>
      <td>address</td>
      <td> age</td>
      <td> gender</td>
      <td> birthday </td>
    </tr>
			';
      
      // Generate from database
      $query = mysqli_query($connect,"SELECT * FROM userinfo WHERE Id = 9");
      while($row = mysqli_fetch_assoc($query))
      {

        $html .= '
        <tr>
          <td>'.$row["Fname"].'</td>
          <td>'.$row["Lname"].'</td>
          <td>'.$row["Gender"].'</td>
          <td>'.$row["Age"].'</td>
          <td>'.$row["Email"].'</td>
        </tr>
        ';
      }
      // Generate from database

$html .="</table>";
$pdf->Ln(12);
$pdf->writeHTML($html);
$title = "My Generated PDF";
 $pdf->SetTitle($title);
ob_end_clean();
$pdf->Output("cleanicRecords.pdf"); //rename your file generated here

		?>
