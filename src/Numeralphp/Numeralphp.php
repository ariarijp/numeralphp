<?php

namespace Numeralphp;

class Numeralphp
{
    /**
     * [$_value description].
     *
     * @var [type]
     */
    public $_value;

    /**
     * [new description].
     *
     * @param [type] $value [description]
     *
     * @return [type] [description]
     */
    public static function new($value)
    {
        $o = new self();
        $o->_value = $value;

        return $o;
    }

    /**
     * [add description].
     *
     * @param [type] $value [description]
     */
    public function add($value)
    {
        $this->_value += $value;

        return $this;
    }

    /**
     * [subtract description].
     *
     * @param [type] $value [description]
     *
     * @return [type] [description]
     */
    public function subtract($value)
    {
        $this->_value -= $value;

        return $this;
    }

    /**
     * [multiply description].
     *
     * @param [type] $value [description]
     *
     * @return [type] [description]
     */
    public function multiply($value)
    {
        $this->_value *= $value;

        return $this;
    }

    /**
     * [divide description].
     *
     * @param [type] $value [description]
     *
     * @return [type] [description]
     */
    public function divide($value)
    {
        $this->_value /= $value;

        return $this;
    }

    /**
     * [format description].
     *
     * @param string $format [description]
     *
     * @return [type] [description]
     */
    public function format($format = '0,0')
    {
        if ($format === '0,0') {
            return number_format($this->_value);
        } elseif (preg_match('/^([+\-])0,0(?:\.(0+$))?/', $format, $matches)) {
            $precision = 0;
            if (isset($matches[2])) {
                $precision = strlen($matches[2]);
            }
            return $matches[1]. number_format($this->_value, $precision);
        } elseif (preg_match('/0,0\.(0+$)/', $format, $matches)) {
            return number_format($this->_value, strlen($matches[1]));
        } elseif (preg_match('/\.(0+$)/', $format, $matches)) {
            return sprintf('%.'.strlen($matches[1]).'f', $this->_value);
        }

        return $this->_value;
    }
}
