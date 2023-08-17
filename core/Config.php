<?php

enum Config:string{
    case DATABASE_HOST = 'localhost';
    case DATABASE_NAME = 'phpcourse';
    case DATABASE_PORT = '3306';
    case DATABASE_USERNAME = 'root';
    case DATABASE_PASSWORD = '';
    
    /*
    Dont forget to add base path before executing this script
    */

    case BASE_PATH = 'http://localhost/lab/';

}

