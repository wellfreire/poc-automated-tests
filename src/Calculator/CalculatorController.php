<?php

namespace Calculator;

class CalculatorController
{
    public function indexAction()
    {
        $this->render('calculator');
    }

    public function resultAction()
    {
        $calculatorService = new CalculatorService();
        $this->render('result', array(
            'result' => $calculatorService->resultOfExpression($_POST['expression']),
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