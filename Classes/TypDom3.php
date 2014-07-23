<?php /*
	The MIT License (MIT)

	Copyright (c) 2014 Julian Xhokaxhiu

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.
*/

namespace JX\Typdom3;

class TypDom3 {

	private $api;

	private $paper;

	private $orientation;

	private $options;

	/**
	 * Create the DOMPDF instance here.
	 * By default we compress the PDF and we use the portrait orientation.
	 */
	public function __construct() {
		$this->api = new \DOMPDF();
		$this->orientation = 'portrait';
		$this->options = array(
			'compress' => 1
		);
	}

	// Library API

	/**
	 * Generate the PDF from the passed HTML. You can also define some settings for the generated HTML.
	 * @param string $html The HTML content to be rendered
	 * @param boolean $options Options to pass to DOMPDF.
	 * @return string The PDF content generated (literaly the result of the ->output() method of DOMPDF).
	 */
	public function generatePdf( $options = array() ) {
		$options = array_merge( $this->options, $options );
		$this->api->render();
		return $this->api->output( $options );
	}

	// Settings API

	/**
	 * Set the kind of paper
	 * @param string $paper ( letter | A4 | A3 | legal | ... ) [ default = DOMPDF_DEFAULT_PAPER_SIZE ]
	 */
	public function setPaper( $paper = DOMPDF_DEFAULT_PAPER_SIZE ) {
		$this->paper = $paper;
		$this->updateSettings();
	}

	/**
	 * Set the paper orientation
	 * @param string $orientation ( portrait | landscape ) [ default = portrait ]
	 */
	public function setOrientation( $orientation = 'portrait' ) {
		$this->orientation = $orientation;
		$this->updateSettings();
	}

	/**
	 * Set the base path of the resources included in HTML files
	 * @param string $basePath The absolute path that should be the base for your HTML. If not specified it will be the directory of the HTML files itself.
	 */
	public function setBasePath( $basePath = '' ) {
		if ( !empty( $basePath ) ) {
			$this->api->set_base_path( $basePath );
		}
	}

	/**
	 * Pass HTML contento to the DOMPDF Class
	 * @param string $html The HTML content
	 */
	public function loadHtml( $html = '' ) {
		if ( !empty( $html ) ) {
			$this->api->load_html( $html );
		} else
			$this->throwErrorMessage( "You didn't specify any HTML code." );
	}

	/**
	 * Load an HTML file from a specified Path.
	 * @param type $path Path to the HTML file.
	 */
	public function loadHtmlFromFile( $path = '' ) {
		if ( !empty( $path ) ) {
			$this->api->load_html_file( $path );
		} else
			$this->throwErrorMessage( "You didn't specify a valid Path for the HTML." );
	}

	private function updateSettings() {
		// Set the paper kind and orientation
		$this->api->set_paper( $this->paper, $this->orientation );
	}

	/**
	 * Throw an error message
	 * @param type $msg The error message to be thrown
	 */
	private function throwErrorMessage($msg) {
		throw new \Exception( "[\JX\Typdom3\TypDom3]\n" . $msg );
	}

}