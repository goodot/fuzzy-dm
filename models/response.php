<?php
class ResponseConstants{
    const success_code = 0;
    const success_message = "SUCCESS";

    const error_code = -1;
    const error_message = "ERROR";

    const not_json_error_code = -2;
    const not_json_error_message = "NOT_JSON_ERROR";

    const not_post_error_code = -3;
    const not_post_error_message = "NOT_POST_ERROR";

    const exception_error = -4;
    const exception_message = "EXCEPTION";

}
class SuccessResponse{
    public $status;
    public $status_code;
    public $name;
    public $results;
    public $suggested_item;
}
class ErrorResponse{
    public $status;
    public $status_code;
    public $error_message;
}