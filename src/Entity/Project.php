<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: TimeLog::class)]
    private Collection $timeLogs;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Task::class)]
    private Collection $tasks;

    public function __construct()
    {
        $this->timeLogs = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }

    public function __toString(): string
    {
       return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, TimeLog>
     */
    public function getTimeLogs(): Collection
    {
        return $this->timeLogs;
    }

    public function addTimeLog(TimeLog $timeLog): static
    {
        if (!$this->timeLogs->contains($timeLog)) {
            $this->timeLogs->add($timeLog);
            $timeLog->setProject($this);
        }

        return $this;
    }

    public function removeTimeLog(TimeLog $timeLog): static
    {
        if ($this->timeLogs->removeElement($timeLog)) {
            // set the owning side to null (unless already changed)
            if ($timeLog->getProject() === $this) {
                $timeLog->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): static
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
            $task->setProject($this);
        }

        return $this;
    }

    public function removeTask(Task $task): static
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getProject() === $this) {
                $task->setProject(null);
            }
        }

        return $this;
    }
}
