<?php
class Response{
    const success_code = 0;
    const success_message = "SUCCESS";

    const error_code = -1;
    const error_message = "ERROR";
}
class SuccessResponse{
    public $status;
    public $status_code;
    public $name;
    public $results;
    public $suggested_item;
}
class ErrorResponse{

}