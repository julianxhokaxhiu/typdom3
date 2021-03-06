typDom3
=====

DOMPDF wrapper for TYPO3

## How to use it
1. `cd path/to/your/typo3conf/ext && git clone https://github.com/julianxhokaxhiu/typdom3.git --recursive` or install it [directly from TER](http://typo3.org/extensions/repository/view/typdom3).
2. Enable the "TypDom3" extension inside your Backend
3. Somewhere in your code
```
use \JX\Typdom3\TypDom3;
...
$pdf = new TypDom3();
$pdf->setPaper( 'A4' );
$pdf->setOrientation( 'portrait' );
$pdf->loadHtml( '<html></html>' );
$thePDF = $pdf->generatePdf();

$outputPath = '/tmp/output.pdf';
file_put_contents( $outputPath, $thePDF );
```

## Is it ready for production?
Yes, it is.

## Is this bug free?
Yes, since it's just a wrapper.

## Which is the license of this project?
I like the MIT license. Just use it as you like, but remember to keep the original author(s) in your source code files. Read the [LICENSE](https://github.com/julianxhokaxhiu/typdom3/blob/master/LICENSE) file for more information.