<?php

class CommonHelper extends CController {
    /*
     * Get date in d-m-y format from timestamp
     */

    public static function Ora_Date($tdate) {
        if (!empty($tdate)) {
            list($date, $time, $ampm) = explode(' ', $tdate);
            list($hour, $minute, $second) = explode('.', $time);
            $second = substr($second, 0, 2);
            $time = $hour . '.' . $minute . '.' . $second . '' . $ampm;
            return date('d-M-y', strtotime($date . ' ' . $time));
        }
    }

    /*
     * get name of user
     */

    public static function getName($user_id) {
        $criteria = new CDbCriteria;
        $criteria->condition = '"t"."user_id"=:user_id';
        $criteria->params = array(':user_id' => $user_id);
        $stage_remark_data = Users::model()->find($criteria);
        return $stage_remark_data->name;
    }

    /*
     * get stage name from stage_id
     */

    public static function getStage($stage_id) {
        if (strpos($stage_id, ".") !== false) {
            $stage = ltrim(($stage_id - floor($stage_id)), "0.");
            switch ($stage) {
                case 1:
                    $status = "Initiated";
                    break;
                case 2:
                    $status = "Recommended";
                    break;
                case 3:
                    $status = "Need More Info";
                    break;
                case 4:
                    $status = "Query Resolved";
                    break;
                default :
                    $status = "Undefined1";
                    break;
            }
        } else {

            switch ((int) $stage_id) {
                case 100:
                    $status = "Approved";
                    break;
                case 101:
                    $status = "Rejected";
                    break;
                case 103:
                    $status = "Cancelled";
                    break;
                case 104:
                    $status = "Closed";
                    break;
                case 105:
                    $status = "Downloaded";
                    break;
                case 106:
                    $status = "Reopened";
                    break;
                case 4:
                    $status = "Query Resolved";
                    break;
                default:
                    $status = "Undefined";
                    break;
            }
        }
        return $status;
    }

}
