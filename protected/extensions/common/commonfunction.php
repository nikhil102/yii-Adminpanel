<?php

/*
 * @package zii.extensions
 * @brief Class for comman useable functions
 * @version 1.0
 * @author Lekhraj
 */

require 'commonconstant.php';
/*
 * @filepath show path where file located
 * @fname define file name   
 */

class COMMONFUNCTION extends COMMONCONSTANT {

    public static function downloadFile($filePath = '', $fname = "") {

        if (!empty($filePath)) {
            ob_clean();
            if ($fname == 'BuildingWingFlat.xls') {
                header('Content-type: application/vnd.ms-excel');
            } else {
                header('Content-type: application/vnd.oasis.opendocument.spreadsheet');
            }
            header("Content-disposition: attachment; filename=$fname");
            header("Content-Length: " . filesize($filePath));

            readfile($filePath);
        } else {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    }

    public function Zip($source, $destination) {
        if (extension_loaded('zip') === true) {
            if (file_exists($source) === true) {
                $zip = new ZipArchive();
                $newstr = preg_replace('/[^a-zA-Z0-9\']/', '_', $destination);
                $file_folder = $newstr . "/";
                if ($zip->open($destination, ZIPARCHIVE::CREATE) === true) {
                    $source = realpath($source);

                    if (is_dir($source) === true) {
                        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

                        foreach ($files as $file) {
                            $file = realpath($file);

                            if (is_dir($file) === true) {
                                $zip->addEmptyDir(str_replace($source . '/', '', $file_folder . $file . '/'));
                            } else if (is_file($file) === true) {
                                $zip->addFromString(str_replace($source . '/', '', $file_folder . $file), file_get_contents($file));
                            }
                        }
                    } else if (is_file($source) === true) {
                        $zip->addFromString(basename($source), file_get_contents($file_folder . $source));
                    }
                }

                //return $zip->close();
            }
        }
        // print_r($source);
        //  die;
// remove zip file is exists in temp path
//unlink($source);
        return $destination;
    }

    public function Zips($param) {
        $error = ""; //error holder
        if (isset($_POST['createpdf'])) {
            $post = $_POST;
            $file_folder = "files/"; // folder to load files
            if (extension_loaded('zip')) {
// Checking ZIP extension is available
                if (isset($post['files']) and count($post['files']) > 0) {
// Checking files are selected
                    $zip = new ZipArchive(); // Load zip library
                    $zip_name = time() . ".zip"; // Zip name
                    if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE) {
                        // Opening zip file to load files
                        $error .= "* Sorry ZIP creation failed at this time";
                    }
                    foreach ($post['files'] as $file) {
                        $zip->addFile($file_folder . $file); // Adding files into zip
                    }
                    $zip->close();
                    if (file_exists($zip_name)) {
// push to download the zip
                        header('Content-type: application/zip');
                        header('Content-Disposition: attachment; filename="' . $zip_name . '"');
                        readfile($zip_name);
// remove zip file is exists in temp path
                        unlink($zip_name);
                    }
                }
                else
                    $error .= "* Please select file to zip ";
            }
        }
    }

    function datediff($crdate, $cpltdate) {

        //  $sql = "SELECT disb_plan_type.name,disb_plan_type.id, disb_struc_plan_mapping.`stage_construction`,disb_struc_plan_mapping.`cost_incurred`,disb_struc_plan_mapping.`cost_recommended` FROM disb_struc_plan join disb_struc_plan_mapping join disb_plan_type on disb_struc_plan.id=disb_struc_plan_mapping.disb_struc_plan_id and disb_struc_plan.disb_struc_plan_id=disb_plan_type.id and disb_plan_type.id!=1";
        $sql = "SELECT DATEDIFF('$cpltdate','$crdate') as diff";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        if ($data['diff'] != 0) {
            return $data['diff'] . " days";
        }
    }

    function timediff($crdate, $cpltdate) {
        $info = '';
        //  $sql = "SELECT disb_plan_type.name,disb_plan_type.id, disb_struc_plan_mapping.`stage_construction`,disb_struc_plan_mapping.`cost_incurred`,disb_struc_plan_mapping.`cost_recommended` FROM disb_struc_plan join disb_struc_plan_mapping join disb_plan_type on disb_struc_plan.id=disb_struc_plan_mapping.disb_struc_plan_id and disb_struc_plan.disb_struc_plan_id=disb_plan_type.id and disb_plan_type.id!=1";
        $sql = "SELECT TIMEDIFF('$cpltdate','$crdate') as diff";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        $explode = explode(':', $data['diff']);
        $info .=($explode[0] != 00) ? $explode[0] . ' Hours' : '';
        $info .= ($explode[1] != 00) ? ' ' . $explode[1] . ' Minutes' : '';
        $info .=($explode[2] != 00) ? ' ' . $explode[2] . ' Seconds' : '';
        //$info;
        return $info;
    }

