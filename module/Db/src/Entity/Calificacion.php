<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="alumnos_calificaciones");
 */
class Calificacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="calificaciones", fetch="EAGER")
     * @ORM\JoinColumn(name="no_de_control", referencedColumnName="no_de_control")
     * @var string
     */
    protected $alumno;

    /**
     * @ORM\OneToOne(targetEntity="Grupo" )
     * @ORM\JoinColumn(name="clave", referencedColumnName="clave")
     * @var string
     */
    protected $grupo;

    /**
     * @ORM\Column(name="parcial", type="integer")
     * @var int
     */
    protected $parcial;

    /**
     * @ORM\Column(name="calificacion", type="integer")
     * @var int
     */
    protected $calificacion;

    public function setId(int $id): Calificacion
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setAlumno(Alumno $alumno)
    {
        $this->alumno = $alumno;
        return $this;
    }

    public function getAlumno()
    {
        return $this->alumno;
    }

    public function setGrupo(Grupo $grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    public function setParcial(int $parcial): Calificacion
    {
        $this->parcial = $parcial;
        return $this;
    }
    
    public function getParcial(): int
    {
        return $this->parcial;
    }

    public function setCalificacion(int $calificacion): Calificacion
    {
        $this->calificacion = $calificacion;
        return $this;
    }

    public function getCalificacion(): int
    {
        return $this->calificacion;
    }
}