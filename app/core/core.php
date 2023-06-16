<?php
class Core
{
    public function run()
    {
        $url = '/';
        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        $params = array();
        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0];
            $controllerSuffix = 'Controller';
            if (substr($currentController, -strlen($controllerSuffix)) !== $controllerSuffix) {
                $currentController .= $controllerSuffix;
            }

            //Reformulação para mandar para o controlador se por acaso o action não existir
            $link = str_replace($controllerSuffix, "", $currentController);

            array_shift($url);
            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        // Verifica se a classe do controlador existe antes de instanciá-la
        if (class_exists($currentController)) {
            $c = new $currentController();

            // Verifica se o método existe antes de chamá-lo
            if (method_exists($c, $currentAction)) {
                call_user_func_array(array($c, $currentAction), $params);
            } else {
                header("Location:" . BASE_URL .  "erro");
                exit();
            }
        } else {
            header("Location:" . BASE_URL .  "erro");
            exit();
        }
    }
}
