<?php
namespace Entities\Posts\Model;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Post_Comentario_Resposta")
*/
class PostComentarioResposta
{
    /**
    * @ORM\Id @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @var integer
    */
    private $id_resposta;

    /**
    * @ORM\ManyToOne(targetEntity="PostComentario", inversedBy="id_resposta")
    * @ORM\JoinColumn(name="id_comentario", referencedColumnName="id_comentario", nullable=false)
    */
    private $id_comentario;

    /**
    * @ORM\ManyToOne(targetEntity="Entities\Usuario\model\Usuario", inversedBy="id_resposta")
    * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario", nullable=false)
    */
    private $id_usuario;

    /**
    * @ORM\Column(type="text")
    */
    private $resposta;

    /**
     * Get idResposta.
     *
     * @return int
     */
    public function getIdResposta()
    {
        return $this->id_resposta;
    }

    /**
     * Set resposta.
     *
     * @param string $resposta
     *
     * @return PostComentarioResposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    /**
     * Get resposta.
     *
     * @return string
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set idComentario.
     *
     * @param \Entities\Posts\Model\PostComentario $idComentario
     *
     * @return PostComentarioResposta
     */
    public function setIdComentario(\Entities\Posts\Model\PostComentario $idComentario)
    {
        $this->id_comentario = $idComentario;

        return $this;
    }

    /**
     * Get idComentario.
     *
     * @return \Entities\Posts\Model\PostComentario
     */
    public function getIdComentario()
    {
        return $this->id_comentario;
    }

    /**
     * Set idUsuario.
     *
     * @param \Entities\Usuario\model\Usuario $idUsuario
     *
     * @return PostComentarioResposta
     */
    public function setIdUsuario(\Entities\Usuario\model\Usuario $idUsuario)
    {
        $this->id_usuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario.
     *
     * @return \Entities\Usuario\model\Usuario
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
}