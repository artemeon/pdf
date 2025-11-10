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


    protected bool $bitHeader = true;
    protected bool $bitFooter = true;

    protected ?PdfHeaderInterface $objHeader = null;

    protected ?PdfFooterInterface $objFooter = null;

    //Page header
    public function Header(): void
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
    public function Footer(): void
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


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getBitHeader(): bool
    {
        return $this->bitHeader;
    }

    public function setBitHeader(bool $bitHeader): void
    {
        $this->setPrintHeader($bitHeader);
        $this->bitHeader = $bitHeader;
    }

    public function getBitFooter(): bool
    {
        return $this->bitFooter;
    }

    public function setBitFooter(bool $bitFooter): void
    {
        $this->setPrintFooter($bitFooter);
        $this->bitFooter = $bitFooter;
    }

    public function getObjHeader(): ?PdfHeaderInterface
    {
        return $this->objHeader;
    }

    public function setObjHeader(?PdfHeaderInterface $objHeader): void
    {
        $this->objHeader = $objHeader;
    }

    public function getObjFooter(): ?PdfFooterInterface
    {
        return $this->objFooter;
    }

    public function setObjFooter(?PdfFooterInterface $objFooter): void
    {
        $this->objFooter = $objFooter;
    }


}
