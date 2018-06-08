<?php

/**

 * byte数组与字符串转化类

 */

class Bytes {

	/**

	 * 转换一个String字符串为byte数组

	 * @param $str 需要转换的字符串

	 * @param $bytes 目标byte数组

	 * @author Zikie

	 */
	public static function getBytes($string) {
		$bytes = array();
		for ($i = 0; $i < strlen($string); $i++) {
			$bytes[] = ord($string[$i]);
		}
		return $bytes;
	}



		/**
     * 将字符串转换为ascii码
     * @param type $c 要编码的字符串
     * @param type $prefix  前缀，默认：&#
     * @return string
     */
  public static function encode($c, $prefix="&#") {
        $len = strlen($c);
        $a = 0;
        while ($a < $len) {
            $ud = 0;
            if (ord($c{$a}) >= 0 && ord($c{$a}) <= 127) {
                $ud = ord($c{$a});
                $a += 1;
            } else if (ord($c{$a}) >= 192 && ord($c{$a}) <= 223) {
                $ud = (ord($c{$a}) - 192) * 64 + (ord($c{$a + 1}) - 128);
                $a += 2;
            } else if (ord($c{$a}) >= 224 && ord($c{$a}) <= 239) {
                $ud = (ord($c{$a}) - 224) * 4096 + (ord($c{$a + 1}) - 128) * 64 + (ord($c{$a + 2}) - 128);
                $a += 3;
            } else if (ord($c{$a}) >= 240 && ord($c{$a}) <= 247) {
                $ud = (ord($c{$a}) - 240) * 262144 + (ord($c{$a + 1}) - 128) * 4096 + (ord($c{$a + 2}) - 128) * 64 + (ord($c{$a + 3}) - 128);
                $a += 4;
            } else if (ord($c{$a}) >= 248 && ord($c{$a}) <= 251) {
                $ud = (ord($c{$a}) - 248) * 16777216 + (ord($c{$a + 1}) - 128) * 262144 + (ord($c{$a + 2}) - 128) * 4096 + (ord($c{$a + 3}) - 128) * 64 + (ord($c{$a + 4}) - 128);
                $a += 5;
            } else if (ord($c{$a}) >= 252 && ord($c{$a}) <= 253) {
                $ud = (ord($c{$a}) - 252) * 1073741824 + (ord($c{$a + 1}) - 128) * 16777216 + (ord($c{$a + 2}) - 128) * 262144 + (ord($c{$a + 3}) - 128) * 4096 + (ord($c{$a + 4}) - 128) * 64 + (ord($c{$a + 5}) - 128);
                $a += 6;
            } else if (ord($c{$a}) >= 254 && ord($c{$a}) <= 255) { //error
                $ud = false;
            }
            $scill .= $prefix.$ud.";";
        }
        return $scill;
    }
 


	public static function hexToStr($array) {

		$str = "";
		for ($i = 0; isset($array[$i]); $i++) {
			$str .= chr($array[$i]);
		}
		return $str;
	}

	/**

	 * 将字节数组转化为String类型的数据

	 * @param $bytes 字节数组

	 * @param $str 目标字符串

	 * @return 一个String类型的数据

	 */

	public static function toStr($bytes) {
		$str = '';
		foreach ($bytes as $ch) {
			$str .= chr($ch);
		}

		return $str;
	}

	/**

	 * 转换一个int为byte数组

	 * @param $byt 目标byte数组

	 * @param $val 需要转换的字符串

	 *

	 */

	public static function integerToBytes($val) {
		$byt = array();
		$byt[0] = ($val & 0xff);
		$byt[1] = ($val>>8 & 0xff);
		$byt[2] = ($val>>16 & 0xff);
		$byt[3] = ($val>>24 & 0xff);
		return $byt;
	}

	/**

	 * 从字节数组中指定的位置读取一个Integer类型的数据

	 * @param $bytes 字节数组

	 * @param $position 指定的开始位置

	 * @return 一个Integer类型的数据

	 */

	public static function bytesToInteger($bytes, $position) {
		$val = 0;
		$val = $bytes[$position + 3] & 0xff;
		$val<<=8;
		$val |= $bytes[$position + 2] & 0xff;
		$val<<=8;
		$val |= $bytes[$position + 1] & 0xff;
		$val<<=8;
		$val |= $bytes[$position] & 0xff;
		return $val;
	}

	/**

	 * 转换一个shor字符串为byte数组

	 * @param $byt 目标byte数组

	 * @param $val 需要转换的字符串

	 *

	 */

	public static function shortToBytes($val) {
		$byt = array();
		$byt[0] = ($val & 0xff);
		$byt[1] = ($val>>8 & 0xff);
		return $byt;
	}

	/**

	 * 从字节数组中指定的位置读取一个Short类型的数据。

	 * @param $bytes 字节数组

	 * @param $position 指定的开始位置

	 * @return 一个Short类型的数据

	 */

	public static function bytesToShort($bytes, $position) {
		$val = 0;
		$val = $bytes[$position + 1] & 0xFF;
		$val = $val<<8;
		$val |= $bytes[$position] & 0xFF;
		return $val;
	}

}
?>