    function datetime($start, $end) {
        $datetime1 = new DateTime($start);
        $datetime2 = new DateTime($end);
        $interval = $datetime2->diff($datetime1);
        $data = ($interval->format('%y') != 0) ? ' ' . $interval->format('%y years') : '';
        $data.=($interval->format('%m') != 0) ? ' ' . $interval->format('%m months') : '';
        $data.=($interval->format('%d') != 0) ? ' ' . $interval->format('%d days') : '';
        $data.=($interval->format('%h') != 0) ? ' ' . $interval->format('%h Hours') : '';
        $data.=($interval->format('%i') != 0) ? ' ' . $interval->format('%i Minutes') : '';
        $data.=($interval->format('%s') != 0) ? ' ' . $interval->format('%s Seconds') : '';
        return $data;
//echo $interval->format('%y years');
//echo $interval->format('%m months');echo $interval->format('%d days');
//echo $interval->format('%h Hours');echo $interval->format('%i Minutes');echo $interval->format('%s Seconds');  
    }

    function Zipsa($source, $destination, $include_dir = false) {

        $newstr = preg_replace('/[^a-zA-Z0-9\']/', '_', $destination);

        $file_folder = $newstr . "/";
        $destination.='.zip';
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        if (file_exists($destination)) {
            unlink($destination);
        }

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = realpath($source);

        if (is_dir($source) === true) {

            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

//        if ($include_dir) {
//
//            $arr = explode(DIRECTORY_SEPARATOR, $source);
//            $maindir = $arr[count($arr)- 1];
//
//            $source = "";
//            for ($i=0; $i < count($arr) - 1; $i++) {
//                $source .= DIRECTORY_SEPARATOR . $arr[$i];
//            }
//
//            $source = substr($source, 1);
//
//            $zip->addEmptyDir($maindir);
//
//        }

            foreach ($files as $file) {
                // Ignore "." and ".." folders
                if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
                    continue;

                $file = realpath($file);

                if (is_dir($file) === true) {
                    $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file_folder . $file . DIRECTORY_SEPARATOR));
                } else if (is_file($file) === true) {
                    $zip->addFromString(str_replace($source . DIRECTORY_SEPARATOR, '', $file_folder . $file), file_get_contents($file));
                }
            }
        } else if (is_file($source) === true) {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        $zip->deleteName("wamp/");
        $zip->deleteName("C_/");
        $zip->deleteName("C:/");
        $zip->close();
        return $destination;
    }

    function DeleteFolder($path) {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                self::DeleteFolder(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        } else if (is_file($path) === true) {
            return unlink($path);
        }

        return false;
    }

    /*
     * excelfile use for extrating excel or csv file in form of array.
     * @param type $state for define file which we uploading
     * @param type $modelname for define modelname .
     * @param type $project empty for non project excel and not empty for project excel.
     * @return type
     */

    public static function excelfile($state, $modelname, $project = "") {
        $data = array();
        $errorMessage = '';
        $typeoffile = array('xlsx', 'csv', 'xls', 'ods');

        $model = new $modelname;
        $model->attributes = $state;

        $upfile = CUploadedFile::getInstance($model, 'upload');
        $filetype = $upfile->getExtensionName();


        if (in_array($filetype, $typeoffile)) {
            Yii::import('zii.widgets.vendors.PHPExcel', true);
            $baseFilePath = Yii::app()->getBasePath() . '/../images/' . $upfile->name;
            $upfile->saveAs($baseFilePath);

            if ($filetype == 'xls') {
                $filetype = 'Excel5';
            }
            if ($filetype == 'xlsx') {
                $filetype = 'Excel2007';
            }
            if ($filetype == 'ods') {
                $filetype = 'OOCalc';
            }
            if ($filetype == 'csv') {
                $filetype = strtoupper($filetype);
            }
            if (!empty($project)) {
                $data = self::__sortprojectExcelData($filetype, $baseFilePath);
                if (!$data) {
                    die;
                    $errorMessage = "Please select valid Excel file";
                }
            } else {
                $data = self::__sortExcelData($filetype, $baseFilePath);
            }
        } else {
            $errorMessage = "Please select valid Excel file";
        }
        return array(
            'data' => $data,
            'errorMessage' => $errorMessage
        );
    }

    /*
     * sortExcelData use for extrating excel or csv file in form of array.
     * @param type $filetype for define file type which we uploading.
     * @param type $filePath for define filepath which we uploading.
     * @return type
     */

    public static function __sortExcelData($filetype = '', $filePath = '') {
        $data = array();
        $objReader = PHPExcel_IOFactory::createReader($filetype);
        $objPHPExcel = $objReader->load($filePath);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
        $i = 0;
        for ($row = 0; $row <= $highestRow; ++$row) {

            for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                $exceldata = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                if (!empty($exceldata)) {
                    $data[$i][$col] = $exceldata;
                }
            }
            $i++;
        }
        return $data;
    }

    public static function __sortprojectExcelData($filetype = '', $filePath = '') {
        $data = array();
        ob_clean();
        $objReader = PHPExcel_IOFactory::createReader($filetype);
        $objPHPExcel = $objReader->load($filePath);
        // $objWorksheet = $objPHPExcel->getActiveSheet();
        //  echo "<pre>";
        $get = $objPHPExcel->getSheetCount();
        echo $get;
        if ($filetype == 'OOCalc') {
            $get = $get - 1;
            echo $get;
        }
//     echo $get;
//     die;
        if ($get == 3) {
            for ($j = 0; $j <= $get - 1; $j++) {
                // echo $j;
                $objWorksheet = $objPHPExcel->getSheet($j);
                // echo $objReader->getTitle();
                // $objWorksheet1 = $objPHPExcel-> getSheetView();

                $tt = $objWorksheet->getTitle();
                $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
                $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
                $i = 0;
                for ($row = 0; $row <= $highestRow; ++$row) {

                    for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                        $exceldata = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                        if (!empty($exceldata)) {
                            $data[$tt][$i][$col] = $exceldata;
                        }
                    }
                    $i++;
                }
            }

            // echo "<pre>"; 
            // print_r($data);
            // die;
            return $data;
        }
    }

    /*
     * Method to get  array of status
     */

    public static function _getStatusArray($true = self::TRUE_STATUS_TXT, $false = self::FALSE_STATUS_TXT) {
        return array(
            array('id' => self::TRUE_STATUS, 'status' => $true),
            array('id' => self::FALSE_STATUS, 'status' => $false)
        );
    }

    public static function _getDefualtStatusArray($true = self::TRUE_STATUS_TXT, $false = self::FALSE_STATUS_TXT) {
        return array(
            array('id' => self::TRUE_STATUS_DEFAULT, 'status' => $true),
            array('id' => self::FALSE_STATUS_DEFAULT, 'status' => $false)
        );
    }

    public static function _getStatusData($true = self::TRUE_STATUS_TXT, $false = self::FALSE_STATUS_TXT) {
        return array(
            self::TRUE_STATUS => $true,
            self::FALSE_STATUS => $false
        );
    }

    public static function _getStatusArr() {
        return array(
            self::TRUE_STATUS,
            self::FALSE_STATUS
        );
    }

    public static function _getDefaultStatusArr() {
        return array(
            self::TRUE_STATUS_DEFAULT,
            self::FALSE_STATUS_DEFAULT
        );
    }

    /*
     * Method to get status text
     * @param status id
     * @return string
     */

    public static function _getStatusText($status_id, $type = "boolean", $is_default = false) {
        $status_id = (int) $status_id;
        $status = array();
        if (!$is_default) {
            if ($type == "boolean") {
                $status = array(
                    self::TRUE_STATUS => self::TRUE_STATUS_TXT,
                    self::FALSE_STATUS => self::FALSE_STATUS_TXT
                );
            } else if ($type == "enable") {
                $status = array(
                    self::TRUE_STATUS => "Enabled",
                    self::FALSE_STATUS => "Disabled"
                );
            } else if ($type == "yes_no") {
                $status = array(
                    self::TRUE_STATUS => self::YES_TXT,
                    self::FALSE_STATUS => self::NO_TXT
                );
            } else if ($type == "post_neg") {
                $status = array(
                    self::TRUE_STATUS => self::POST_TXT,
                    self::FALSE_STATUS => self::NEG_TXT
                );
            } else if ($type == "complete") {
                $status = array(
                    self::TRUE_STATUS => self::COMPLETE_TXT,
                    self::FALSE_STATUS => self::PENDING_TXT
                );
            }
        } else {
            if ($type == "boolean") {
                $status = array(
                    self::TRUE_STATUS_DEFAULT => self::TRUE_STATUS_TXT,
                    self::FALSE_STATUS_DEFAULT => self::FALSE_STATUS_TXT
                );
            } else if ($type == "enable") {
                $status = array(
                    self::TRUE_STATUS_DEFAULT => "Enabled",
                    self::FALSE_STATUS_DEFAULT => "Disabled"
                );
            } else if ($type == "yes_no") {
                $status = array(
                    self::TRUE_STATUS_DEFAULT => self::YES_TXT,
                    self::FALSE_STATUS_DEFAULT => self::NO_TXT
                );
            } else if ($type == "post_neg") {
                $status = array(
                    self::TRUE_STATUS_DEFAULT => self::POST_TXT,
                    self::FALSE_STATUS_DEFAULT => self::NEG_TXT
                );
            } else if ($type == "complete") {
                $status = array(
                    self::TRUE_STATUS => self::COMPLETE_TXT,
                    self::FALSE_STATUS => self::PENDING_TXT
                );
            }
        }

        return isset($status[$status_id]) ? $status[$status_id] : '';
    }

    /*
     * Method to get date in common format
     */

    public static function _changeDateFormat($date) {
        $date_arr = explode(" ", $date); // Split date if there is pace for time
        if ($date_arr[0]) {
            $date = $date_arr[0];
        }
        $date = explode('-', $date);
        $year_prefix = "20";
        if ($date[2] > date('y')) {
//If year is not in from 21st century
            $year_prefix = "19";
        }
        $date = $date[0] . "-" . $date[1] . "-" . $year_prefix . $date[2];
        return date(COMMONCONSTANT::DATE_FORMAT, strtotime($date));
    }

    /*
     * Method to get timestap from oracle timestamp
     */

    public static function _getTimeStamp($date) {
        $dateArr = explode(" ", $date, 2);
        $date = explode("-", $dateArr[0]);
        $time = $dateArr[1];
        $timeFormatArr = explode(" ", $time, 2);
        $timeArr = explode(".", $timeFormatArr[0], 4);
//Commented code when date stored in 24-hour format
//        if ($timeFormatArr[1] == "PM") {
//            $timeArr[0] = $timeArr[0] + 13; // Time in 24 hours
//        }
        $year_prefix = "20";
        if ($date[2] > date('y')) {
//If year is not in from 21st century
            $year_prefix = "19";
        }
        $date[2] = $year_prefix . $date[2];
        $month_txt = $date[1];
        $monthArr = date_parse($month_txt);
        $month_num = $monthArr['month'];
        $timestamp = mktime($timeArr[0], $timeArr[1], $timeArr[2], $month_num, $date[0], $date[2]);
        return $timestamp;
    }

    /*
     * Method to get DB query for date between 
     * 
     * @return query string
     */

    public static function _getDateQuery($date_field = "CREATE_DATE", $start_date = "", $end_date = "") {
        if ($start_date == "") {
            $start_date = date('d-M-y', 123); // 01-Jan-70
        }
        if ($end_date == "") {
            $end_date = date('d-M-y');
        }
        $end_date = date('d-M-y', strtotime(date("Y-m-d", strtotime($end_date)) . " +1 day"));
        $criteria_str = '("' . $date_field . '" between (\'' . $start_date . '\') AND (\'' . $end_date . '\') )';
        return $criteria_str;
    }

    /*
     * Method to generater random number for session check
     */

    public static function _getRandomToken($length = self::RANDOM_STRING_LEN) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
