<?php
class condition implements filter
{
    public static function Convert(&$code, view $view, $data = null)
    {
        $out = [];
        $result = "";
        if (preg_match_all("/\{%cond%\}((.|\n)*?)\{%endcond%\}/", $code, $out, PREG_SET_ORDER)) {
            foreach ($out as $d) {
                $result = self::conditionIf($d[1], $data);
                if (!empty($result)) {
                    $code = str_replace($d[0], $result, $code);
                }
            }
        }
    }
    private static function validCondition($code, $data)
    {
        $out = [];
        if (preg_match_all("/(.+)(==|[^=]<|=<|!=|[^=]>|=>)(.+)/", $code, $out, PREG_SET_ORDER)) {
            if (count($out) == 1) {
                return self::evalCondition($out[0][1], $out[0][2], $out[0][3], $data);
            }
        }
    }

    private static function conditionIf($code, $data): string
    {
        $out = [];

        if (preg_match_all("/\{%if (.+)%\}((.|\n)*?)\{%endif%\}/", $code, $out, PREG_SET_ORDER)) {
            if (count($out) == 1) {
                if (self::validCondition($out[0][1], $data)) {
                    return $out[0][2];
                } else {
                    if (preg_match_all("/\{%elseif (.+)%\} ((.|\n)*?) \{%endelseif%\}/", $code, $out, PREG_SET_ORDER)) {
                        foreach ($out as $o) {
                            if (self::validCondition($o[1], $data)) {
                                return $o[2];
                            }
                        }
                    } else {
                        if (preg_match_all("/\{%else%\} ((.|\n)*?) \{%endelse%\}/", $code, $out, PREG_SET_ORDER)) {
                            if (count($out) == 1) {
                                if (self::validCondition($out[0][1], $data)) {
                                    return $out[0][1];
                                }
                            }
                        }
                    }
                }
            }
        }
        return "";
    }

    private static function evalCondition($val, $StringOreation, $val2, $data): bool
    {
        $val = $data[trim($val)];
        $StringOreation = trim($StringOreation);
        $val2 = $data[trim($val2)];

        switch ($StringOreation) {
            case "==":
                return  self::equal($val, $val2);
                break;
            case "<":
                return self::Inf($val, $val2);
                break;
            case ">":

                return  self::Sup($val, $val2);
                break;
            case "=>":
                return self::equalSup($val, $val2);
                break;
            case "=<":
                return  self::equalInf($val, $val2);
                break;
            case "!=":
                return self::equalNot($val, $val2);
                break;
        }
    }
    private static function equal($val, $val2): bool
    {
        return $val == $val2;
    }
    private static function equalInf($val, $val2): bool
    {
        return $val <= $val2;
    }

    private static function equalSup($val, $val2): bool
    {
        return $val >= $val2;
    }
    private static function Sup($val, $val2): bool
    {

        return $val > $val2;
    }
    private static function Inf($val, $val2): bool
    {

        return $val < $val2;
    }
    private static function equalNot($val, $val2)
    {

        return $val != $val2;
    }
}
