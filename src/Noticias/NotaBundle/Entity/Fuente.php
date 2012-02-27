<?php

namespace Noticias\NotaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\NotaBundle\Entity\Fuente
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fuente
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var text $descripcion
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;
	
	/** @ORM\ManyToMany(targetEntity="Noticias\UsuarioBundle\Entity\Usuario", inversedBy="fuentes") 
	 *  * @ORM\JoinTable(name="usuarios_fuentes")
	 */
	private $usuarios;

    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Fuente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param text $descripcion
     * @return Fuente
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
     * Add usuarios
     *
     * @param Noticias\UsuarioBundle\Entity\Usuario $usuarios
     */
    public function addUsuario(\Noticias\UsuarioBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }

    /**
     * Get usuarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
    
    public function __toString()
    {
       return $this->getNombre();
    }
  
}