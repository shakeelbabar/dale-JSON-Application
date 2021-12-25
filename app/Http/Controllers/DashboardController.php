<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use SimpleXLSX;
use stdClass;

class DashboardController extends Controller
{
    /**
     * @Request request header parameter to get access to url headers
     */
    public function index(Request $request)
    {
        return View::make('Home');
    }

    public function dashboard(Request $request)
    {
        if ($request->file('file_sheet')) {
            return View::make('dashboard', ['data' => $this->getSheet($request->file('file_sheet'))]);
        } else {
            return View::make('dashboard', ['data' => null]);
        }
    }

    public function loadSpreadsheet(Request $request)
    {
        echo '<pre>';
        if ($request->file('file_sheet')) {
            $file = $request->file('file_sheet');


            // echo $file->getClientOriginalName().'<br>';
            // echo $file->getFilename().'<br>';
            // echo $file->getFileInfo().'<br>';
            // echo $file->getPathInfo();

            // if ( $xlsx = SimpleXLSX::parse( 'xlsx/books.xlsx' ) ) {
            //     print_r( $xlsx->sheetNames() );
            //     print_r( $xlsx->sheetName( $xlsx->activeSheet ) );
            // }

            // $xlsx = SimpleXLSX::parse('book.xlsx');	
            // echo 'Sheet Name 2 = '.$xlsx->sheetName(1);

            // if ( $xlsx = SimpleXLSX::parse($file->getFileInfo()) ) {
            //     print_r( $xlsx->rows() );
            // } else {
            //     echo SimpleXLSX::parseError();
            // }

            // ini_set('error_reporting', E_ALL );
            // ini_set('display_errors', 1 );

            // if ( $xlsx = SimpleXLSX::parseFile($file->getFileInfo(), true ) ) {
            //     echo $xlsx->toHTML();
            // } else {
            //     echo SimpleXLSX::parseError();
            // }

            $data = new stdClass;
            $newRow = true;
            $nol = 0;
            $noc = 0;
            echo '<pre>';
            echo 'here' . '<br>';
            if ($xlsx = SimpleXLSX::parse($file->getFileInfo())) {
                foreach ($xlsx->rows() as $r => $row) {
                    $label = 'label' . $nol;
                    foreach ($row as $c => $cell) {
                        if ($c == 0) {
                            if ($r == 0) {
                                $nol += 1;
                                $label = 'label' . $nol;
                                $data->$label = new stdClass;
                                $data->$label->$label = $cell;
                                $data->$label->section1 = new stdClass;
                                $data->$label->section2 = new stdClass;
                                $data->$label->section3 = new stdClass;
                            } else {
                                if ($cell == "") {
                                    $newRow = false;
                                } else {
                                    $newRow = true;
                                }
                                if ($newRow) {
                                    $nol += 1;
                                    $label = 'label' . $nol;
                                    $data->$label = new stdClass;
                                    $data->$label->$label = $cell;
                                    $data->$label->section1 = new stdClass;
                                    $data->$label->section2 = new stdClass;
                                    $data->$label->section3 = new stdClass;
                                }
                            }
                        } else {
                            $noc += 1;
                            $col = 'button' . $noc;
                            if ($c > 0 && $c < 4)
                                $data->$label->section1->$col = $cell;
                            elseif ($c > 3 && $c < 7)
                                $data->$label->section2->$col = $cell;
                            elseif ($c > 6 && $c < 10)
                                $data->$label->section3->$col = $cell;
                        }
                        echo ($c > 0) ? ', ' : '';
                        echo ($r === 0) ? '<b>' . $cell . '</b>' : $cell;
                    }
                    echo '<br/>';
                }
            } else {
                echo SimpleXLSX::parseError();
            }
            print_r($data);
            die();
            // echo '</pre>';
        }
    }

    public function loadfile(Request $request)
    {
        // $this->loadSpreadsheet($request);
        if($request->file('file_sheet')){
            $file = $request->file('file_sheet');
            if ( $xlsx = SimpleXLSX::parse($file->getFileInfo()) ) {
                return View::make('dashboard', ['data'=>$this->formatXLSX($xlsx)]);
            } else {
                //echo SimpleXLSX::parseError();
                return View::make('dashboard', ['data'=>null]);
            }            
        }
    }

    public function testLoadFile(Request $request)
    {
        if ($request->file('file_sheet')) {
            $file = $request->file('file_sheet');
            if ($xlsx = SimpleXLSX::parse($file->getFileInfo())) {
                return View::make('loadedsheet', ['data' => $this->formatXLSX($xlsx)]);
            } else {
                //echo SimpleXLSX::parseError();
                return View::make('loadedsheet', ['data' => null]);
            }
        }
    }

    public function getSheet($file)
    {
        if ($xlsx = SimpleXLSX::parse($file->getFileInfo())) {
            return $xlsx;
        } else {
            return null;
        }
    }

    public function formatXLSX($xlsx)
    {
        $data = new stdClass;
        $newRow = true;
        $nol = 0;
        $noc = 0;
        if ($xlsx) {
            foreach ($xlsx->rows() as $r => $row) {
                $label = 'label' . $nol;
                foreach ($row as $c => $cell) {
                    if ($c == 0) {
                        if ($r == 0) {
                            $nol += 1;
                            $label = 'label' . $nol;
                            $data->$label = new stdClass;
                            $data->$label->$label = $cell;
                            $data->$label->section1 = new stdClass;
                            $data->$label->section2 = new stdClass;
                            $data->$label->section3 = new stdClass;
                        } else {
                            if ($cell == "") {
                                $newRow = false;
                            } else {
                                $newRow = true;
                            }
                            if ($newRow) {
                                $nol += 1;
                                $label = 'label' . $nol;
                                $data->$label = new stdClass;
                                $data->$label->$label = $cell;
                                $data->$label->section1 = new stdClass;
                                $data->$label->section2 = new stdClass;
                                $data->$label->section3 = new stdClass;
                            }
                        }
                    } else {
                        $noc += 1;
                        $col = 'button' . $noc;
                        if ($c > 0 && $c < 4)
                            $data->$label->section1->$col = $cell;
                        elseif ($c > 3 && $c < 7)
                            $data->$label->section2->$col = $cell;
                        elseif ($c > 6 && $c < 10)
                            $data->$label->section3->$col = $cell;
                    }
                }
            }
        }
        return $data;
    }
}
