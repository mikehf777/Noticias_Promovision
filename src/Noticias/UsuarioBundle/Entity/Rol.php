<?php

namespace Noticias\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\UsuarioBundle\Entity\Rol
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rol
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
     * @var boolean $admin
     *
     * @ORM\Column(name="admin", type="boolean")
     */
    private $admin;

    /**
     * @var boolean $editor
     *
     * @ORM\Column(name="editor", type="boolean")
     */
    private $editor;

    /**
     * @var boolean $jefe
     *
     * @ORM\Column(name="jefe", type="boolean")
     */
    private $jefe;

    /**
     * @var boolean $jefe_noticias
     *
     * @ORM\Column(name="jefe_noticias", type="boolean")
     */
    private $jefe_noticias;

    /**
     * @var boolean $director-noticias
     *
     * @ORM\Column(name="director_noticias", type="boolean")
     */
    private $director_noticias;

    /**
     * @var boolean $capturista
     *
     * @ORM\Column(name="capturista", type="boolean")
     */
    private $capturista;

    /**
     * @var boolean $otro
     *
     * @ORM\Column(name="otro", type="boolean")
     */
    private $otro;
    
	
	/** @ORM\OneToOne(targetEntity="Noticias\UsuarioBundle\Entity\Usuario") */
	
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
     * Set admin
     *
     * @param boolean $admin
     * @return Rol
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean 
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set editor
     *
     * @param boolean $editor
     * @return Rol
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * Get editor
     *
     * @return boolean 
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set jefe
     *
     * @param boolean $jefe
     * @return Rol
     */
    public function setJefe($jefe)
    {
        $this->jefe = $jefe;
        return $this;
    }

    /**
     * Get jefe
     *
     * @return boolean 
     */
    public function getJefe()
    {
        return $this->jefe;
    }

    /**
     * Set jefe_noticias
     *
     * @param boolean $jefeNoticias
     * @return Rol
     */
    public function setJefeNoticias($jefeNoticias)
    {
        $this->jefe_noticias = $jefeNoticias;
        return $this;
    }

    /**
     * Get jefe_noticias
     *
     * @return boolean 
     */
    public function getJefeNoticias()
    {
        return $this->jefe_noticias;
    }

    /**
     * Set director_noticias
     *
     * @param boolean $directorNoticias
     * @return Rol
     */
    public function setDirectorNoticias($directorNoticias)
    {
        $this->director_noticias = $directorNoticias;
        return $this;
    }

    /**
     * Get director_noticias
     *
     * @return boolean 
     */
    public function getDirectorNoticias()
    {
        return $this->director_noticias;
    }

    /**
     * Set capturista
     *
     * @param boolean $capturista
     * @return Rol
     */
    public function setCapturista($capturista)
    {
        $this->capturista = $capturista;
        return $this;
    }

    /**
     * Get capturista
     *
     * @return boolean 
     */
    public function getCapturista()
    {
        return $this->capturista;
    }

    /**
     * Set otro
     *
     * @param boolean $otro
     * @return Rol
     */
    public function setOtro($otro)
    {
        $this->otro = $otro;
        return $this;
    }

    /**
     * Get otro
     *
     * @return boolean 
     */
    public function getOtro()
    {
        return $this->otro;
    }

    /**
     * Set usuario
     *
     * @param Noticias\UsuarioBundle\Entity\Usuario $usuario
     * @return Rol
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