// Length of character list
        $chars_length = (strlen($chars) - 1);
// Start our string
        $string = $chars{rand(0, $chars_length)};
// Generate random string
        for ($i = 1; $i < $length; $i = strlen($string)) {
// Grab a random character from our list
            $r = $chars{rand(0, $chars_length)};

// Make sure the same two characters don't appear next to each other
            if ($r != $string{$i - 1})
                $string .= $r;
        }
// Return the string
        return $string;
    }

    /**
     * Method to get random characters from given string
     */
    public static function _getRandomStr($str = "123", $length = 3) {
        $chars = $str;
// Length of character list
        $chars_length = (strlen($chars) - 1);
// Start our string
        $string = $chars{rand(0, $chars_length)};
// Generate random string
        for ($i = 1; $i < $length; $i = strlen($string)) {
// Grab a random character from our list
            $r = $chars{rand(0, $chars_length)};

// Make sure the same two characters don't appear next to each other
            if ($r != $string{$i - 1})
                $string .= $r;
        }
// Return the string
        return $string;
    }

    /*
     * Method to check is random session valdi
     */

    public static function _isTokenValid($form_id = "", $formField, $setFlashMsg = true) {
        if (isset($formField[COMMONCONSTANT::SESSION_FORM_FIELD]) && isset($formField[COMMONCONSTANT::SESSION_FORM_COUNT])) {
            $tokenFieldValue = $formField[COMMONCONSTANT::SESSION_FORM_FIELD];
            $form_count = $formField[COMMONCONSTANT::SESSION_FORM_COUNT];

            if (isset($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD][$form_count])) {
                $sessionVal = $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD][$form_count];
                unset($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD][$form_count]);
                if (trim($sessionVal) == trim($tokenFieldValue)) {
                    return true;
                }
            }
        }
        if ($setFlashMsg) {
            Yii::app()->user->setFlash('error', 'Unable to Process your request please try again.');
        }
        return false;
    }

    /*
     * Method to generate session form field
     */

    public static function _getTokenFormField($form_id, $field_id = self::SESSION_FORM_FIELD) {

        $form_count = count($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD]);
        $form_count = $form_count - 1;
        $sessionVal = $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD][$form_count];

        return "<input type='hidden' name='" . $field_id . "' id='' value='" . $sessionVal . "'/><input type='hidden' name='" . self::SESSION_FORM_COUNT . "' id='' value='" . $form_count . "'/>";
    }

    public static function _getFormToken($form_id) {
        $sessionVal = $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD][count($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . self::SESSION_FORM_FIELD]) - 1];
        return $sessionVal;
    }

    public static function _setTokenFormField($form_id, $field_id = self::SESSION_FORM_FIELD) {
        $randomSessionVal = self::_getRandomToken();
        if (isset($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id]) && is_array($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id])) {
            $form_count = count($_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id]);
