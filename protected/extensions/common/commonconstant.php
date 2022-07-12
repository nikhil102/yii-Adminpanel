<?php

/*
 * @package zii.extensions
 * @brief Class for comman useable functions
 * @version 1.0
 * @author Lekhraj
 */

class COMMONCONSTANT {

    const FALSE_STATUS_DEFAULT = 0;
    const TRUE_STATUS_DEFAULT = 1;
    const FALSE_STATUS = 1;
    const TRUE_STATUS = 2;
    const TRUE_STATUS_TXT = "True";
    const FALSE_STATUS_TXT = "False";
    const ENABLE_TXT = "Enable";
    const DISABLE_TXT = "Disable";
    const POST_TXT = "Postive";
    const NEG_TXT = "Negative";
    const COMPLETE_TXT = "Completed";
    const PENDING_TXT = "Pending";
    const YES_TXT = "Yes";
    const NO_TXT = "No";
    const DATE_SEP = "/";
    const DATE_FORMAT = "d/m/yy";
    const DATE_FORMAT_JS = "yy-mm-dd";
    const DATE_FORMAT_PHP = "yyyy-MM-dd";
    const RANDOM_STRING_LEN = 15;
    const SALT_LEN = 10;
    const SALT_NAME = "SALT";
    const SESSION_FORM = "SESSION_FORM_DATA";
    const SESSION_FORM_FIELD = "_random_tokn_id";
    const SESSION_FORM_COUNT = "_random_form_count";
    const LOGIN_MIN_LEN = 5;
    const LOGIN_MAX_LEN = 20;
    const PASSWORD_MIN_LEN = 8;
    const PASSWORD_MAX_LEN = 16;
    const PASSWORD_REG_EXP = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    const PASSORD_VALID_MSG = "Password must contain atleast one Number, Lower and Uppercase character & Special character such as !,@,#,$.";
    const NAME_REG_EXP = "/^[a-zA-z]{1,}[a-zA-z'\.]*$/";
    const NAME_VALID_MSG = "Only alphabets and apostrophe allowed";
    const ADDRESS_REG_EXP = "/^[a-zA-Z0-9,_\/\\\\'.\-\s\)\(&]*$/";
    // const ADDRESS_VALID_MSG = "Allowed special characters in address are space, comma, hyphens and underscore";
    const ADDRESS_VALID_MSG = "Please enter correct value";
    const FULL_NAME_REG_EXP = "/^[a-zA-z]{1,}[a-zA-Z'.&\-\s]*$/";
    const FULL_NAME_VALID_MSG = "Only  alphabets, space, hyphens and apostrophe allowed";
    const LOGIN_ID_REG_EXP = "/^[a-zA-Z][a-zA-z0-9_.\-]*$/";
    const NO_SPACE_REG_EXP = "/^[a-zA-z0-9_.\-]*$/";
    const NO_SPACE_VALID_MSG = "Only Alphabets, Numbers, Underscore, Hyphen and Dot Allowed";
    const LOGIN_ID_VALID_MSG = "Only lower alphabets, numbers, hyphens(-), dot(.) and underscore(_) allowed and Login Name shoulf start with an Alphabet.";
    const ALPHA_NUMERIC_EXP = "/^[a-zA-Z0-9'.&\-\s]*$/";
    const ALPHA_NUMERIC_MSG = "Please enter valid character.";
    const DESCRIPTION_REG_EXP = "/^[a-zA-Z0-9,_&%'.\(\)\/\-\s]*$/";
    const FIELD_ALLOWED_REG_EXP = "/^[a-zA-Z0-9,_?'.\(\)\/\-\s]*$/";
    const FIELD_ALLOWED_REG_EXP_value = "/^[a-zA-Z0-9+,?'.\(\)\/\-\s]*$/";
    const FIELD_ALLOWED_VALID_MSG = "Please enter valid character";
    const NUMBER_EXP = '/^[0-9]{1,30}(?:\.[0-9]{1,2})?$/';
    const MALE_VAL = 1;
    const FEMALE_VAL = 0;
    const MALE_TXT = "Male";
    const FEMALE_TXT = "Female";
    const MARRIED_TXT = "Married";
    const UNMARRIED_TXT = "Single";
    const LANDLINE_LEN = 8;
    const PAGINATION_SIZE = 10;
    const SITE_PREFIX = 'AXIS_ADMIN';
    const LOGIN_SALT_NAME = 'login_sign';
    const SHORT_NAME_REG_EXP = "/^[a-zA-Z]*$/";
    const SHORT_NAME_VALID_MSG = "Only  alphabets allowed";
    const CODE_REG_EXP = "/^[0-9]*$/";
    const CODE_VALID_MSG = "Only numbers allowed";
    const FLOAT_REG_EXP = "/^[0-9\.]*$/";
    const FLOAT_VALID_MSG = "Please enter valid number";
    const VALID_FILE_MSG = "Please upload correct File";
    const VALID_COLUMN_MSG = "Column name missing";
    const UNIQUE_NAME_VALID_MSG = "Duplicate value entered";
    const VALID_COMPANY_NAME = "Please enter correct company name";
    const AREA_REG_EXP = "/^[a-zA-Z0-9&\.\s]*$/";
    const AREA_VALID_MSG = "Only  alphabets, numbers, space and dot(.) allowed";
    const OWNERNAME_REG_EXP = "/^[a-zA-Z&\,\s]*$/";
    const OWNERNAME_VALID_MSG = "Only  alphabets and space allowed";
    const ANS_REG_EXP = "/^[a-zA-Z0-9+,?'.\%\s]*$/";
    const ANS_VALID_MSG = "Please enter correct value";

    public static $strict_chars = array("<!", "<", ">", ":", '"', '&lt;', '&gt;', "javascript", "%", "}", "{", "alert(", "<script>", "</script>", "text/javasacript", "<body>", "</body>");
    public static $restrict_limited_chars = array("<", ">", "javascript", "%", "alert(");
    public static $restrict_limited_scripts = array('Your request is invalid.', 'Invalid identifier.', 'Invalid input.', 'Invalid token.', 'Your request is invalid.','The specified post cannot be found.', 'Invalid input', 'Invalid token', 'Your request is invalid','The specified post cannot be found');

    const QUES_REG_EXP = "/^[a-zA-Z0-9,_\/\\\\'.\-\s\%\)\(&]*$/";
    const QUES_VALID_MSG = "Please enter correct value";

}
