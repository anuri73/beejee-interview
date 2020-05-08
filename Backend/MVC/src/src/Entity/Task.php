<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 * @ORM\Table(name="task")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(name="username", type="string", nullable=false)
     * @var string $username
     */
    private $username;
    /**
     * @ORM\Column(name="email", type="string", nullable=false)
     * @var string $email
     */
    private $email;
    /**
     * @ORM\Column(name="task", type="text", nullable=false)
     * @var string $task
     */
    private $task;
    /**
     * @ORM\Column(name="completed", type="boolean", nullable=false)
     * @var bool $completed
     */
    private $completed = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Task
     */
    public function setId(int $id): Task
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Task
     */
    public function setUsername(string $username): Task
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Task
     */
    public function setEmail(string $email): Task
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTask(): string
    {
        return $this->task;
    }

    /**
     * @param string $task
     * @return Task
     */
    public function setTask(string $task): Task
    {
        $this->task = $task;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed;
    }

    /**
     * @param bool $completed
     * @return Task
     */
    public function setCompleted(bool $completed): Task
    {
        $this->completed = $completed;
        return $this;
    }
}
