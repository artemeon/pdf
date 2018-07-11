<?php
/*
 * This file is part of the Artemeon Core - Web Application Framework.
 *
 * (c) Artemeon <www.artemeon.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artemeon\Pdf;


/**
 * Interface for a single pdf header element
 *
 * @author stefan.idler@artemeon.de
 */
interface PdfHeaderInterface {
    
    /**
     * Writes the header for a single page.
     * Use the passed $objPdf to access the pdf.
     * 
     * @param PdfTcpdf $objPdf the source pdf-object
     * @return void
     */
    public function writeHeader($objPdf);

    /**
     * If set to true, the first page is rendered without a header row
     * @param bool $bitSkip
     * @return void
     */
    public function setBitSkipFirstPage(bool $bitSkip);
}
