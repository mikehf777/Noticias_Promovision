<?php

namespace Noticias\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\UsuarioBundle\Entity\Pareja
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pareja
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
     * @var string $camarografo
     *
     * @ORM\Column(name="camarografo", type="string", length=255)
     */
    private $camarografo;

    /** @ORM\ManyToOne(targetEntity="Noticias\UsuarioBundle\Entity\Usuario") */
    private $reportero;




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
     * Set camarografo
     *
     * @param string $camarografo
     * @return Pareja
     */
    public function setCamarografo($camarografo)
    {
        $this->camarografo = $camarografo;
        return $this;
    }

    /**
     * Get camarografo
     *
     * @return string 
     */
    public function getCamarografo()
    {
        return $this->camarografo;
    }

    /**
     * Set reportero
     *
     * @param Noticias\UsuarioBundle\Entity\Usuario $reportero
     * @return Pareja
     */
    public function setReportero(\Noticias\UsuarioBundle\Entity\Usuario $reportero = null)
    {
        $this->reportero = $reportero;
        return $this;
    }

    /**
     * Get reportero
     *
     * @return Noticias\UsuarioBundle\Entity\Usuario 
     */
    public function getReportero()
    {
        return $this->reportero;
    }
}