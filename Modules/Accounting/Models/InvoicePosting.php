<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @category   TBD
 * @package    TBD
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://orange-management.com
 */
declare(strict_types = 1);
namespace Modules\Accounting\Models;



/**
 * Invoice posting class.
 *
 * @category   Module
 * @package    Accounting
 * @license    OMS License 1.0
 * @link       http://orange-management.com
 * @since      1.0.0
 */
abstract class InvoicePosting extends PostingAbstract
{

    /**
     * Constructor.
     *
     * @since  1.0.0
     */
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function exportJson($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function importJson($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function exportCsv($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function importCsv($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function exportExcel($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function importExcel($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function exportPdf($path)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function importPdf($path)
    {
    }
}