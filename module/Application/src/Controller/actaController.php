<?php
namespace Application\Controller;
use Db\Entity\Alumno;
use Db\Entity\Grupo;
use Db\Entity\Calificacion;
use Doctrine\ORM\EntityManager;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class actaController extends AbstractActionController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function actaAction()
    {
        //Quitar linea 21 de acta controler para ver el acta SIN CALIFICACIONES
        //$calificaciones = $this->entityManager->getRepository(Calificacion::class)->findOneBy('ASC')->getCalificacion();
        $grupo = $this->entityManager->getRepository(Grupo::class)->findOneBy(['clave' => 'ABC']);
        $alumnos = $grupo->getAlumnos();
        $calificacion = $this->entityManager->getRepository(Calificacion::class)->findOneBy(['alumno' => '1627002']); 
        $calificacion1 = $this->entityManager->getRepository(Calificacion::class)->findOneBy(['alumno' => '1627003']); 
        $calificacion2 = $this->entityManager->getRepository(Calificacion::class)->findOneBy(['alumno' => '1627004']); 
        
        $calificaciones = $calificacion->getCalificacion();
        $calificaciones3 = $calificacion1->getCalificacion();
        $calificaciones4 = $calificacion2->getCalificacion();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('calificaciones');
        }
        
        return new ViewModel([
            'alumnos' => $alumnos, 
            'calificaciones' => $calificaciones,
            var_dump($calificaciones),
            var_dump($calificaciones3),
            var_dump($calificaciones4),
            
            //'calificaciones' => $calificaciones,            
            /* 'alumnos_calificaciones' => $calificaciones,  */
        ]);
        
    }
} 