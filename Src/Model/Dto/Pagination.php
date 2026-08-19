<?php

class Pagination
{
    private int $page;
    private int $limit;
    private int $total;

    public function __construct(int $page = 1, int $limit = 5, int $total = 0)
    {
        $this->page = max(1, $page);
        $this->limit = max(1, $limit);
        $this->total = max(0, $total);
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->limit;
    }

       public function getTotalPages(): int
    {
        return max(1, (int)ceil($this->total / $this->limit));
    }

        public function hasPrevious(): bool
    {
        return $this->page > 1;
    }

    public function hasNext(): bool
    {
        return $this->page < $this->getTotalPages();
    }

   public function setTotal(int $total): void
    {
        $this->total = max(0, $total);
        if ($this->page > $this->getTotalPages()) {
            $this->page = $this->getTotalPages();
        }
    }

    public static function toEntity(array $params, int $limit = 5): self
    {
        $page = (int)($params['page'] ?? 1);
        return new self(page:$page, limit:$limit);
    }

}