<?php

namespace Noticias\NotaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias\NotaBundle\Entity\Produccion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Produccion
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
     * @var time $duracion
     *
     * @ORM\Column(name="duracion", type="time")
     */
    private $duracion;

    /**
     * @var boolean $al_aire
     *
     * @ORM\Column(name="al_aire", type="boolean")
     */
    private $al_aire;

    /**
     * @var time $t_aspectos
     *
     * @ORM\Column(name="t_aspectos", type="time")
     */
    private $t_aspectos;

    /**
     * @var time $t_audio
     *
     * @ORM\Column(name="t_audio", type="time")
     */
    private $t_audio;

    /**
     * @var time $t_player
     *
     * @ORM\Column(name="t_player", type="time")
     */
    private $t_player;

    /** @ORM\OneToOne(targetEntity="Noticias\NotaBundle\Entity\Nota") */
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
     * Set duracion
     *
     * @param time $duracion
     * @return Produccion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
        return $this;
    }

    /**
     * Get duracion
     *
     * @return time 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set al_aire
     *
     * @param boolean $alAire
     * @return Produccion
     */
    public function setAlAire($alAire)
    {
        $this->al_aire = $alAire;
        return $this;
    }

    /**
     * Get al_aire
     *
     * @return boolean 
     */
    public function getAlAire()
    {
        return $this->al_aire;
    }

    /**
     * Set t_aspectos
     *
     * @param time $tAspectos
     * @return Produccion
     */
    public function setTAspectos($tAspectos)
    {
        $this->t_aspectos = $tAspectos;
        return $this;
    }

    /**
     * Get t_aspectos
     *
     * @return time 
     */
    public function getTAspectos()
    {
        return $this->t_aspectos;
    }

    /**
     * Set t_audio
     *
     * @param time $tAudio
     * @return Produccion
     */
    public function setTAudio($tAudio)
    {
        $this->t_audio = $tAudio;
        return $this;
    }

    /**
     * Get t_audio
     *
     * @return time 
     */
    public function getTAudio()
    {
        return $this->t_audio;
    }

    /**
     * Set t_player
     *
     * @param time $tPlayer
     * @return Produccion
     */
    public function setTPlayer($tPlayer)
    {
        $this->t_player = $tPlayer;
        return $this;
    }

    /**
     * Get t_player
     *
     * @return time 
     */
    public function getTPlayer()
    {
        return $this->t_player;
    }

    /**
     * Set nota
     *
     * @param Noticias\NotaBundle\Entity\Nota $nota
     * @return Produccion
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