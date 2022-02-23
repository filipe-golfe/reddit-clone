<?php
namespace Entities\Subreddit\Model;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Subreddit")
*/
class Subreddit
{
    /**
    * @ORM\Id @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @var integer
    */
    private $id_subreddit;

    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    *
    * @var string
    */
    private $sobre;

    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    *
    * @var string
    */
    private $banner;

    /**
    * @ORM\Column(type="string", length=60)
    *
    * @var string
    */
    private $nome;

    /**
    * @ORM\OneToMany(targetEntity="Entities\Aplicacao\Model\Denuncia", mappedBy="id_subreddit")
    */
    private $denuncias;

    /**
    * @ORM\OneToMany(targetEntity="Entities\Subreddit\Model\SolicitacaoModerador", mappedBy="id_subreddit")
    */
    private $solicitacoes_moderador;

    /**
    * @ORM\OneToMany(targetEntity="Entities\Subreddit\Model\SubredditRegras", mappedBy="id_subreddit")
    */
    private $regras;

    /**
    * @ORM\OneToMany(targetEntity="Entities\Subreddit\Model\SubredditUsuario", mappedBy="id_subreddit")
    */
    private $usuarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->denuncias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->solicitacoes_moderador = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regras = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idSubreddit.
     *
     * @return int
     */
    public function getIdSubreddit()
    {
        return $this->id_subreddit;
    }

    /**
     * Set sobre.
     *
     * @param string|null $sobre
     *
     * @return Subreddit
     */
    public function setSobre($sobre = null)
    {
        $this->sobre = $sobre;

        return $this;
    }

    /**
     * Get sobre.
     *
     * @return string|null
     */
    public function getSobre()
    {
        return $this->sobre;
    }

    /**
     * Set banner.
     *
     * @param string|null $banner
     *
     * @return Subreddit
     */
    public function setBanner($banner = null)
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * Get banner.
     *
     * @return string|null
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Set nome.
     *
     * @param string $nome
     *
     * @return Subreddit
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Add denuncia.
     *
     * @param \Entities\Aplicacao\Model\Denuncia $denuncia
     *
     * @return Subreddit
     */
    public function addDenuncia(\Entities\Aplicacao\Model\Denuncia $denuncia)
    {
        $this->denuncias[] = $denuncia;

        return $this;
    }

    /**
     * Remove denuncia.
     *
     * @param \Entities\Aplicacao\Model\Denuncia $denuncia
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDenuncia(\Entities\Aplicacao\Model\Denuncia $denuncia)
    {
        return $this->denuncias->removeElement($denuncia);
    }

    /**
     * Get denuncias.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDenuncias()
    {
        return $this->denuncias;
    }

    /**
     * Add solicitacoesModerador.
     *
     * @param \Entities\Subreddit\Model\SolicitacaoModerador $solicitacoesModerador
     *
     * @return Subreddit
     */
    public function addSolicitacoesModerador(\Entities\Subreddit\Model\SolicitacaoModerador $solicitacoesModerador)
    {
        $this->solicitacoes_moderador[] = $solicitacoesModerador;

        return $this;
    }

    /**
     * Remove solicitacoesModerador.
     *
     * @param \Entities\Subreddit\Model\SolicitacaoModerador $solicitacoesModerador
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSolicitacoesModerador(\Entities\Subreddit\Model\SolicitacaoModerador $solicitacoesModerador)
    {
        return $this->solicitacoes_moderador->removeElement($solicitacoesModerador);
    }

    /**
     * Get solicitacoesModerador.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSolicitacoesModerador()
    {
        return $this->solicitacoes_moderador;
    }

    /**
     * Add regra.
     *
     * @param \Entities\Subreddit\Model\SubredditRegras $regra
     *
     * @return Subreddit
     */
    public function addRegra(\Entities\Subreddit\Model\SubredditRegras $regra)
    {
        $this->regras[] = $regra;

        return $this;
    }

    /**
     * Remove regra.
     *
     * @param \Entities\Subreddit\Model\SubredditRegras $regra
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRegra(\Entities\Subreddit\Model\SubredditRegras $regra)
    {
        return $this->regras->removeElement($regra);
    }

    /**
     * Get regras.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegras()
    {
        return $this->regras;
    }

    /**
     * Add usuario.
     *
     * @param \Entities\Subreddit\Model\SubredditUsuario $usuario
     *
     * @return Subreddit
     */
    public function addUsuario(\Entities\Subreddit\Model\SubredditUsuario $usuario)
    {
        $this->usuarios[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario.
     *
     * @param \Entities\Subreddit\Model\SubredditUsuario $usuario
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUsuario(\Entities\Subreddit\Model\SubredditUsuario $usuario)
    {
        return $this->usuarios->removeElement($usuario);
    }

    /**
     * Get usuarios.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}