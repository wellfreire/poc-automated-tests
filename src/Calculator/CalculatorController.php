<?php

namespace Calculator;

class CalculatorController
{
    public function indexAction()
    {
        return $this->render('calculator');
    }

    public function addAction()
    {
        $calculator = new Calculator();

        $calculator->enterNumber($_POST['number_1']);
        $calculator->enterNumber($_POST['number_2']);
        $calculator->sumNumbers();

        return $this->render('result', array(
            'result' => $calculator->result(),
        ));
    }

    private function render($template, $params = array())
    {
        $loader = new \Twig_Loader_Filesystem(realpath(DIR_ROOT.'/app/views'));
        $twig = new \Twig_Environment($loader);

        $params = array_merge($params, array());

        echo $twig->render($template.'.html.twig', $params);
    }
}