<?php

namespace IEEE\UserBundle\Entity;



use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiKey;
    
    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
   private $password;

   /**
    * @ORM\Column(name="salt", type="string", length=255)
    */
   private $salt;
   /**
    *@ORM\OnetoMany(targetEntity="IEEE\UserBundle\Entity\UserTask",mappedBy="user")
    */
   private $UserTasks;

   /**
    *@ORM\OneToOne(targetEntity="IEEE\UserBundle\Entity\image",cascade={"persist"}) 
    */
   private $image;

   /**
    *@ORM\OneToMany(targetEntity="IEEE\UserBundle\Entity\suggest", mappedBy="user")
    */
   private $suggests;

   /**
    *@ORM\OneToMany(targetEntity="IEEE\UserBundle\Entity\comment", mappedBy="user")
    */
   private $comments;
   /**
    *@ORM\OneToMany(targetEntity="IEEE\UserBundle\Entity\feedback", mappedBy="user")
    */
   private $updates;

   /**
    *@ORM\OneToMany(targetEntity="IEEE\UserBundle\Entity\task" , mappedBy="responsible")
    */
   private $tasksResponOn;
   /**
    *@ORM\Column(type="array")
    */
   private $roles ;

   /**
    *@ORM\OneToMany(targetEntity="IEEE\EditorBundle\Entity\article", mappedBy="user")
    */
   private $articles;





    public function getUsername()
    {
        return $this->username;
    }

    public function getRoles()
    {
        if(!$this->roles)
        return ['ROLE_USER'];
        else return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
    }

    // more getters/setters

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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return User
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->UserTasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userTask
     *
     * @param \IEEE\UserBundle\Entity\UserTask $userTask
     *
     * @return User
     */
    public function addUserTask(\IEEE\UserBundle\Entity\UserTask $userTask)
    {
        $this->UserTasks[] = $userTask;

        return $this;
    }

    /**
     * Remove userTask
     *
     * @param \IEEE\UserBundle\Entity\UserTask $userTask
     */
    public function removeUserTask(\IEEE\UserBundle\Entity\UserTask $userTask)
    {
        $this->UserTasks->removeElement($userTask);
    }

    /**
     * Get userTasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserTasks()
    {
        return $this->UserTasks;
    }

    /**
     * Set image
     *
     * @param \IEEE\UserBundle\Entity\image $image
     *
     * @return User
     */
    public function setImage(\IEEE\UserBundle\Entity\image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \IEEE\UserBundle\Entity\image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add suggest
     *
     * @param \IEEE\UserBundle\Entity\suggest $suggest
     *
     * @return User
     */
    public function addSuggest(\IEEE\UserBundle\Entity\suggest $suggest)
    {
        $this->suggests[] = $suggest;

        return $this;
    }

    /**
     * Remove suggest
     *
     * @param \IEEE\UserBundle\Entity\suggest $suggest
     */
    public function removeSuggest(\IEEE\UserBundle\Entity\suggest $suggest)
    {
        $this->suggests->removeElement($suggest);
    }

    /**
     * Get suggests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuggests()
    {
        return $this->suggests;
    }

    /**
     * Add comment
     *
     * @param \IEEE\UserBundle\Entity\comment $comment
     *
     * @return User
     */
    public function addComment(\IEEE\UserBundle\Entity\comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \IEEE\UserBundle\Entity\comment $comment
     */
    public function removeComment(\IEEE\UserBundle\Entity\comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add update
     *
     * @param \IEEE\UserBundle\Entity\feedback $update
     *
     * @return User
     */
    public function addUpdate(\IEEE\UserBundle\Entity\feedback $update)
    {
        $this->updates[] = $update;

        return $this;
    }

    /**
     * Remove update
     *
     * @param \IEEE\UserBundle\Entity\feedback $update
     */
    public function removeUpdate(\IEEE\UserBundle\Entity\feedback $update)
    {
        $this->updates->removeElement($update);
    }

    /**
     * Get updates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUpdates()
    {
        return $this->updates;
    }

    /**
     * Add tasksResponOn
     *
     * @param \IEEE\UserBundle\Entity\task $tasksResponOn
     *
     * @return User
     */
    public function addTasksResponOn(\IEEE\UserBundle\Entity\task $tasksResponOn)
    {
        $this->tasksResponOn[] = $tasksResponOn;

        return $this;
    }

    /**
     * Remove tasksResponOn
     *
     * @param \IEEE\UserBundle\Entity\task $tasksResponOn
     */
    public function removeTasksResponOn(\IEEE\UserBundle\Entity\task $tasksResponOn)
    {
        $this->tasksResponOn->removeElement($tasksResponOn);
    }

    /**
     * Get tasksResponOn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasksResponOn()
    {
        return $this->tasksResponOn;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Add article
     *
     * @param \IEEE\EditorBundle\Entity\article $article
     *
     * @return User
     */
    public function addArticle(\IEEE\EditorBundle\Entity\article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \IEEE\EditorBundle\Entity\article $article
     */
    public function removeArticle(\IEEE\EditorBundle\Entity\article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
