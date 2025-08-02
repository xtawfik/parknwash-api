<?php

namespace App\Containers\Reports\Export;

use Apiato\Core\Abstracts\Transformers\Transformer;
use Apiato\Core\Foundation\Facades\Apiato;
use Fractal;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Request;
use App\Ship\Exceptions\UpdateResourceFailedException;
use Carbon\Carbon;

class DownloadExport implements FromArray, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents, WithStyles {
  use Exportable;

  public function __construct() {
    $this->data = request()->all();
    $headers    = $this->data['headers'];
    $columnIds  = [
      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
      'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
      'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
    ];

    $this->columns = array_splice( $columnIds, 0, count( $headers ) + 1 );
    $this->length  = 0;
  }

  private function formatChips( $data, $header ) {
    $separator = Arr::get( $header, 'separator', '-' );
    $key       = Arr::get( $header, 'key' );
    $keys      = Arr::get( $header, 'keys' );

    if ( is_array( $data ) ) {
      $output = [];

      foreach ( $data as $item ) {
        if ( $keys ) {
          $labels = [];
          foreach ( $keys as $key ) {
            $labels[] = Arr::get( $item, $key );
          }

          $output[] = join( " $separator ", $labels );
        } else {
          $output[] = Arr::get( $item, $key );
        }
      }

      return join( ", ", $output );
    }

    return '---';
  }

  public function transform( $data, $transformerName = null, array $includes = [], array $meta = [], $resourceKey = null ) {
    // create instance of the transformer
    $transformer = new $transformerName;

    // if an instance of Transformer was passed
    if ( $transformerName instanceof Transformer ) {
      $transformer = $transformerName;
    }

    // append the includes from the transform() to the defaultIncludes
    $includes = array_unique( array_merge( $transformer->getDefaultIncludes(), $includes ) );

    // set the relationships to be included
    $transformer->setDefaultIncludes( $includes );

    // no resource key was set
    if ( ! $resourceKey ) {
      // get the resource key from the model
      $obj = null;
      if ( $data instanceof AbstractPaginator ) {
        $obj = $data->getCollection()->first();
      } elseif ( $data instanceof Collection ) {
        $obj = $data->first();
      } else {
        $obj = $data;
      }

      // if we have an object, try to get its resourceKey
      if ( $obj ) {
        $resourceKey = $obj->getResourceKey();
      }
    }

    $fractal = Fractal::create( $data, $transformer )->withResourceName( $resourceKey );
    // check if the user wants to include additional relationships
    if ( $requestIncludes = Request::get( 'include' ) ) {
      $fractal->parseIncludes( $requestIncludes );
    }

    // apply request filters if available in the request
    if ( $requestFilters = Request::get( 'filter' ) ) {
      $result = $this->filterResponse( $fractal->toArray(), explode( ';', $requestFilters ) );
    } else {
      $result = $fractal->toArray();
    }

    return $result['data'];
  }

  public function getTransformerClass( $model ) {
    return "App\Containers\\$model\UI\API\Transformers\\{$model}Transformer";
  }

  public function array(): array {
    $data    = $this->data;
    $model   = Str::studly( $data['endpoint'] );
    $headers = $data['headers'];

    $repository = Apiato::call( "Reports@{$model}ReportTask", [], [ 'addRequestCriteria' ] );
    // Limit to 10 for testing
    // $allData    = $repository->all()->take(10);
    $allData    = $repository->all();

    $tramnformerClass = $this->getTransformerClass( $model );

    $this->length = count( $allData ) + 2;

    $summary = [' ']; // Add empty cell for serial number column
    $output  = [];
    foreach ( $allData as $index => $pure_item ) {
      $item = $this->transform( $pure_item, $tramnformerClass );

      $itemData = [$index + 1]; // Add serial number
      foreach ( $headers as $i => $header ) {
        $field = Arr::get( $header, 'field' );
        $type  = Arr::get( $header, 'type', 'default' );
        $after = Arr::get( $header, 'after', '' );
        $total = Arr::get( $header, 'total' );

        $data = Arr::get( $item, $field, '---' );

        switch ( $type ) {
          case "chips":
            $itemData[] = $this->formatChips( $data, $header );
            break;
          case "money":
            $itemData[] = $data;
            break;
          case "date":
            $itemData[] = Carbon::parse($data)->format('Y-m-d');
            break;
          case "month":
            // Full month name
            $itemData[] = Carbon::parse($data)->format('F');
            break;
          case "long_number":
            // Prefix with single quote to force Excel to treat as text
            $itemData[] = (string)$data . " ";
            break;
          case "string_set":
            $optionsList = Arr::get($header, 'optionsList', []);
            $mappedValue = $data;
            if (is_array($optionsList)) {
              foreach ($optionsList as $option) {
                if (Arr::get($option, 'id') === $data) {
                  $mappedValue = Arr::get($option, 'name', $data);
                  break;
                }
              }
            }
            $itemData[] = $mappedValue;
            break;
          default:
            $itemData[] = $data . $after;
        }

        $columnId = $this->columns[$i];
        switch ( $total ) {
          case "sum":
            $sum = "=SUM({$columnId}3:{$columnId}{$this->length})";
            break;
          case "avg":
            $sum = "=AVERAGE({$columnId}3:{$columnId}{$this->length})";
            break;
          default:
            $sum = " ";
        }

        if ( $index === 0 ) {
          $summary[] = $sum;
        }
      }

      $output[] = $itemData;
    }

    return array_merge( $output, [ $summary ] );
  }

