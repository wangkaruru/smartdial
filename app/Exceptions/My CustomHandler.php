<?php

namespace App\Exceptions;

use Exception;
use App\Traits\BaseResponser;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
//use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    use  BaseResponser;
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
     }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)

    {

        if($exception instanceof ValidationException){
            return $this->convertValidationExceptionToResponse($exception,$request);
        }
        if($exception instanceof ModelNotFoundException){
            $modelName = strtolower(class_basename($exception->getModel()));
            return response()->json(["Message"=> "{$modelName} not found"]);
        }
        if($exception instanceof AuthorizationException){
            
            return response()->json(["Message"=> "You are not authorized to perfom this operation"]);
        }
        if($exception instanceof NotFoundHttpException){
            
            return response()->json(["Message"=> "The specified Url is incorrect or invalid.Please type the corect url"]);
        }
        if($exception instanceof MethodNotAllowedHttpException){
            
            return response()->json(["Message"=> "The specified method for the request is invalid.Please confirm the method and try again"]);
        }
        if($exception instanceof QueryException){
            
            $errorCode=$exception->errorInfo[1];
            if($errorCode==1451){
                return response()->json(["Message"=> "You are not allowed to remove a resource referencing other tables"]);
            }

            
        }
        if($exception instanceof HttpException){
            
            return response()->json([$exception->getMessage(),$exception->getStatusCode()]);
        }else{


        return parent::render($request, $exception);}
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    { 
       $errors=$e->validator->errors()->getMessages();
      
       return response()->json($errors,422);
    }
   
}