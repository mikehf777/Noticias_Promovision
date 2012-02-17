<?php

namespace Noticias\NotaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\NotaBundle\Entity\Noticiero
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Noticiero
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
     * @var datetime $fecha
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string $emision
     *
     * @ORM\Column(name="emision", type="string", length=255)
     */
    private $emision;

    /**
     * @var boolean $estatal
     *
     * @ORM\Column(name="estatal", type="boolean")
     */
    private $estatal;

    /**
     * @var string $plaza
     *
     * @ORM\Column(name="plaza", type="string", length=255)
     */
    private $plaza;
	
	/** @ORM\ManyToMany(targetEntity="Noticias\NotaBundle\Entity\Nota", mappedBy="noticieros") 
	 * 
	 */
	 private $notas;


    public function __construct()
    {
        $this->notas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fecha
     *
     * @param datetime $fecha
     * @return Noticiero
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set emision
     *
     * @param string $emision
     * @return Noticiero
     */
    public function setEmision($emision)
    {
        $this->emision = $emision;
        return $this;
    }

    /**
     * Get emision
     *
     * @return string 
     */
    public function getEmision()
    {
        return $this->emision;
    }

    /**
     * Set estatal
     *
     * @param boolean $estatal
     * @return Noticiero
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
     * Set plaza
     *
     * @param string $plaza
     * @return Noticiero
     */
    public function setPlaza($plaza)
    {
        $this->plaza = $plaza;
        return $this;
    }

    /**
     * Get plaza
     *
     * @return string 
     */
    public function getPlaza()
    {
        return $this->plaza;
    }

    /**
     * Add notas
     *
     * @param Noticias\NotaBundle\Entity\Nota $notas
     */
    public function addNota(\Noticias\NotaBundle\Entity\Nota $notas)
    {
        $this->notas[] = $notas;
    }

    /**
     * Get notas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNotas()
    {
        return $this->notas;
    }
}