  public function headings(): array {
    $data = $this->data;

    $reportTitle = [ $data['title'] ];

    $headers  = Arr::get( $data, 'headers' );
    $headings = ['#'];
    foreach ( $headers as $header ) {
      $title      = Arr::get( $header, 'title' );
      $headings[] = $title;
    }

    return [ $reportTitle, $headings ];
  }

  public function columnFormats(): array {
    return [
//      'E' => NumberFormat::FORMAT_TEXT,
//      'H' => NumberFormat::FORMAT_TEXT,
    ];
  }

  public function styles( Worksheet $sheet ) {
    return [
      1                     => [
        'font'      => [ 'size' => 22, 'bold' => true, 'color' => [ 'argb' => 'FFFD03' ] ],
        'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
          'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ]
      ],
      2                     => [
        'font'      => [ 'size' => 14, 'bold' => true ],
        'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
          'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ]
      ],
      "A3:A{$this->length}" => [
        'fill' => [
          'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'startColor' => [ 'argb' => 'FFFD03' ]
        ]
      ],
      ($this->length + 1) => [
        'font'      => [ 'size' => 14, 'bold' => true ],
        'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
          'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'fill' => [
          'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'startColor' => [ 'argb' => 'FFFD03' ]
        ]
      ]
    ];
  }

  /**
   * @return array
   */
  public function registerEvents(): array {
    $lastColumn = $this->columns[ count( $this->columns ) - 1 ];

    return [
      AfterSheet::class => function ( AfterSheet $event ) use ( $lastColumn ) {
        if ( request( 'language' ) == "ar" ) {
          $event->sheet->getDelegate()->setRightToLeft( true );
        }

        $event->sheet->mergeCells( "A1:{$lastColumn}1" );

        $styleArray = [
          'borders' => [
            'outline' => [
              'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              'color'       => [ 'argb' => '333333' ],
            ]
          ]
        ];

        $event->sheet->getDelegate()->getRowDimension( 1 )->setRowHeight( 50 );
        $event->sheet->getDelegate()->getRowDimension( 2 )->setRowHeight( 30 );
        $event->sheet->getDelegate()->getRowDimension( $this->length + 1)->setRowHeight( 30 );

        $highest_row = $event->sheet->getDelegate()->getHighestRow();
        $headers = $this->data['headers'];
        
        for ( $i = 2; $i <= $highest_row; $i ++ ) {
          $event->sheet->styleCells(
            "A$i",
            [
              'font' => [
                'size' => 12,
                'bold' => true,
              ]
            ]
          );

          foreach ( $this->columns as $index => $column ) {

            $event->sheet->getDelegate()->getStyle( "$column$i" )->applyFromArray( $styleArray );

            // Get alignment from header, default to center
            $headerAlign = 'center';
            if ($index > 0) { // Skip serial number column (index 0)
              $headerIndex = $index - 1; // Adjust for serial number column
              if (isset($headers[$headerIndex])) {
                $headerAlign = Arr::get($headers[$headerIndex], 'align', 'center');
              }
            }

            // Map string alignment to PhpSpreadsheet constants
            $alignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER; // default
            switch (strtolower($headerAlign)) {
              case 'left':
                $alignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT;
                break;
              case 'right':
                $alignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT;
                break;
              case 'center':
              default:
                $alignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
                break;
            }

            $event->sheet->styleCells(
              "$column$i",
              [
                'alignment' => [
                  'horizontal' => $alignment,
                ],
                'font'      => [
                  'size' => 12,
                ]
              ]
            );
          }
        }

        $event->sheet->getStyle( "A1:{$lastColumn}1" )->getFill()
                     ->setFillType( \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID )
                     ->getStartColor()->setARGB( '333333' );

        $event->sheet->getStyle( "A2:{$lastColumn}2" )->getFill()
                     ->setFillType( \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID )
                     ->getStartColor()->setARGB( 'FFFD03' );

        $event->sheet->getDelegate()->getStyle( "A1:{$lastColumn}1" )->applyFromArray( $styleArray );
      },
    ];
  }
}