//            if ($form_count == 1)
//                $form_count = 1;
//            else
//                $form_count += 1;
            $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id][$form_count] = $randomSessionVal;
        } else {
            $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id] = array();
            $_SESSION[Yii::app()->params->web_code][self::SESSION_FORM][$form_id . $field_id][0] = $randomSessionVal;
        }
    }

    /*
     * Method to print flash messages
     */

    public static function _getFlashMessages() {
        $msg = '';
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            $msg .= '<div id="flashMsgs"><div class="flash-' . $key . '">' . $message . '</div></div><script type="text/javascript">$("#flashMsgs").animate({opacity: 1.0}, 3000).fadeOut("slow");</script>';
        }
        return $msg;
    }

    /*
     * Method to check is password valid
     */

    public static function _isPasswordValid($password = "") {
        $passwordLen = strlen($password);
        $status = FALSE;
        $msg = "";
        $passwordMinLen = self::PASSWORD_MIN_LEN;
        $passwordMaxLen = self::PASSWORD_MAX_LEN;
        if ($passwordLen < $passwordMinLen) {
            $msg = "Please select password of minimum " . $passwordMinLen . " characters";
        } else if ($passwordLen > $passwordMaxLen) {
            $msg = "Please select password of less " . $passwordMaxLen . " than characters";
        } else if (!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
            $msg = self::PASSORD_VALID_MSG;
        } else if (($passwordLen >= $passwordMinLen) && ($passwordLen <= $passwordMaxLen)) {
            $status = TRUE;
        }
        return array(
            'status' => $status,
            'message' => $msg,
        );
    }

    /*
     * Method to return Sr. No. column array for gridview
     */

    public static function _getSrNoCol($col_name = "Sr. No.") {
        return array(
            'header' => CHtml::encode('Sr. No.'),
            'value' => '++$row',
        );
    }

    /*
     * Method to return array for gender
     */

    public static function _getGenderData($val = "") {
        $data = array(
            self::MALE_VAL => self::MALE_TXT,
            self::FEMALE_VAL => self::FEMALE_TXT,
        );
        if (isset($data[$val])) {

            return $data[$val];
        }
        return $data;
    }

    /*
     * Method to return array for Marriage
     */

    public static function _getMarriedData($val = "") {
        $data = array(
            self::FALSE_STATUS => self::UNMARRIED_TXT,
            self::TRUE_STATUS => self::MARRIED_TXT,
        );
        if (isset($data[$val])) {
            return $data[$val];
        }
        return $data;
    }

    /*
     * Method to print string
     */

    public static function _printStr($str = "") {
        echo $str;
    }

    /*
     * Method to get dummy data for reltation manager
     */

    public static function _getRelationMangrDummyData() {
        return array("NAME" => "", "EMAIL_ID" => "", "CONTACT_NO" => "");
    }

    /*
     * Function to strip all special characters from string
     * return string
     */

    public static function _getStripdStr($str = "", $stripSpace = 0, $onlyNum = 0, $onlyLetter = 0) {
        $str = trim($str);
        $regExp = '/';
        if ($onlyNum == 1) {
            $regExp .= '[^0-9'; //If only number needed
        } elseif ($onlyNum == 1) {
            $regExp .= '[^a-zA-Z'; //If only letters needed
        } else {
            $regExp .= '[^a-zA-Z0-9';
        }
        if ($stripSpace == 0) {
            $regExp .= '\s'; // If space is need not needed to be striped
        }
        $regExp .= ']/';
        $strpdStr = preg_replace($regExp, '', $str);
        return $strpdStr;
    }

    /*
     * Function to check string is scripted
     */

    public static function _isMaliciousStr($str = "", $includeApostrophe = 0, $setMsg = 1) {
        $skip_char_arr = COMMONCONSTANT::$strict_chars;
        if ($includeApostrophe == 1) {
            array_push($skip_char_arr, "'"); // If Apostrophe needed to be checked
        }
        $strStatus = self::_in_string($skip_char_arr, $str);
        if ($strStatus && ($setMsg == 1)) {
            Yii::app()->user->setFlash('error', 'Please enter valid value.'); //To set error message
        }
        return $strStatus;
    }

    /**
     * Checks if the given words is found in a string or not.
     * 
     * @param Array $words The array of words to be given.
     * @param String $string The string to be checked on.
     * @param String $option all - should have all the words in the array. any - should have any of the words in the array
     * @return boolean True, if found, False if not found, depending on the $option
     */
    public static function _in_string($words, $string, $option = "any") {
        if ($option == "all") {
            $isFound = true;
            foreach ($words as $value) {
                $isFound = $isFound && (stripos($string, $value) !== false); // returns boolean false if nothing is found, not 0
                if (!$isFound)
                    break; // if a word wasn't found, there is no need to continue
            }
        } else {
            $isFound = false;
            foreach ($words as $value) {
                $isFound = $isFound || (stripos($string, $value) !== false);
                if ($isFound)
                    break; // if a word was found, there is no need to continue
            }
        }
        return $isFound;
    }

    /*
     * Method to get domain
     */

    public static function _getDomain() {
        return $_SERVER['SERVER_NAME'];
    }

    /*
     * Method to get cookie type
     */

    public static function _getCookieType() {
        $secure_cookie = 0;
        if (self::_isSecuredPort()) {

            $secure_cookie = 1;
        }
        return $secure_cookie;
    }

    /*
     * Method to get cookie path
     */

    public static function _getCookiePath($site = "") {
        if ($site != "") {
            $site = "/" . $site;
        }
        $path = $site . "/";
        return $path;
    }

    /*
     * Method to get server domain
     */

    public static function _getServerDomain() {
        $domain = COMMONFUNCTION::_getDomain();
        if (!self::_isSecuredPort()) {
            $domain .= ":" . $_SERVER['SERVER_PORT'];
            $domain = "http://" . $domain;
        } else {
            $domain = "https://" . $domain;
        }
        return $domain;
    }

    public static function _isSecuredPort() {
        $secure = false;
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) {

            $secure = true;
        }
        return $secure;
    }

    public static function _arrSort(&$array, $key) {
        $sorter = array();
        $ret = array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii] = $va[$key];
        }
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
        $array = $ret;
        return $array;
    }

    /*
     * Method to check is date valid
     */

    public static function _date_is_valid($str) {
        if (substr_count($str, self::DATE_SEP) == 2) {
            list($d, $m, $y) = explode('/', $str);
            if ($y > 1900 && $y < 2100) {
                return checkdate($m, $d, sprintf('%04u', $y));
            }
        }

        return false;
    }

    /*
     * Method to compare date
     * return interval array 
     */

    public static function _compareDate($date1, $date2) {
        $date1 = str_replace('/', '-', $date1);
        $date2 = str_replace('/', '-', $date2);

        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);

        $interval = (array) date_diff($datetime1, $datetime2);
        return $interval;
    }

    /**
     * Method to check is valid number
     */
    public static function _isValidNum($number) {
        if (preg_match(self::NUMBER_EXP, $number)) {
            return true;
        }
        return false;
    }

    /**
     * Method to get convert date to database date format
     */
    public static function _getDateDbDateFormat($date = '', $end_date = false) {
        $formated_date = "";
        if ($date != '') {
            $dateArr = explode(COMMONCONSTANT::DATE_SEP, $date);
            $formated_date = $dateArr[2] . '-' . $dateArr[1] . '-' . $dateArr[0];
            if ($end_date) {
                $formated_date = date('Y-m-d', strtotime('+1 day', strtotime($formated_date)));
            }
        }
        return $formated_date;
    }

    /**
     * Method to write logs
     */
    public static function _writeCustomLog($message = '') {
        Yii::log('', CLogger::LEVEL_INFO, $message);
    }

    /**
     * Method to validate attributes
     */
    public static function _isAttributeValid($modelAttributeArr, $attributeArr, $restrictedAttr = array(), $additionalAttrArr = array(), $notReqdAttr = array('id', 'created_at', 'updated_at')) {

        foreach ($notReqdAttr as $key => $value) {
            unset($modelAttributeArr[$value]);
        }
        foreach ($restrictedAttr as $key => $value) {
            unset($modelAttributeArr[$value]);
        }
        foreach ($additionalAttrArr as $key => $value) {
            $modelAttributeArr[$value] = '';
        }
        foreach ($modelAttributeArr as $key => $value) {
            if (!array_key_exists($key, $attributeArr)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Function to get date difference
     */
    public static function _getDateDifference($date1, $date2) {
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        return array(
            'day' => $days,
            'month' => $months,
            'year' => $years,
        );
    }

    /**
     * Method to check is string valid
     */
    public static function _isValidStr($pattern, $str = '') {
        if (preg_match($pattern, $str)) {
            return true;
        }
        return false;
    }

    /**
     * Metho to get julian date
     */
    public static function _getJulianDate() {
        return date("yz");
    }

    /**
     * Method to create directory with rw permissions
     */
    public static function _createDir($path = '', $permissions = 0777) {
        try {
            if (!file_exists($path) && !is_dir($path)) {
                mkdir($path);
                chmod($path, $permissions);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    /**
     * Method to copy file with rw permissions
     */
    public static function _copyFile($source = "", $target = '', $permissions = 0777) {
        try {
            if (!file_exists($target)) {
                copy($source, $target);
            }
            chmod($target, $permissions);
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    /**
     * Method to get time with micro secs
     * @return type
     */
    public static function _getMicroTime($format = "jmyHis") {
        $microtime = floatval(substr((string) microtime(), 1, 8));
        $rounded = round($microtime, 3);
        $microSec = str_replace('.', '', substr((string) $rounded, 1, strlen($rounded)));
        return date($format) . $microSec;
    }

    /**
     * Method to copy directory
     * @return type
     */
    public static function copy_dir($src, $dst, $permissions = 0777) {
        try {
            $dir = opendir($src);
            @mkdir($dst);
            while (false !== ( $file = readdir($dir))) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if (is_dir($src . '/' . $file)) {
                        self::copy_dir($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                        chmod($dst . '/' . $file, $permissions);
                    }
                }
            }
            closedir($dir);
        } catch (Exception $e) {
            
        }
    }

    /**
     * Method to Toggle value
     */
    public static function _toggleValue($value, $valueArr = array(), $default = false, $new = false) {
        $data_arr = self::_getStatusArr();
        if ($new) {
            $data_arr = $valueArr;
        } else {
            if ($default) {
                $data_arr = self::_getDefaultStatusArr();
            }
        }

        $key = array_search($value, $data_arr);
        unset($data_arr[$key]);
        $key = key($data_arr);
        return $data_arr[$key];
    }

    /**
     * Method to remove file
     */
    public static function _remFile($path = '', $permissions = 0777) {
        try {
            if (file_exists($path)) {
                chmod($path, $permissions);
                unlink($path);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

}
