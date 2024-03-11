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


use TCPDF;

/**
 * Cache directory for temporary files (full path).
 */
//define('K_PATH_CACHE', _realpath_ . 'project/temp/');

/**
 * Extends the TCPDF class and is being used internally by Pdf.
 * In most cases you won't need the class, so just ignore it.
 *
 * @author stefan.idler@artemeon.de
 */
class PdfTcpdf extends TCPDF
{


    protected $bitHeader = true;
    protected $bitFooter = true;

    /**
     * @var ?PdfHeaderInterface
     */
    protected $objHeader = null;

    /**
     * @var ?PdfFooterInterface
     */
    protected $objFooter = null;

    //Page header
    public function Header()
    {

        if (!$this->bitHeader) {
            return;
        }

        //save old font
        $strFont = $this->FontFamily;
        $intSize = $this->FontSize;
        $intStyle = $this->FontStyle;


        if ($this->objHeader instanceof PdfHeaderInterface) {
            $this->objHeader->writeHeader($this);
        }


        $this->SetFont($strFont, $intStyle, $intSize);
    }

    // Page footer
    public function Footer()
    {

        if (!$this->bitFooter) {
            return;
        }

        //save old font
        $strFont = $this->FontFamily;
        $intSize = $this->FontSize;
        $intStyle = $this->FontStyle;

        if ($this->objFooter instanceof PdfFooterInterface) {
            $this->objFooter->writeFooter($this);
        }

        $this->SetFont($strFont, $intStyle, $intSize);
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function getBitHeader()
    {
        return $this->bitHeader;
    }

    public function setBitHeader($bitHeader)
    {
        $this->setPrintHeader($bitHeader);
        $this->bitHeader = $bitHeader;
    }

    public function getBitFooter()
    {
        return $this->bitFooter;
    }

    public function setBitFooter($bitFooter)
    {
        $this->setPrintFooter($bitFooter);
        $this->bitFooter = $bitFooter;
    }

    public function getObjHeader()
    {
        return $this->objHeader;
    }

    public function setObjHeader($objHeader)
    {
        $this->objHeader = $objHeader;
    }

    public function getObjFooter()
    {
        return $this->objFooter;
    }

    public function setObjFooter($objFooter)
    {
        $this->objFooter = $objFooter;
    }


}
