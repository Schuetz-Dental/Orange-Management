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
namespace Web\Exception;

/**
 * Permission exception class.
 *
 * @category   Framework
 * @package    phpOMS\System\File
 * @license    OMS License 1.0
 * @link       http://orange-management.com
 * @since      1.0.0
 */
class DatabaseException extends \RuntimeException
{
    /**
     * Constructor.
     *
     * @param string     $message Exception message
     * @param int        $code    Exception code
     * @param \Exception $previous Previous exception
     *
     * @since  1.0.0
     */
    public function __construct(string $message, int $code = 0, \Exception $previous = null)
    {
        parent::__construct('The database failed with "' . $message . '".', $code, $previous);
    }
}
