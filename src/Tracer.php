<?php
/**
 * @author index
 *   ┏┓   ┏┓+ +
 *  ┏┛┻━━━┛┻┓ + +
 *  ┃       ┃
 *  ┃  ━    ┃ ++ + + +
 * ████━████┃+
 *  ┃       ┃ +
 *  ┃  ┻    ┃
 *  ┃       ┃ + +
 *  ┗━┓   ┏━┛
 *    ┃   ┃
 *    ┃   ┃ + + + +
 *    ┃   ┃     Codes are far away from bugs with the animal protecting
 *    ┃   ┃ +         神兽保佑,代码无bug
 *    ┃   ┃
 *    ┃   ┃   +
 *    ┃   ┗━━━┓ + +
 *    ┃       ┣┓
 *    ┃       ┏┛
 *    ┗┓┓┏━┳┓┏┛ + + + +
 *     ┃┫┫ ┃┫┫
 *     ┗┻┛ ┗┻┛+ + + +
 */

namespace easyops\easykin;

use easyops\easykin\logger\Logger;


/**
 * Class Tracer
 * @package easyops\easykin
 */
class Tracer
{
    /** @var Trace $trace */
    public $trace;

    /** @var Logger $logger */
    public $logger;

    /**
     * Tracer constructor.
     * @param Trace $trace
     * @param Logger $logger
     */
    public function __construct($trace = null, $logger = null)
    {
        $this->trace = $trace;
        $this->logger = $logger;
    }

    public function drop()
    {
        $this->trace = null;
        $this->logger = null;
    }

    public function trace()
    {
        if (!is_null($this->trace) && !is_null($this->logger)) {
            $this->trace->trace($this->logger);
            $this->drop();
        }
    }

    public function __destruct()
    {
        $this->trace();
    }
}