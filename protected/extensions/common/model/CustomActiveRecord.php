<?php

class CustomActiveRecord extends CActiveRecord {

    public $skipAttrValidArry = array('id', 'created_at', 'updated_at');
    public static $strict_chars = array("<!", "<", ">", ":", '"', '&lt;', '&gt;', "javascript", "%", "}", "{", "alert(", "<script>", "</script>", "text/javasacript", "<body>", "</body>");
    public $chars_allow_array = array();

    public function beforeValidate() {
        foreach ($this->attributes as $key => $value) {
            $skip_char_arr = self::$strict_chars;
            $restrctd_arr = $this->skipAttrValidArry;
            $char_allowed_arr = $this->chars_allow_array;
            if (isset($char_allowed_arr[$key])) {
                $arr = $char_allowed_arr[$key];
                foreach ($arr as $char) {
                    if (in_array($char, $skip_char_arr)) {
                        $char_index = array_search($char, $skip_char_arr);
                        unset($skip_char_arr[$char_index]);
                    }
                }
            }
            if (!in_array($key, $restrctd_arr)) {
                $field_val = trim($value);
                $this->$key = trim($this->$key);
                foreach ($skip_char_arr as $k => $v) {
                    $this->$key = trim(str_replace($v, "", $this->$key));
                }
                if ($field_val != $this->$key) {
                    $this->$key = "";
                    $this->addError($key, Yii::t('app', 'You have entered restricted character\'s.'));
                }
            }
        }
        return parent::beforeValidate();
    }

}