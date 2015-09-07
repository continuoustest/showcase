<?php

    namespace Showcase\Action\Demo\Doctrine;
    
    
    use Entity\Employee;
    use ObjectivePHP\Application\Action\AbstractAction;
    use ObjectivePHP\Application\Action\Parameter\ActionParameter;
    use ObjectivePHP\Application\Workflow\Event\WorkflowEvent;
    use ObjectivePHP\DoctrinePackage\Parameter\EntityParameter;
    use Service\HumanResources;

    /**
     * Class Parameter
     *
     * @package Showcase\Action\Demo\Doctrine
     */
    class Parameter extends AbstractAction
    {
        /**
         * @var HumanResources
         */
        protected $humanResources;

        public function expects()
        {
            return [
                (new EntityParameter('employee', 0))
                    ->setEntity(Employee::class)
                    ->setMandatory()
                    ->setMessage(ActionParameter::IS_MISSING, 'Le paramètre :param est manquant')
            ];
        }

        public function run(WorkflowEvent $event)
        {
            return ['employee' => $this->getEmployee()];
        }

        /**
         * @codeAssist
         * @return Employee
         */
        protected function getEmployee()
        {
           return $this->getParam('employee');
        }
    }