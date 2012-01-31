<?php

namespace Noticias\DiarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\DiarioBundle\Entity\Diario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Diario
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
     * @var date $fecha_publi
     *
     * @ORM\Column(name="fecha_publi", type="date", nullable=true)
     */
    private $fecha_publi;

    /**
     * @var boolean $publicado
     *
     * @ORM\Column(name="publicado", type="boolean")
     */
    private $publicado;

    /**
     * @var string $usuario
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $capturista;

    /**
     * 
     * 
	 * @ORM\ManyToOne(targetEntity="Noticias\NotaBundle\Entity\Nota")  
	 */

    private $nota;



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
     * @return Diario
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
     * Set fecha_publi
     *
     * @param date $fechaPubli
     * @return Diario
     */
    public function setFechaPubli($fechaPubli)
    {
        $this->fecha_publi = $fechaPubli;
        return $this;
    }

    /**
     * Get fecha_publi
     *
     * @return date 
     */
    public function getFechaPubli()
    {
        return $this->fecha_publi;
    }

    /**
     * Set publicado
     *
     * @param boolean $publicado
     * @return Diario
     */
    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;
        return $this;
    }

    /**
     * Get publicado
     *
     * @return boolean 
     */
    public function getPublicado()
    {
        return $this->publicado;
    }

    /**
     * Set capturista
     *
     * @param string $capturista
     * @return Diario
     */
    public function setCapturista($capturista)
    {
        $this->capturista = $capturista;
        return $this;
    }

    /**
     * Get capturista
     *
     * @return string 
     */
    public function getCapturista()
    {
        return $this->capturista;
    }

    /**
     * Set nota
     *
     * @param Noticias\NotaBundle\Entity\Nota $nota
     * @return Diario
     */
    public function setNota(\Noticias\NotaBundle\Entity\Nota $nota = null)
    {
        $this->nota = $nota;
        return $this;
    }

    /**
     * Get nota
     *
     * @return Noticias\NotaBundle\Entity\Nota 
     */
    public function getNota()
    {
        return $this->nota;
    }
}