<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class LaporanController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
		return view('admin.laporan.index');
    }

    ## Tampikan Data
    public function cetak_laporan(Request $request)
    {
      
     
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(10);
        $sheet->getColumnDimension('C')->setWidth(40);
        $sheet->getColumnDimension('D')->setWidth(17);
        $sheet->getColumnDimension('E')->setWidth(12);
        $sheet->getColumnDimension('F')->setWidth(30);
        
        $tgl = substr($request->tanggal,3,2);
        $bln = substr($request->tanggal,0,2);
        $thn = substr($request->tanggal,6,4);
        
        $tgl2 = substr($request->tanggal,16,2);
        $bln2 = substr($request->tanggal,13,2);
        $thn2 = substr($request->tanggal,19,4);
        
        $tanggal = $thn.'-'.$bln.'-'.$tgl;
        $tanggal2 = $thn2.'-'.$bln2.'-'.$tgl2;

        if($tanggal==$tanggal2){
            $sheet->setCellValue('A1', 'ANTRIAN VAKSIN TANGGAL '.date('d-m-Y', strtotime($tanggal)) );
        } else {
            $sheet->setCellValue('A1', 'ANTRIAN VAKSIN TANGGAL '.date('d-m-Y', strtotime($tanggal)).' SAMPAI '.date('d-m-Y', strtotime($tanggal2)) );
        }
        
        $sheet->getStyle('A1')->getFont()->setBold(true);

        
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NO. URUT');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'TANGGAL VAKSIN');
        $sheet->setCellValue('E3', 'VAKSIN KE');
        $sheet->setCellValue('F3', 'FASKES');
        $sheet->getStyle('A3:F3')->getFont()->setBold(true);
        $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $rows = 4;
        $no = 1;
  
        $antrian = Antrian::
                  select('antrian_tbl.*', 'nama_faskes')
                  ->leftJoin('faskes_tbl', 'antrian_tbl.faskes', '=', 'faskes_tbl.id')
                  ->whereBetween('tanggal', array($tanggal, $tanggal2))
                  ->where('status_hapus', 0)
                  ->orderBy('id','ASC')
                  ->get();

      
        foreach($antrian as $v){
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->getStyle('A' . $rows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $sheet->setCellValue('B' . $rows, $v->no_urut);
            $sheet->getStyle('B' . $rows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $sheet->setCellValue('C' . $rows, $v->nama);
            $sheet->setCellValue('D' . $rows, date('d-m-Y', strtotime($v->tanggal)));
            $sheet->getStyle('D' . $rows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            if($v->vaksin_ke==1){
                $sheet->setCellValue('E' . $rows, 'Vaksin 1');
            } else if($v->vaksin_ke==3){
                $sheet->setCellValue('E' . $rows, 'Vaksin 1');
            }else if($v->vaksin_ke==2){
                $sheet->setCellValue('E' . $rows, 'Vaksin 2');
            }
            $sheet->getStyle('E' . $rows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
								
            $sheet->setCellValue('F' . $rows, $v->nama_faskes);
            $sheet->getStyle('F' . $rows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $rows++;
        }
      
        $sheet->getStyle('A3:F'.($rows-1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $type = 'xlsx';
        $fileName = "Laporan.".$type;
        if($type == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
        } else if($type == 'xls') {
            $writer = new Xls($spreadsheet);			
        }		
        $writer->save("public/upload/report/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        return redirect(url('/')."/public/upload/report/".$fileName);

    }
}
