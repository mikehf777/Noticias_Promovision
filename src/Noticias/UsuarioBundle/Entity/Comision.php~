<?php

namespace Noticias\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\UsuarioBundle\Entity\Comision
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comision
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
     * @var text $descripcion
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var boolean $urgente
     *
     * @ORM\Column(name="urgente", type="boolean")
     */
    private $urgente;

    /**
     * @var boolean $realizada
     *
     * @ORM\Column(name="realizada", type="boolean")
     */
    private $realizada;
	
	/** @ORM\ManyToOne(targetEntity="Noticias\UsuarioBundle\Entity\Usuario") */
	private $usuario;




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
     * @return Comision
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
     * Set descripcion
     *
     * @param text $descripcion
     * @return Comision
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set urgente
     *
     * @param boolean $urgente
     * @return Comision
     */
    public function setUrgente($urgente)
    {
        $this->urgente = $urgente;
        return $this;
    }

    /**
     * Get urgente
     *
     * @return boolean 
     */
    public function getUrgente()
    {
        return $this->urgente;
    }

    /**
     * Set realizada
     *
     * @param boolean $realizada
     * @return Comision
     */
    public function setRealizada($realizada)
    {
        $this->realizada = $realizada;
        return $this;
    }

    /**
     * Get realizada
     *
     * @return boolean 
     */
    public function getRealizada()
    {
        return $this->realizada;
    }

    /**
     * Set usuario
     *
     * @param Noticias\UsuarioBundle\Entity\Usuario $usuario
     * @return Comision
     */
    public function setUsuario(\Noticias\UsuarioBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Get usuario
     *
     * @return Noticias\UsuarioBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}