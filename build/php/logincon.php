<?php

            session_start();
            include_once( dirname(__FILE__) . '/dbcon.php');
            include_once( dirname(__FILE__) . '/dologin.php');
            $login = new USER();

            $data = json_decode(file_get_contents('php://input'));
            $returnmsg;
            $username = strip_tags($data->username);
            $password = strip_tags($data->userpass);
            //$password = password_hash($password, PASSWORD_DEFAULT);
            try
            {
                if($login->doLogin($username,$password))    //function to validate credentials found on dologin.php
                {
                    $response_arr=array(
                        "message" => "success"
                    );                                      //message is set to success if account information entered is validated
                    echo json_encode($response_arr);
                }
                else
                {
                    $response_arr=array(
                        "message" => "nomatch"
                    );                                      //message is set to nomatch when validation fails
                    echo json_encode($response_arr);
                }
            }
            catch (PDOException $returnmsg)
            {
                $response_arr=array(
                    "message" => $returnmsg->getMessage()
                );                                          //message is set to the returned error exception if a problem is encountered server-side
                echo json_encode($response_arr);
            }

?>