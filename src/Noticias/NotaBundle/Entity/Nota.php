<?php

namespace Noticias\NotaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\NotaBundle\Entity\Nota
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $titulo
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var text $avance
     *
     * @ORM\Column(name="avance", type="text")
     */
    private $avance;

    /**
     * @var text $nota
     *
     * @ORM\Column(name="nota", type="text", nullable=true)
     */
    private $nota;

    /**
     * @var text $inserto
     *
     * @ORM\Column(name="inserto", type="text", nullable=true)
     */
    private $inserto;

    /**
     * @var string $camarorafo
     *
     * @ORM\Column(name="camarorafo", type="string", length=255)
     */
    private $camarorafo;

    /**
     * @var string $editor
     *
     * @ORM\Column(name="editor", type="string", length=255, nullable=true)
     */
    private $editor;

    /**
     * @var string $conductor
     *
     * @ORM\Column(name="conductor", type="string", length=255, nullable=true)
     */
    private $conductor;

    /**
     * @var boolean $prioridad
     *
     * @ORM\Column(name="prioridad", type="boolean")
     */
    private $prioridad;

    /**
     * @var datetime $fecha_crea
     *
     * @ORM\Column(name="fecha_crea", type="datetime")
     */
    private $fecha_crea;

    /**
     * @var string $fuente
     *
     * @ORM\Column(name="fuente", type="string", length=255)
     */
    private $fuente;

    /**
     * @var boolean $estatal
     *
     * @ORM\Column(name="estatal", type="boolean")
     */
    private $estatal;

    /**
     * @var boolean $anual
     *
     * @ORM\Column(name="anual", type="boolean")
     */
    private $anual;

    /**
     * @var datetime $fecha_succ
     *
     * @ORM\Column(name="fecha_succ", type="datetime")
     */
    private $fecha_succ;

     /**
      * @ORM\ManyToOne(targetEntity="Noticias\UsuarioBundle\Entity\Usuario")
      *
      */
      private $usuario;
	
    /**
      * @ORM\ManyToMany(targetEntity="Noticias\NotaBundle\Entity\Noticiero", inversedBy="notas") 
      * @ORM\JoinTable(name="noticieros_notas")
      */
      private $noticieros;
	


    public function __construct()
    {
        $this->noticieros = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Nota
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set avance
     *
     * @param text $avance
     * @return Nota
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;
        return $this;
    }

    /**
     * Get avance
     *
     * @return text 
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * Set nota
     *
     * @param text $nota
     * @return Nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }

    /**
     * Get nota
     *
     * @return text 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set inserto
     *
     * @param text $inserto
     * @return Nota
     */
    public function setInserto($inserto)
    {
        $this->inserto = $inserto;
        return $this;
    }

    /**
     * Get inserto
     *
     * @return text 
     */
    public function getInserto()
    {
        return $this->inserto;
    }

    /**
     * Set camarorafo
     *
     * @param string $camarorafo
     * @return Nota
     */
    public function setCamarorafo($camarorafo)
    {
        $this->camarorafo = $camarorafo;
        return $this;
    }

    /**
     * Get camarorafo
     *
     * @return string 
     */
    public function getCamarorafo()
    {
        return $this->camarorafo;
    }

    /**
     * Set editor
     *
     * @param string $editor
     * @return Nota
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * Get editor
     *
     * @return string 
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set conductor
     *
     * @param string $conductor
     * @return Nota
     */
    public function setConductor($conductor)
    {
        $this->conductor = $conductor;
        return $this;
    }

    /**
     * Get conductor
     *
     * @return string 
     */
    public function getConductor()
    {
        return $this->conductor;
    }

    /**
     * Set prioridad
     *
     * @param boolean $prioridad
     * @return Nota
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
        return $this;
    }

    /**
     * Get prioridad
     *
     * @return boolean 
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set fecha_crea
     *
     * @param datetime $fechaCrea
     * @return Nota
     */
    public function setFechaCrea($fechaCrea)
    {
        $this->fecha_crea = $fechaCrea;
        return $this;
    }

    /**
     * Get fecha_crea
     *
     * @return datetime 
     */
    public function getFechaCrea()
    {
        return $this->fecha_crea;
    }

    /**
     * Set fuente
     *
     * @param string $fuente
     * @return Nota
     */
    public function setFuente($fuente)
    {
        $this->fuente = $fuente;
        return $this;
    }

    /**
     * Get fuente
     *
     * @return string 
     */
    public function getFuente()
    {
        return $this->fuente;
    }

    /**
     * Set estatal
     *
     * @param boolean $estatal
     * @return Nota
     */
    public function setEstatal($estatal)
    {
        $this->estatal = $estatal;
        return $this;
    }

    /**
     * Get estatal
     *
     * @return boolean 
     */
    public function getEstatal()
    {
        return $this->estatal;
    }

    /**
     * Set anual
     *
     * @param boolean $anual
     * @return Nota
     */
    public function setAnual($anual)
    {
        $this->anual = $anual;
        return $this;
    }

    /**
     * Get anual
     *
     * @return boolean 
     */
    public function getAnual()
    {
        return $this->anual;
    }

    /**
     * Set fecha_succ
     *
     * @param datetime $fechaSucc
     * @return Nota
     */
    public function setFechaSucc($fechaSucc)
    {
        $this->fecha_succ = $fechaSucc;
        return $this;
    }

    /**
     * Get fecha_succ
     *
     * @return datetime 
     */
    public function getFechaSucc()
    {
        return $this->fecha_succ;
    }

    /**
     * Add noticieros
     *
     * @param Noticias\NotaBundle\Entity\Noticiero $noticieros
     */
    public function addNoticiero(\Noticias\NotaBundle\Entity\Noticiero $noticieros)
    {
        $this->noticieros[] = $noticieros;
    }

    /**
     * Get noticieros
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNoticieros()
    {
        return $this->noticieros;
    }
}
