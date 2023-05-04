<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once('tcpdf/tcpdf_include.php');
class MYPDF extends TCPDF {
	public function Header() {
		// $bMargin = $this->getBreakMargin();
		// $auto_page_break = $this->AutoPageBreak;
		// $this->SetAutoPageBreak(false, 0);
		// $img_file = K_PATH_IMAGES.'background-sertifikat.png';
		// $this->Image($img_file, 0, 0, 300, 300, '', '', '', false, 300, '', false, false, 0);
		// $this->SetAutoPageBreak($auto_page_break, $bMargin);
		// $this->setPageMark();

		$this->SetCreator('Testing');
		$this->SetAuthor('RSHS');
	}
}

function create_pdf($data){
	$pdf_unit = PDF_UNIT;
	$pdf_page_format = PDF_PAGE_FORMAT;
	$pdf_font_name_main = PDF_FONT_NAME_MAIN;
	$pdf_font_size_main = PDF_FONT_SIZE_MAIN;
	$pdf_font_monospaced = PDF_FONT_MONOSPACED;
	$pdf_margin_left = PDF_MARGIN_LEFT;
	$pdf_margin_top = PDF_MARGIN_TOP;
	$pdf_margin_right = PDF_MARGIN_RIGHT;
	//$pdf_margin_right = PDF_MARGIN_RIGHT;
	$pdf_margin_bottom = PDF_MARGIN_BOTTOM;
	$pdf_image_scale_ratio = PDF_IMAGE_SCALE_RATIO;

	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$k_path_images = $root.'assets/modules/sertifikat/';

	$pdf = new MYPDF('L', $pdf_unit, $pdf_page_format, true, 'UTF-8', false);

	$title = (!empty($data['title'])) ? $data['title'] : '';
	$subject = (!empty($data['subject'])) ? $data['subject'] : '';
	$keywords = (!empty($data['keywords'])) ? $data['keywords'] : '';

	$no_medrek = (!empty($data['no_medrek'])) ? $data['no_medrek'] : '';
	$nama = (!empty($data['nama'])) ? $data['nama'] : '';
	$tgl_konsul = (!empty($data['tgl_konsul'])) ? $data['tgl_konsul'] : '';
	$tgl_lahir = (!empty($data['tgl_lahir'])) ? $data['tgl_lahir'] : '';
	$nama_dokter = (!empty($data['nama_dokter'])) ? $data['nama_dokter'] : '';
	$jam_konsul = (!empty($data['jam_konsul'])) ? $data['jam_konsul'] : '';
	$resep = (!empty($data['resep'])) ? $data['resep'] : '';
	$umur = (!empty($data['umur'])) ? $data['umur'] : '';
	$sip = (!empty($data['no_sip'])) ? $data['no_sip'] : '';
	$nip_dokter = (!empty($data['nip_dokter'])) ? $data['nip_dokter'] : '';
	$tgl_resevasi = (!empty($data['tgl_resevasi'])) ? $data['tgl_resevasi'] : '';
	$status_resep = (!empty($data['status_resep'])) ? $data['status_resep'] : '';
	
	//$date_ = date_create($tgl_resevasi);
	//$date_2 = date_add($date_,date_interval_create_from_date_string("1 days"));
	$date = DateTime::createFromFormat('d/m/Y',$tgl_resevasi)->format('Y-m-d');
	//$date_ = date_create($date);
	$berlaku_s_d = date("d-m-Y",strtotime($date. ' + 3 days'));
	

	$pdf->SetTitle($title);
	$pdf->SetSubject($subject);
	$pdf->SetKeywords($keywords);

	$pdf->setHeaderFont(Array($pdf_font_name_main, '', $pdf_font_size_main));
	$pdf->SetDefaultMonospacedFont($pdf_font_monospaced);
	//$pdf->SetMargins($pdf_margin_left, $pdf_margin_top, $pdf_margin_right);
	$pdf->SetMargins(5, 17, 5);
	$pdf->SetHeaderMargin(0);
	$pdf->SetFooterMargin(0);
	$pdf->setPrintFooter(false);
	//$pdf->SetAutoPageBreak(TRUE, $pdf_margin_bottom);
	$pdf->SetAutoPageBreak(false, 0);
	$pdf->setImageScale($pdf_image_scale_ratio);

	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	$pdf->SetFont('times', '', 48);
	$resolution= array(110, 148); //tinggi, lebar
 	$pdf->AddPage('P', $resolution);
	//$pdf->AddPage();

	$bMargin = $pdf->getBreakMargin();
	//$auto_page_break = $pdf->AutoPageBreak;
	$pdf->SetAutoPageBreak(false, 0);

	if($status_resep == '1'){
		$img_file = _A_C_I_BACKGROUND.'tercetak.png';
		$pdf->Image($img_file, 3, 3, 100, 138, '', '', '', false, 200, '', false, false, 0);
		//$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		$pdf->setPageMark();
	}

/* logo 1 */
	$img_file = _A_C_I_LOGO.'logo.png';
	$pdf->Image($img_file, 5, 5, 14, 7, '', '', '', false, 10, '', false, false, 0);

/* logo 2 */
	//$img_file = _A_C_I_LOGO.'logo.png';
	//$pdf->Image($img_file, 195, 10, 30, 30, '', '', '', false, 50, '', false, false, 0);
	//$pdf->Ln(3);	


	//header
	$pdf->MultiCell(5, 5, '', 0, 'C', 0, 0, '', 4.5, true);
	$html = '<span style="text-align:center;font-size:9pt; font-weight: bold;">
				 RSUP Dr. Hasan Sadikin Bandung</span>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(5, 5, '', 0, 'C', 0, 0, '', 8, true);
	$html = '<span style="text-align:center;font-size:6pt;">
				 Jalan Pasteur No.38, Bandung 40161</span>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(5, 5, '', 0, 'C', 0, 0, '', 11, true);
	$html = '<span style="text-align:center;font-size:6pt;">
				 Telepon : (022) 2034953, 2034954 (hunting) Faksimile : (022) 2032216, 2032533</span>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(5, 5, '', 0, 'C', 0, 0, '', 14, true);
	$html = '<span style="text-align:center;font-size:4pt;">
				 <i>SMS hotline : 08112335555, Contact Center : 022 - 2551111, Reservasi Online : reservasi.rshs.or.id, facebook : /rshsbdg, twiter@rshsbdg
				 </i></span>';
	$pdf->writeHTML($html, true, false, true, false, '');


	$pdf->MultiCell(15, 5, '', 0, 'C', 0, 0, '', 16, true);
	$pdf->writeHTML('<hr>', true, false, true, false, '');
	$pdf->MultiCell(15, 5, '', 0, 'C', 0, 0, '', 18, true);
	$html = '<span style="text-align:right;font-size:9pt;">
				 Bandung, '.date('d M Y').'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');

	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 23, true);
	$html = '<span style="text-align:left;font-size:9pt;">
				 Dokter : '.$nama_dokter.'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 27, true);
	$html = '<span style="text-align:left;font-size:9pt;">
				 SIP : '.$sip.'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');

	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 30, true);
	$html = '<span style="text-align:left;font-size:15pt; font-family:Arial; font-weight: bold;">
				 R/</span>';
	$pdf->writeHTML($html, true, false, true, false, '');

	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 45, true);
	$html = '<p style="text-align:left;font-size:10pt; font-family:Arial;">
				 </p>';
	$pdf->writeHTML($html, true, false, true, false, '');

	$html = '<table>
				<tr>
					<td style="font-size:10pt; ">'.$resep.'</td>
				</tr>
			</table>';

	$pdf->writeHTML($html, true, false, true, false, '');
	

	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 120, true);
	$html = '<span style="text-align:left;font-size:9pt;">
				 Pro  : '.$nama.'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(0, 0, '', 0, 'C', 0, 0, '', 125, true);
	$html = '<span style="text-align:left;font-size:9pt;">
				 Umur : '.$umur.'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');


	$pdf->MultiCell(15, 5, '', 0, 'C', 0, 0, '', 140, true);
	
	$html = '<span style="text-align:right;font-size:8pt;">Resep ini berlaku s/d '.$berlaku_s_d.'</span>';
	$pdf->writeHTML($html, true, false, true, false, '');

	$pdf->setCellPaddings(1,1,1,1);
	$pdf->setCellMargins(1,1,1,1);
	$pdf->setFillColor(255,255,255);
	$pdf->MultiCell(15, 5, '', 0, 'C', 0, 0, '', 110, true);
	$style = array(
		'border' => false,
		'padding' => 0,
		'fgcolor' => array(0,0,0),
		'bgcolor' => false
	);
	$html = '';
	$qrcode = $pdf->write2DBarcode($root.'cetak_apotik.html?no_medrek='.$no_medrek.'&tgl_konsul='.$tgl_resevasi.'&id_dokter='.$nip_dokter, 'QRCODE,H', 67, '', 30, 30, $style, 'N');
	$qrcode .= $pdf->writeHTML($html, true, false, true, false, '');
	$pdf->MultiCell(15, 5, $qrcode, 0, 'C', 0, 0, '', 130, true);
	$pdf->MultiCell(15, 5, '', 0, 'C', 0, 0, '', 130, true);

	$pdf->Output('Resep_telekonsultasi_rshs '.$no_medrek.'.pdf', 'I');
}