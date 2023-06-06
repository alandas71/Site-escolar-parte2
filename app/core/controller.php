<?php

class Controller
{
    public function loadView($viewName, $viewData = array())
    {
        extract($viewData);
        require 'app/views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array())
    {
        require 'app/views/template.php';
    }

    public function loadDashboardTemplate($viewName, $viewData = array())
    {
        require 'app/views/dashboardTemplate.php';
    }

    public function loadAmbienteTemplate($viewName, $viewData = array())
    {
        require 'app/views/ambienteTemplate.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        require 'app/views/' . $viewName . '.php';
    }
}
