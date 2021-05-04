<?php
class Router{
    public static function route($url){

        //controller
        $controller= (isset($url[0])&& $url[0]!= '') ? ucwords($url[0]).'Controller' : DEFAULT_CONTROLLER;
        $controller_name=$controller;
        array_shift($url);

        //actions
        $action= (isset($url[0])&& $url[0]!= '') ? $url[0]: 'indexAction';
        $action_name=$action;
        array_shift($url);

        //params
        $query_params=$url;

        $dispatch=new UsersController();
        dd(call_user_func_array([$dispatch,$action],$query_params));
        if (method_exists($controller_name,$action)){
            call_user_func_array([$dispatch,$action],$query_params);
        }else{
            die('this method not exist in \"'.$controller_name.'\"');
        }
        dd($dispatch);
        dd($action_name);
    }
}
