<?php

namespace Noticias\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\ExecutionContext;


/**
 * Noticias\UsuarioBundle\Entity\Usuario
 * 
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Noticias\UsuarioBundle\Entity\UsuarioRepository")
 * @UniqueEntity(fields="alias")
 */
class Usuario implements UserInterface ,  \Serializable
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
     * @Assert\NotBlank(message = "Por favor, escribe tu nombre")
     */
    private $nombre;

    /**
     * @var string $apellidos
     *
     * @ORM\Column(name="apellidos", type="string", length=400)
     * @Assert\NotBlank(message = "Por favor, escribe tus apellidos")
     */
    private $apellidos;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=400)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var date $fecha_nac
     *
     * @ORM\Column(name="fecha_nac", type="date")
     * @Assert\NotBlank()
     */
    private $fecha_nac;

    /**
     * @var string $tel_casa
     *
     * @ORM\Column(name="tel_casa", type="string", length=255)
     */
    private $tel_casa;

    /**
     * @var string $tel_ofi
     *
     * @ORM\Column(name="tel_ofi", type="string", length=255)
     */
    private $tel_ofi;

    /**
     * @var string $nextel
     *
     * @ORM\Column(name="nextel", type="string", length=255 )
     */
    private $nextel;

    /**
     * @var string $celular
     *
     * @ORM\Column(name="celular", type="string", length=255, nullable=true)
     */
    private $celular;

    /**
     * @var string $alias
     *
     * @ORM\Column(name="alias", type="string", length=300, unique=true)
     * @Assert\NotBlank() 
     */
    protected $alias;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=300)
     * @Assert\MinLength(6)
     */
    protected $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var boolean $activo
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

    /**
     * @var boolean $session
     *
     * @ORM\Column(name="session", type="boolean")
     */
    private $session;

    /**
     * @var string $puesto
     *
     * @ORM\Column(name="puesto", type="string", length=255)
     */
    private $puesto;
    
      /**
     * @var array $rol
     *
     * @ORM\Column(name="rol", type="array")
     */
    private $rol;


    /** @ORM\ManyToOne(targetEntity="Noticias\PlazaBundle\Entity\Plaza") */
    private $plaza;

    /** @ORM\ManyToMany(targetEntity="Noticias\NotaBundle\Entity\Fuente", mappedBy="usuarios") 
	 * 
	 */
    private $fuentes;



    public function __construct()
    {
        $this->fuentes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Usuario
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fecha_nac
     *
     * @param date $fechaNac
     * @return Usuario
     */
    public function setFechaNac($fechaNac)
    {
        $this->fecha_nac = $fechaNac;
        return $this;
    }

    /**
     * Get fecha_nac
     *
     * @return date 
     */
    public function getFechaNac()
    {
        return $this->fecha_nac;
    }

    /**
     * Set tel_casa
     *
     * @param string $telCasa
     * @return Usuario
     */
    public function setTelCasa($telCasa)
    {
        $this->tel_casa = $telCasa;
        return $this;
    }

    /**
     * Get tel_casa
     *
     * @return string 
     */
    public function getTelCasa()
    {
        return $this->tel_casa;
    }

    /**
     * Set tel_ofi
     *
     * @param string $telOfi
     * @return Usuario
     */
    public function setTelOfi($telOfi)
    {
        $this->tel_ofi = $telOfi;
        return $this;
    }

    /**
     * Get tel_ofi
     *
     * @return string 
     */
    public function getTelOfi()
    {
        return $this->tel_ofi;
    }

    /**
     * Set nextel
     *
     * @param string $nextel
     * @return Usuario
     */
    public function setNextel($nextel)
    {
        $this->nextel = $nextel;
        return $this;
    }

    /**
     * Get nextel
     *
     * @return string 
     */
    public function getNextel()
    {
        return $this->nextel;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Usuario
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Usuario
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set password
     * 
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set session
     *
     * @param boolean $session
     * @return Usuario
     */
    public function setSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * Get session
     *
     * @return boolean 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     * @return Usuario
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
        return $this;
    }

    /**
     * Get puesto
     *
     * @return string 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }
    
    
        /**
     * Set rol
     *
     * @param array $rol
     * @return Usuario
     */
    public function setRol($rol)
    {
        
        $this->rol[]= $rol;
    }

    /**
     * Get rol
     *
     * @return array 
     */
    public function getRol()
    {
        return $this->rol;
    }
    
    


    /**
     * Set plaza
     *
     * @param Noticias\PlazaBundle\Entity\Plaza $plaza
     * @return Usuario
     */
    public function setPlaza(\Noticias\PlazaBundle\Entity\Plaza $plaza = null)
    {
        $this->plaza = $plaza;
        return $this;
    }

    /**
     * Get plaza
     *
     * @return Noticias\PlazaBundle\Entity\Plaza 
     */
    public function getPlaza()
    {
        return $this->plaza;
    }

    /**
     * Add fuentes
     *
     * @param Noticias\NotaBundle\Entity\Fuente $fuentes
     */
    public function addFuente(\Noticias\NotaBundle\Entity\Fuente $fuentes)
    {
        $this->fuentes[] = $fuentes;
    }

    /**
     * Get fuentes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFuentes()
    {
        return $this->fuentes;
    }
    

    function equals(\Symfony\Component\Security\Core\User\UserInterface $user)
    {
         return $this->getAlias() == $user->getAlias();
    }

    function eraseCredentials()
    {
        return false;
    }
    

    function getRoles()
    {
     
        $roles=$this->Roles_Sting();
        return $roles;
    }

    function getUsername()
    {
       return $this->getAlias();
   
    }
    
   /**
     * serialize the username
     * @return serialize
     */
    public function serialize() {
      return serialize($this->id);
    }

     /**
     * unserialize
     * @param $data 
     */
    public function unserialize($data) {
      $this->id = unserialize($data);
    }
    
    private function Roles_Sting()
    {
        $rol_en_string=array();
        $roles=$this->getRol();
        for($i=0;$i<count($roles);$i++)
        {
           $rol_en_string=$roles[$i];
        }
        return $rol_en_string;
    }



}